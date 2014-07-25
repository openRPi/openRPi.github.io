像单片机一样控制树莓派GPIO
=================================

如同著名的“hello word”字符串一样，GPIO控制的第一个实验通常都是让某个管脚点亮一盏LED。在树莓派上，我们也这样做。

首先，我们先回顾一下，在单片机上，我们是怎么控制GPIO的：

	控制常见51单片机的P1-0管脚，直接对P1-0管脚的控制寄存器赋值即可

	.. code-block :: c

		sfr P1   = 0x90;
		sbit P1_0 = P1^0;

		P1_0 = 0;
		// P1_0 = 1;

	P1_0 管脚输出寄存器位于RAM空间物理地址 ``0x91`` ，用C语言往这个物理地址写数据即可控制P1_0的输出电平。

借鉴这个思路，我们要控制树莓派上某个GPIO，也是往它控制寄存器的物理地址上写数据即可。但由于树莓派运行着Linux系统的原因，操作系统把所有的硬件资源的管理起来了，GPIO的物理地址并不能直接被我们的代码访问到，其中需要经过地址转换的过程。关于这部分的内容，这里不做详细讨论，读者可阅读以下文章了解：

* `《简明Linux系统指导·操作系统与应用程序》 <../../../linux_guide/build/html/操作系统与应用程序.html>`_
* `《简明Linux系统指导·硬件基础》 <../../../linux_guide/build/html/硬件基础.html>`_
* `《简明Linux系统指导·内存管理》 <../../../linux_guide/build/html/内存管理.html>`_
* `《简明Linux系统指导·设备驱动》 <../../../linux_guide/build/html/设备驱动.html>`_

因为刚才提到的地址转换是如此的麻烦，国外树莓派爱好者根据BCM2835芯片资料和众多社区讨论编写了树莓派GPIO控制C语言库BCM2835 GPIO C Library。它封装了地址转换过程，我们可以直接调用库函数控制GPIO。

下载地址： http://www.airspayce.com/mikem/bcm2835/bcm2835-1.36.tar.gz

第一个实验，闪烁一盏LED，git仓库 https://github.com/openRPi/gpio/tree/master/basic/blink。读者可以直接编译运行代码，观察LED的闪烁。

.. code-block :: shell

	$ make
	$ sudo ./blink_run.exe

代码中核心的几个GPIO控制函数

1. ``int bcm2835_init(void)`` 初始化GPIO
#. ``void bcm2835_gpio_fsel(uint8_t pin, uint8_t mode)`` 设置管脚功能
#. ``void bcm2835_gpio_write(uint8_t pin, uint8_t on)`` 输出GPIO电平
#. ``int bcm2835_close(void)`` 关闭GPIO

BCM2835 GPIO C 库把GPIO控制问题化简成了函数调用问题。我们还可以

1. 按键检测 https://github.com/openRPi/gpio/tree/master/basic/button
#. PWM信号输出 https://github.com/openRPi/gpio/tree/master/basic/pwm
#. IIC总线控制 https://github.com/openRPi/gpio/tree/master/iic
#. SPI总线控制 

关于这个库的详细信息，可以访问  
http://www.airspayce.com/mikem/bcm2835