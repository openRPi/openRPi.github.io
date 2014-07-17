附录-Linux远程登录
==================

Linux大多应用于服务器，而服务器不可能像PC一样放在办公室，它们是放在IDC机房的，所以平时登录linux系统都是通过远程登录的。Linux系统中是通过ssh服务实现的远程登录功能。默认ssh服务开启了22端口，而且当我们安装完系统时，这个服务已经安装，并且是开机启动的。所以不需要我们额外配置什么就能直接远程登录linux系统。ssh服务的配置文件为 /etc/ssh/sshd_config，你可以修改这个配置文件来实现你想要的ssh服务。比如你可以更改启动端口为36000.

如果你是windows的操作系统，则Linux远程登录需要在我们的机器上额外安装一个终端软件。目前比较常见的终端登录软件有SecureCRT, Putty, SSH SecureShell等，很多朋友喜欢用SecureCRT因为它的功能是很强大的，而笔者喜欢用Putty，只是因为它的小巧以及非常漂亮的颜色显示。不管你使用哪一个客户端软件，最终的目的只有一个，就是远程登录到linux服务器上。这些软件网上有很多免费版的。下面笔者介绍如何使用Putty登录远程linux服务器。

使用Putty登录Linux
--------------------

如果你下载了putty，请直接运行putty.exe

.. image :: http://www.92csz.com/study/linux/images/5_1.png

因为是远程登录，所以你要登录的服务器一定会有一个IP或者主机名。请在Host Name( or IP address) 下面的框中输入你要登录的远程服务器IP，然后回车。

.. image :: http://www.92csz.com/study/linux/images/5_12.png

此时，提示我们输入要登录的用户名。

.. image :: http://www.92csz.com/study/linux/images/5_13.png

输入root 然后回车，再输入密码，就能登录到远程的linux系统了。

使用ssh命令登录Linux
--------------------

?