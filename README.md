# 模拟在线电影购票系统

# 特别说明：
  程序开发环境：
    apache2.0  php5.6.40  mysql5.5
    程序建议使用环境：
  linux系统使用nginx1.12及以上，
  Windows系统使用apache 1.8以上
  php统一使用php5.6版本
  mysql使用5.0及以上版本


# 程序安装:
  程序不自带一键安装,手动导入dy.sql数据库文件,
  修改/public/config.php配置数据库信息  
  修改/class/Model.class.php 数据库信息

# 特别说明:
  验证码接口token和支付宝在线支付接口为了安全,均已注释.请替换成自己的接口key.

# 目录结构:

	|--admin/ 网站的后台目录
		|--include/ 存放网站后台的公共文件
			|--bundles/
			|--images/
			|--css/
			|--js/
			|--fonts/
	    |--view/网站的页面目录
			|--admin_user_show.html	用户管理页
			|--article_trash.html	影片管理
			|--index.html			首页
			|--login.html			登陆页
			|--movie_edit.html		影片修改页
			|--movie_show.html		影片管理展示页
			|--relss_edit.html		影片场次修改页
		|--Control/后台的控制器目录
			|--AdminControl.class.php	管理员管理
			|--ArticleControl.class.php	影片管理
			|--IndexControl.class.php	首页管理
			|--UserControl.class.php	用户管理
		|--Model/ 所有类文件都放在这里
			|--Imageresize.class.php	自动缩放类
			|--Model.class.php			数据库操作类
			|--Name.class.php			用户名类
			|--Page.class.php			分页类
			|--Upload.class.php			文件上传类
			|--Vcode.class.php			vc模版类
		index.php	后台首页入口文件

	|--/  网站的前台目录
		|--cache/ smarty缓存目录
		|--class/ 数据库类文件POD版
		|--lib/	验证码接口类目录
		|--pay/	支付宝接口目录
	|--public/ 网站的公共目录
		|--js 前台js样式目录
		|--Uploads/     文件上传后的文件存储到这里
			|--dayfile
	|--templates_c/	smarty模版自动生成目录
	|--view/	smarty模版存放目录
		|--buy.html		确认订单结果页
		|--center.html	个人中心页
		|--header.html	公共头
		|--index.html	首页
		|--login.html	登陆页
		|--mvinfo.html	查看详情页
		|--reg.html		注册页
		|--select.html	座位选择页
	|--index.php 入口文件
		|--action.php	多个页面ajax请求判断控制器
		|--buy.php		确认订单结果文件
		|--center.php	个人中心文件
		|--index.php	首页
		|--login.php	登陆文件
		|--mvinfo.php	详情文件
		|--order.php	整理订单信息
		|--reg.php		注册文件
		|--select.php	座位文件
		|--serverSid.php	手机验证码接口文件
		|--smsyzm.php	手机验证码接口文件

# 程序分析:
前台:
		登陆:
			ajax验证手机号是否注册,然后进行手机号登陆
		注册:
			手机号为用户账号
				使用验证码进行注册
			设置用户密码
				正则判断

		首页:
			电影的展示
				电影详情查看
					展示该电影所有分配的影厅,可以点击选座
						点击选座,进入选座页面(使用redis将已选座的进行缓存,如果2分钟后未付款,则释放缓存.同时判断座位是否选择和座位选择数量不超过6个,然后点击购买)
						进入订单提交确认付款页面
						核对订单,确认付款
		个人中心:
			登陆后可进入个人中心,可查看订单信息(如果包含2分钟内未付款订单,可再直接去点击付款.利用ajax删除订单)
	后台:
		登陆:
			账号密码登陆
		添加影片:
			影片信息添加,添加成功后需要再给该影片添加场次大厅才可以在前台展示
		添加场次:
			给影片添加新的场次
		影片管理:
			所有影片的删除修改操作和更改场次操作
				修改影片信息:进行数据回填修改影片基本信息
				修改影片场次:利用ajax实现影片和场次联动回填修改
		用户管理:
			对所有前台注册用户封禁和解封操作

