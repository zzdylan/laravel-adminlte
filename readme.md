<a href="http://adminlte.51godream.com/admin">在线演示</a>
账号admin
密码123456


本地安装：
1、composer update   安装项目依赖
2、cp .env.example .env  复制.env.example并且更名为.env
3、在.env中配置好数据库
4、执行迁移命令:php artisan migrate
5、执行数据填充命令:php artisan db:seed
初始账号为admin 密码为123456
