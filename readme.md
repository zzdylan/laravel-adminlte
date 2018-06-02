## 项目概述

* 项目名称：laravel-adminlte
* 演示地址：http://111.231.118.189:8888/admin
  演示账号/密码：admin/123456

laravel-adminlte是一个简洁的后台管理系统基础框架

## 功能如下
- 菜单管理
- 后台用户管理
- 角色管理
- 权限管理

## 运行环境要求

- Nginx 1.8+
- PHP 5.6+
- Mysql 5.7+

## 开发环境部署/安装

本项目代码使用php框架laravel5.4开发

### 基础安装

#### 1. 克隆源代码

克隆 `laravel-adminlte` 源代码到本地：

    git clone https://github.com/zzDylan/laravel-adminlte


#### 2. 安装扩展包依赖

	composer update

#### 3. 生成配置文件

```
cp .env.example .env
```

你可以根据情况修改 `.env` 文件里的内容，如数据库连接、缓存、邮件设置、七牛云存储等：

```
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-adminlte
DB_USERNAME=root
DB_PASSWORD=123456

QINIU_DEFAULT_DOMAIN=XXX
QINIU_ACCESS_KEY=XXX
QINIU_SECRET_KEY=XXX
QINIU_BUCKET=XXX
```

#### 4. 生成数据表

在网站根目录下运行以下命令

```shell
php artisan migrate
```

#### 5.生成菜单数据以及初始管理员数据

```shell
php artisan db:seed
```


#### 6. 生成秘钥

```shell
php artisan key:generate
```

