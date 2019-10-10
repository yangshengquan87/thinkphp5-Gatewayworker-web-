## laykefu
thinkphp5+Gatewayworker搭建的web客服系统

体验地址：http://laykefu.guoshanchina.com

github仓库：https://github.com/shmilylbelva/laykefu

![演示](http://upload-images.jianshu.io/upload_images/2825702-f313bd88202681d8.gif?imageMogr2/auto-orient/strip%7CimageView2/2/w/1000/format/webp)

## 1.客户端接入

1、添加laykefu.css样式文件
```php
    <link href="http://laykefu.guoshanchina.com/static/customer/css/laykefu.css" rel="stylesheet" type="text/css" />
```

2、添加jquery.js和laykefu.js 文件 
```php  
<script src="https://cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
<script src="http://laykefu.guoshanchina.com/static/customer/js/laykefu.js"></script>
```

3、添加html目标代码 id="show-laykefu"，样式可根据需求自定义
```php
<div class="laykefu-min">咨询客服</div>
```
默认显示一个客服

4、初始化laykefu
```php
	laykefu.init({
		group: 1,//客服分组
		socket: '127.0.0.1:7272',//聊天服务器地址,如果是服务器可以用域名，将127.0.0.1改成域名
		face_path:'/static/customer/images/face',//表情包路径
		upload_url:'/index/upload/uploadImg',//图片上传路径
	});

```

5、如果需要展示多个客服，那么需要这么修改

```php
<div class="laykefu-min" data-group="1" >售前客服</div>
<div class="laykefu-min" data-group="2" style="margin:100px">售后客服</div>

```
初始化前需要先获取group的值
```php
$(".laykefu-min").click(function(){
    var group = $(this).attr('data-group');
	laykefu.init({
		group: group,//客服分组
		socket: '127.0.0.1:7272',//聊天服务器地址
		face_path:'/static/customer/images/face',//表情包路径
		upload_url:'/index/upload/uploadImg',//图片上传路径
	});
});
```

6、可选参数
可配置参数如下
```php
	laykefu.init({
		uid: '',//客户id
		name: '',//客户昵称
		group: '',//客服分组
		avatar: '',//客户头像
		socket: '',//聊天服务器地址
		face_path:'',//表情包路径
		upload_url:'',//图片上传路径
		height:'',//窗口高度
		width:'',//窗口宽度
	});

``` 
5、关联已有账户系统
默认情况下咨询的客户是随机分配账户信息，如果你的平台有账户系统，那么可以在初始化的时候传递uid和name即可

## 2.服务端配置
1、安装依赖
```php
composer install
```
2、配置环境

 2.1 复制.env.example文件并命名为.env，修改.env参数，参考.env

 2.2 如果是在服务器环境运行该项目，那么请配置`/vendor/workerman/Config/Events`下的
 start_globaldata.php的$globaldata参数，
 start_gateway.php的$gateway->lanIp参数，
 $gateway->registerAddress参数
 start_businessworker.php的$worker->registerAddress参数
 
本地运行，无需修改

 2.3 修改vendor/workerman/Config/Db.php相关参数

3、如果你是在服务器上运行该项目，请开放7272端口供laykefu使用，以阿里云为例，在`网络和安全`的`安全组`里面`修改规则`，增加7272端口

4、如果指定某个域名才能connect，那么请修改Events.php的HTTP_ORIGIN参数

5、启动gatawayworker相关服务
如果你是在windows上运行的话，直接双击`/vendor/workerman/Config/start_for_bat.bat`即可
如果你是在linux或mac上运行的话，请进入`/vendor/workerman/Config/`目录，然后运行
```php
php start.php start -d
```
开启服务
命令如下
启动
以debug（调试）方式启动

php start.php start

以daemon（守护进程）方式启动

php start.php start -d

停止
php start.php stop

重启
php start.php restart

平滑重启
php start.php reload

查看状态
php start.php status

查看连接状态
php start.php connections

## 其他信息

客服地址:host/service
账户密码：
客服小美 123456 //售前客服

客服小丽 123456 //售后客服

后台管理地址：host/admin
账户密码：admin admin


测试地址：
用户地址：kefu.yang021.cn
客服地址：kefu.yang021.cn/service
后台管理：kefu.yang021.cn/admin

## License

MIT

## QQ【837526619】



