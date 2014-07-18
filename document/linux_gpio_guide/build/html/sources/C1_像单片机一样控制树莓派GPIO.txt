像单片机一样控制树莓派GPIO
=================================

如同著名的“hello word”字符串一样，GPIO控制的第一个实验通常都是让某个管脚点亮一盏LED。在树莓派上，我们也这样做。

我们从 http://www.airspayce.com/mikem/bcm2835/bcm2835-1.36.tar.gz 下载所用到的BCM2835 GPIO C语言库。这个库是国外树莓派爱好者根据BCM2835芯片资料和众多社区讨论编写的树莓派GPIO控制库，C/C++兼容。

借用这个库，我们可以像控制单片机一样控制树莓派的GPIO口。

第一个实验，闪烁一盏LED，git仓库 https://github.com/openRPi/gpio/tree/master/basic/blink。读者可以直接编译运行代码，观察LED的闪烁。

.. clode-block :: shell

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