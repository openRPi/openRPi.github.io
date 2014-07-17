==========
初识 Linux
==========

Linux 历史
----------

在介绍 Linux 的历史前，有必要了解，Linux “Li”中“i”的发音类似于“Minix”中“i”的发音，而“nux”中“u”的发音类似于英文单词“profess”中“o”的发音。依照国际音标应该是['linэks]。

1991年4月，芬兰人Linux Benedict Torvalds根据可以在低档机上使用的MINIX设计了一个系统核心Linux_0.01，但没有使用任何MINIX或UNIX的源代码。通过USENET（就是新闻组）宣布这是一个免费的系统，主要在x86电脑上使用，希望大家一起来将它完善，并将源代码放到了芬兰的FTP站点上代人免费下载。本来他想把这个系统称为freax，可是FTP的工作人员认为这是Linus的MINIX，就用Linux这个子目录来存放，于是它就成了“Linux”。这时的Linux只有核心程序，还不能称做是完整的系统，不过由于许多专业用户（主要是程序员）自愿地开发它的应用程序，并借助Internet拿出来让大家一起修改，所以它的周边的程序越来越多，Linux本身也逐渐发展壮大起来。

	**"Hello everybody out there using minix——I'm doing a (free) operating system"**

	在1991年的八月，网络上出现了一篇以此为开篇话语的帖子——这是一个芬兰的名为Linus Torvalds的大学生为自己开始写作一个类似minix，可运行在386上的操作系统寻找志同道合的合作伙伴。

	1991年10月5日，Linus Torvalds在新闻组comp.os.minix发布了大约有一万行代码的Linux v0.01版本。

	到了1992年，大约有1000人在使用Linux，值得一提的是，他们基本上都属于真正意义上的hacker。

	1993年，大约有100余名程序员参与了Linux内核代码编写/修改工作，其中核心组由5人组成，此时Linux 0.99的代码有大约有十万行，用户大约有10万左右。

	1994年3月，Linux1.0发布，代码量17万行，当时是按照完全自由免费的协议发布，随后正式采用GPL协议。至此， Linux的代码开发进入良性循环。很多系统管理员开始在自己的操作系统环境中尝试linux，并将修改的代码提交给核心小组。由于拥有了丰富的操作系统 平台，因而 Linux的代码中也充实了对不同硬件系统的支持，大大的提高了跨平台移植性。

	1995年，此时的Linux 可在Intel、Digital 以及Sun SPARC处理器上运行了，用户量也超过了50万，相关介绍Linux的Linux Journal杂志也发行了超过10万册之多。

	1996年6月，Linux 2.0内核发布，此内核有大约40万行代码，并可以支持多个处理器。此时的Linux 已经进入了实用阶段，全球大约有350万人使用。

	1997年夏，大片《泰坦尼克号》在制作特效中使用的160台Alpha图形工作站中，有105台采用了Linux操作系统。


Linux核心程序的著作权归Linus本人所有，其它应用程序归各自的作者所有，但按照GNU授权，任何人都可以采取收费或免费方式来发行Linux，并在符合该授权的规范下做修改。这样就有了一大批的免费程序移植到了Linux上，包括GNU、Emacs、XFree86、Mozilla等经典软件，并且在不断壮大中。由于源代码是公开的，任何一个使用Linux的人在添置了新硬件后都能自己编写驱动程序，所以Linux对新硬件的支持己经超过了许多专业UNIX系统。Linux的成功如果没有Internet是不可能的，因为Linux实际上是世界各地众多程序员共同开发的结果。

现在的Linux经过数次改版（包括核心的升级和周边程序的完善），己经发展成了一个遵循POSIX标准的32/64位多工操作系统。Linux可以兼容大部分的UNIX系统，很多UNIX的程序不需要改动，或者很少的改变就可以运行于Linux环境；内置TCP/IP协议，可以直接连入Internet，作为服务器或者终端使用；内置JAVA解释器，可直接运行JAVA源代码；具备程序语言开发、文字编辑和排版、数据库处理等能力；提供X Windows的图形界面；主要用于x86系列的个人电脑，也有其它不同硬件平台的版本，支持现在流行的所有硬件设备。

就性能上来说，它并不弱于Windows甚至UNIX，而且靠仿真程序还可以运行Windows应用程序。它有成千上万的各类应用软件，并不输于Windows的应用软件数量，其中也有商业公司开发的赢利性的软件。最可贵的是：它是一个真正的UNIX系统，可以供专业用户和想学UNIX的人在自己的个人电脑上使用。Linux是一个非常灵活的系统，相对于Windows而言也是一个比较难用的系统，就如同大多数用户用不惯MacOS的单键鼠标一样。想要对Linux轻车熟路，你必须懂得一些相关知识，软、硬件的配置，最好还懂点程序，因为没有人有义务为您提供技术支援，除了和其它用户交流之外，您必须要自己解决问题。当然，如果只是作为日常应用，Linux一样会为您提供完美的操作环境，你所要做的就是改变使用习惯和成见。

早期的操作系统是没有图形界面的，自从Apple于1984年推出System 1.0开始，个人电脑才实现了真正的GUI（Graphics User Interface，图形用户界面），从此电脑变得更加具有亲和力，也理加易于使用。Windows的图形化开始于Windows 3.1/3.2，直到Windows 95的出现才标致着多媒体时间的到来，从此计算机变得能说会唱起来。Linux始于UNIX，却青出于蓝胜于蓝，同样拥有着俗的图形用户界面，性能更稳定，也更漂亮，可以和世界上曾经出现过的，最美丽的操作系统媲美！不同于现在的XP，Linux的图形界面是基于Console之上的，类似于Windows 95架于DOS之上，Linux下实现图形界面的是X Windows系统（区别于MS的Windows）。

	X Windows是一套用于UNIX的具有极大可携性、对彩色掌握的多样性和网络之间的操作透明性的健在式处理窗口系统。它和微软的Windows的工作原理并不相同，不过两者都使用图形界面和窗口技术，从外表看来有那么一点点相似，但又存在着巨大的不同，实际上X Windows的界面更加多样化，也更漂亮，且高效快捷。就Windows对于DOS的地位一样，X Windows一改UNIX/Linux单调的文本介面，提供了一个友善的图形用户界面（GUI）。

Linux的标志和吉祥物是一只名字叫做Tux的企鹅，标志的由来是因为Linus在澳洲时曾被一只动物园里的企鹅咬了一口，便选择了企鹅作为Linux的标志。Linux的注册商标是Linus Torvalds所有的。这是由于在1996年，一个名字叫做William R. Della Croce的律师开始向各个Linux发布商发信，声明他拥有Linux商标的所有权，并且要求各个发布商支付版税，这些发行商集体进行上诉，要求将该注册商标重新分配给 Linus Torvalds。Linus Torvalds 一再声明 Linux 是免费的，他本人可以卖掉，但 Linux 绝不能卖。

"谁会牵你的手，走过风风雨雨"这句歌词曾经代表着千万Linuxer的心，如今，这只可爱的小企鹅终于能独挡一面，在IBM、HP、Novell、Oracle等诸多厂商的支持下，迎着风雪傲然前行。 

Linux 的理念与哲学
-------------------

开源
^^^^^

GNU、GPL

自由
^^^^^^

？

Linux 发行版
-------------

好了，经由上面的说明，我们知道 Linux 是个『操作系统』，而且他是 GNU 的授权模式，并且有个老大哥是 Unix 。不过，毕竟由 Torvalds 先生负责维护的 Linux 提供的仅是『核心』与『核心工具』的集合，对于需要更完整功能的操作系统来说，毕竟还不够完备，例如如果你要桌面程序，还得要加入 X-Window 系统对吧！？如果你要架设 WWW 还得加入服务器软件对吧？所以，虽然 Linux 的核心已经提供了相当多的支持与工具程序，但毕竟还不足以构成一个很完整的操作系统。

好在，由于 Linux 的稳定性良好，并且可以在便宜的 x86 架构下的计算机平台运作，所以吸引了很多的套件商与自由软件的开发团队在这个 Linux 的核心上面开发相关的软件，例如有名的 sendmail, wu-ftp, apache 等等。

此外，亦有一些商业公司发现这个商机，因此，这些商业公司或者是非营利性的工作团队，便将 Linux 核心、核心工具与相关的软件集合起来，并加入自己公司或团队的创意的系统管理模块与工具，而释出一套可以完整安装的操作系统，这个完整的 Linux 操作系统，我们就称呼他为 distribution，或者是中文所谓的『安装套件』。当然，由于是基于 GNU 的架构下，因此各家公司所发行的光盘套件是可以在网络上面自由下载的。

不过，由于发展的 Linux 公司实在太多了，例如有名的 Red Hat, OpenLinux, Mandrake, Debian, SuSE 等等，所以很多人都很担心，如此一来每个 distribution 是否都不相同呢？这就不需要担心了，由于各个 distribution 都是架构在 Linux Kernel 下来发展属于自己公司风格的 distribution，因此大家都遵守 Linux Standard Base ( LSB 的规范，也就是说，各个 distribution 其实都是差不多的！反正用到的都是 Linux Kernel 啊！只是各个 distribution 里面所使用的各套件可能并不完全相同而已。所以，读者可以按照自己的喜好来选择 Linux 的 distribution 。

底下列出几个主要的 Linux 发行者网址： 

* Red Hat: http://www.redhat.com
* Mandrake: http://www.linux-mandrake.com/en
* Slackware: http://www.slackware.com
* SuSE: http://www.suse.com/index_us.html
* OpenLinux: http://www.caldera.com
* Debian: http://www.debian.org
* Linpus: http://www.linpus.com.tw
* UniteLinux: http://www.sco.com/unitedlinux

就如同 VBird 前面提到的，每一个发行者所使用的 Linux 核心其实是一样的，都是由 www.kernel.org 开发出来的核心。所以其架构，甚至包括其档案放置的目录，都是大同小异的，基本上除了某些内容套件不太一样之外 ( 例如有人使用 wu-ftpd 有人使用 proftpd 等等 ，其它的档案架构与指令系统其实几乎都是相同的，因此我们不去探讨哪一个套件比较出色，而是要来介绍如何学习与使用一个套件。至于下载的地点，网友提供了一个相当棒的多种 Linux distributions 的下载网站：<http://www.linuxiso.org>

Linux 开发与社区
------------------

？