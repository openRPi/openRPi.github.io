充满Linux风格地控制树莓派GPIO
=====================================

上一章，我们为读者展示了如何像操作单片机一样操作树莓派GPIO。但仅仅只是操作而已，上一章并未告诉读者Linux GPIO的控制机制到底是如何运作的。BCM2835函数库已经把所有与GPIO相关的细节封装起来了，读者调用一些相关的函数控制GPIO。在这一章，我们抛开BCM2835函数库，自行实现几个GPIO控制的小实验，初探GPIO控制的内幕。

在Linux用户态（*内核态、用户态和接口？*）控制GPIO，通常有三种方式

1. 自行编写内核驱动程序，并导出某些接口到用户空间
#. 重映射/dev/mem（*这是什么？*）内存映像
#. 使用sysfs（*这是什么？*）系统接口

徒手点亮一盏LED
-----------------

是的，借助sysfs接口，现在我们可以仅仅依靠几条Linux终端命令，点亮一盏LED。这盏LED连接在P1-11管脚，GPIO编号17，高电平点亮。我们进入 ``/sys/class/gpio`` 目录，这里是GPIO的控制接口所在地。

.. code-block :: shell

	pi@raspberrypi ~ $ cd /sys/class/gpio/
	pi@raspberrypi ~ $ ls
	export  gpiochip0  unexport

目录下有3个文件（夹）

* export，负责导出GPIO接口
* gpiochip0，GPIO控制器0的控制接口
* unexport，负责取消GPIO接口的导出

我们往export写入“17”，导出GPIO17控制接口————gpio17文件夹

.. code-block :: shell

	pi@raspberrypi /sys/class/gpio $ sudo echo 17 > export 
	pi@raspberrypi /sys/class/gpio $ ls
	export  gpio17  gpiochip0  unexport
	pi@raspberrypi /sys/class/gpio $ ls gpio17
	active_low  direction  edge  power  subsystem  uevent  value

gpio17文件夹下，我们用到direction和value两个接口

* direction
	配置GPIO为输入或输出。写入“out”为输出，“in”为输入，默认输出。
* value
	GPIO电平，任何非零的值都被认为是高电平。

输入指令

.. code-block :: shell

	pi@raspberrypi /sys/class/gpio $ sudo echo out > gpio17/direction 
	pi@raspberrypi /sys/class/gpio $ sudo echo 1 > gpio17/value

此时，可以看到LED已经被点亮了。熄灭LED，并取消GPIO17的导出，则输入指令

.. code-block :: shell

	pi@raspberrypi /sys/class/gpio $ sudo echo 0 > gpio17/value
	pi@raspberrypi /sys/class/gpio $ sudo echo 17 > unexport 
	pi@raspberrypi /sys/class/gpio $ ls
	export  gpiochip0  unexport

现在gpio17文件夹消失了，GPIO17的导出已经被取消。硬件资源是宝贵的，使用完之后，都应该及时释放。

这个例程的C语言版本位于 https://github.com/openRPi/gpio/tree/master/sysfs/blink

小结：

* GPIO的sysfs接口位于 ``/sys/class/gpio``
* 写入GPIO编号到 ``export``，可导出GPIO控制接口
* 写入“out”到 ``gpioN/direction``，将GPIO_N配置为输出
* 写入“1”或“0”到 ``gpioN/value``，置位或复位GPIO_N
* 写入GPIO编号到 ``export``，取消导出GPIO控制接口 

按键检测和中断
----------------

？

GPIO控制的原理
-----------------

树莓派的CPU是ARM架构的（*什么是ARM架构？*）。这种架构的机器把GPIO的控制寄存器和运行RAM看成一体。也是就说，在ARM架构的CPU看来，GPIO控制寄存器同样位于运行RAM的地址空间，CPU可以像访问RAM一样访问GPIO控制寄存器。

在树莓派的/dev目录下，存在一个特殊的设备接口———— ``/dev/mem``，它是树莓派物理内存的全映像，可以用来从用户空间访问物理内存。BCM2835函数库就是利用了 ``/dev/mem`` 设备接口，实现从用户空间控制GPIO。

当我们需要将某GPIO置位/复位时，通常经历了以下几个步骤：

1. 打开/dev/mem文件
#. 根据虚拟内存和物理内存地址映射关系（*这是什么？*），找出这个GPIO的控制寄存器的虚拟地址
#. 操作GPIO的控制寄存器
#. 使用结束，关闭 ``/dev/mem`` 文件

BCM2835函数库封装了上述过程。了解它的详细工作原理，可以阅读函数库源码 https://github.com/openRPi/gpio/tree/master/lib

现在，我们利用/dev/mem设备接口，再次点亮一盏LED。实验例程位于 https://github.com/openRPi/gpio/tree/master/dev_mem/blink ，它展示了通过/dev/mem设备接口控制硬件的一般步骤。

实验涉及的LED连接在P1-11管脚，GPIO编号17。

查阅[BCM2835芯片datasheet](https://github.com/openRPi/gpio/blob/master/resource/BCM2835-ARM-Peripherals.pdf)得知

* GPIO控制寄存器簇基址：``20200000H``
* GPIO17功能配置寄存器 ``GPFSEL1``：``20200004H``
* 置位寄存器 ``GPSET0``：``2020001cH``
* 复位寄存器 ``GPCLR0``：``20200028H``

我们用 ``open`` 函数打开 ``/dev/mem``

.. code-block :: c

	int mem_fd=0;
	mem_fd = open("/dev/mem", O_RDWR | O_SYNC))

并将GPIO控制寄存器簇基址（物理地址）映射到用户空间能访问的虚拟地址。映射工作由 ``mmap`` 函数完成。

.. code-block :: c

	volatile int * gpio=MAP_FAILED;
	gpio = mmap(NULL,4096,PROT_READ|PROT_WRITE, MAP_SHARED, mem_fd, GPIO_BASE);

``mmap`` 函数执行成功后，我们可以通过 ``gpio`` 指针访问到真实的物理地址。

设置GPIO17为输出：将 ``GPFSEL1`` 的23到21位设为 ``001``

.. code-block :: c

	*(gpio+GPFSEL1/4) &= ~0xE00000;
	*(gpio+GPFSEL1/4) |= 1<<21;

置位GPIO17：置位GPSET0的第17位。这段代码执行成功后，LED被点亮了。

.. code-block :: c

	*(gpio+GPSET0/4) = 1<<17;

复位GPIO17：置位 ``GPCLR0`` 的第17位。LED熄灭。

.. code-block :: c

	*(gpio+GPCLR0/4) = 1<<17;

解除映射并关闭 ``/dev/mem``

.. code-block :: c

	munmap(&gpio,4096);
	close(mem_fd);
	