
## 一、概述

###  1、 编写目的

+  为项目的系统的开发设计的依据与指导。
+  为参与该项目的编程人员提供依据；
+  为修改、维护提供条件；  
+  项目负责人将按计划书的要求布置和控制开发工作全过程；  
+  项目质量保证组将按此计划书做阶段性和总结性的质量验证和确认。

### 2、 读者对象

+  项目开发人员，特别是编程人员；
+  软件维护人员；
+  技术管理人员；
+  执行软件质量保证计划的专门人员；   
+  参与本项目开发进程各阶段验证、确认以及负责为最后项目验收、鉴定提供相应报告的有关人员。
+  合作各方有关部门的负责人；项目组负责人和全体参加人员。

###  3、 注意事项

+  权限审查：此文档仅供技术部功能组内部使用。
+  保存备份：此文档仅在服务器上作修改，不允许本地备份。
+  该文档采用 markdown 编写规范，建议使用markdownPad或相关编辑工具查看和修改。


## 二、 项目说明


## 三、 代码说明

### 1、 代码框架 

ThinkPHP 5.0
===============
ThinkPHP5在保持快速开发和大道至简的核心理念不变的同时，PHP版本要求提升到5.4，对已有的CBD模式做了更深的强化，优化核心，减少依赖，基于全新的架构思想和命名空间实现，是ThinkPHP突破原有框架思路的颠覆之作，其主要特性包括：

 + 基于命名空间和众多PHP新特性
 + 核心功能组件化
 + 强化路由功能
 + 更灵活的控制器
 + 重构的模型和数据库类
 + 配置文件可分离
 + 重写的自动验证和完成
 + 简化扩展机制
 + API支持完善
 + 改进的Log类
 + 命令行访问支持
 + REST支持
 + 引导文件支持
 + 方便的自动生成定义
 + 真正惰性加载
 + 分布式环境支持
 + 更多的社交类库

> ThinkPHP5的运行环境要求PHP5.4以上。

详细开发文档参考 
    [ThinkPHP5完全开发手册](http://www.kancloud.cn/manual/thinkphp5)
    [ThinkPHP5 核心框架包](https://github.com/top-think/framework)。

### 2、代码目录结构

~~~
project  应用部署目录
├─application                    应用目录（可设置）
│  ├─common                      公共模块目录（可更改）
│  ├─test                        测试模块目录(开发中用于测试单个功能的，可删除)
│  │  ├─config.php               模块配置文件
│  │  ├─common.php               模块函数文件
│  │  ├─controller               控制器目录
│  │  ├─model                    模型目录
│  │  ├─view                     视图目录
│  ├─api                         Api模块目录(可更改)
│  │  ├─config.php               模块配置文件
│  │  ├─common.php               模块函数文件
│  │  ├─controller               控制器目录
│  │  ├─model                    模型目录
│  │  ├─view                     视图目录
│  ├─index                       模块目录(可更改)
│  │  ├─config.php               模块配置文件
│  │  ├─common.php               模块函数文件
│  │  ├─controller               控制器目录
│  │  ├─model                    模型目录
│  │  ├─view                     视图目录
│  │  └─ ...                     更多类库目录
│  ├─command.php                 命令行工具配置文件
│  ├─common.php                  应用公共（函数）文件
│  ├─config.php                  应用（公共）配置文件
│  ├─database.php                数据库配置文件
│  ├─tags.php                    应用行为扩展定义文件
│  └─route.php                   路由配置文件
├─extend                         扩展类库目录（可定义）
├─public                         WEB 部署目录（对外访问目录）
│  ├─static                      静态资源存放目录(css,js,image)
│  │  ├─ js                      
│  │  │  ├─ jquery-3.2.1.min.js  JQuery包
│  │  │  ├─ jquery.cookie.js     JQuery的cookie包（依赖于JQuery）
│  │  │  └─ js.cookie.js         js的cookie包（纯js）（暂未用到2018-06-11 16:07:38）
│  │  └─...
│  ├─test                       用来存放测试的前端资源（css,js,image,html）(上线、可删除)
│  │  ├─login.html              测试php-jwt的用户认证的接口
│  │  ├─testExtends.php         测试类的继承与__construct()的效果
│  │  └─...
│  ├─doc_api.php                执行根据注释生成api文档的执行入口
│  ├─api2.html                  根据注释生成api文档的html
│  ├─index.php                  应用入口文件
│  ├─router.php                 快速测试文件
│  └─.htaccess                  用于 apache 的重写
├─runtime                       应用的运行时目录（可写，可设置）
├─vendor                        第三方类库目录（Composer）
│  ├─composer                   框架默认带的composer类
│  ├─bin                        框架初始已有
│  ├─autoload.php               框架初始已有的文件
│  ├─topthink                   框架初始已有的类库
│  ├─mumbaicat                  根据注释生成api文档的类库
│  ├─firebase                   php-jwt的类库（用户认证）
│  └─...
├─thinkphp                      框架系统目录
│  ├─lang                       语言包目录
│  ├─library                    框架核心类库目录
│  │  ├─think                   Think 类库包目录
│  │  └─traits                  系统 Traits 目录
│  ├─tpl                        系统模板目录
│  ├─.htaccess                  用于 apache 的重写
│  ├─.travis.yml                CI 定义文件
│  ├─base.php                   基础定义文件
│  ├─composer.json              composer 定义文件
│  ├─console.php                控制台入口文件
│  ├─convention.php             惯例配置文件
│  ├─helper.php                 助手函数文件（可选）
│  ├─LICENSE.txt                授权说明文件
│  ├─phpunit.xml                单元测试配置文件
│  ├─README.md                  README 文件
│  └─start.php                  框架引导文件
├─build.php                     自动生成定义文件（参考）
├─composer.json                 composer 定义文件
├─LICENSE.txt                   授权说明文件
├─think                         命令行入口文件
└─README.md            自述文件（帮助文档）
~~~

> router.php用于php自带webserver支持，可用于快速测试
> 切换到public目录后，启动命令：php -S localhost:8888  router.php
> 上面的目录结构和名称是可以改变的，这取决于你的入口文件和配置参数。


### 3、命名规范

`ThinkPHP5`遵循PSR-2命名规范和PSR-4自动加载规范，并且注意如下规范：

+ 目录和文件
    *   目录不强制规范，驼峰和小写+下划线模式均支持；
    *   类库、函数文件统一以`.php`为后缀；
    *   类的文件名均以命名空间定义，并且命名空间的路径和类库文件所在路径一致；
    *   类名和类文件名保持一致，统一采用驼峰法命名（首字母大写）；



+ 函数和类、属性命名

    *   类的命名采用驼峰法，并且首字母大写，例如 `User`、`UserType`，默认不需要添加后缀，例如`UserController`应该直接命名为`User`；
    *   函数的命名使用小写字母和下划线（小写字母开头）的方式，例如 `get_client_ip`
    *   方法的命名使用驼峰法，并且首字母小写，例如 `getUserName`
    *   属性的命名使用驼峰法，并且首字母小写，例如 `tableName`、`instance`
    *   以双下划线“__”打头的函数或方法作为魔法方法，例如 `__call` 和 `__autoload`


+ 常量和配置
    *   常量以大写字母和下划线命名，例如 `APP_PATH`和 `THINK_PATH`；
    *   配置参数以小写字母和下划线命名，例如 `url_route_on` 和`url_convert`；


+ 数据表和字段
    *   数据表和字段采用小写加下划线方式命名，并注意字段名不要以下划线开头，例如 `think_user` 表和 `user_name`字段，不建议使用驼峰和中文作为数据表字段命名。


## 开发

#### 战略

+ 登陆验证机制
    * 方案：用户认证用jwt

+ api文档生成
    * 方案：根据注释代码生成api文档html页面

+ 长连接方案
    * 方案：

+ 缓存
    * 方案：redis

+ 数据库
    + 方案：MySQL 或 MariaDB

+ 二维码生成

#### 战术

+ 初始配置
    * 开启调试配置
        + 'app_debug'         => true,      // 设置开启调试模式
        + 'app_trace'         => true,       // 应用Trace
    * 开始强制模式路由
        + 'url_param_type'    =>  1,    // 按照顺序解析变量
        + 'url_route_on'      =>  true,
        + 'url_route_must'    =>  true,
    * 使用方法
        + 访问url(地址)： http://域名或IP:端口/index.php/路由
        > 这种方式下面必须严格给每一个访问地址定义路由规则（包括首页），否则将抛出异常。首页的路由规则采用/定义即可
    * 参考资料
        + [ThinkPHP5.0完全开发手册（路由模式）](https://www.kancloud.cn/manual/thinkphp5/118019)
    * 该部分版本：
        + 新增 2018-05-21 18:58:51
        + 增修 2018-06-11 15:39:28


#### 依赖包安装及使用说明


+ 3、另一种根据注释生成api文档模块（api-doc）
    * composer安装weiwei/api-doc
        + 安装命令：在应用根目录下面执行 composer require weiwei/api-doc dev-master
        + 更新命令：在应用根目录下面执行 composer update  weiwei/api-doc dev-master
        + 移除依赖：在应用根目录下面执行 composer remove  weiwei/api-doc  （这只是删除了依赖关系，不会自动加载，但其依赖包还在vender文件夹里，可手动删除）
        + 使用步骤：
            * 1、tp5.0版本会在application/extra下生成doc.php文件（如果没有生成doc.php 配置文件 你可以手动安装，直接在application（你修改的目录）里面创建extra文件夹，然后把扩展包中的vendor\weiwei\api-doc\src\config.php文件复制进去，并重命名为doc.php）
            * 2、把扩展下面的vendor\weiwei\api-doc\src\assets目录复制到你的pulic目录，然后配置static_path=>'/assets'
            * 3、在application/extra/doc.php里修改配置文件（可指定需要生成文档的类）
            * 4、在指定要生成文档的类的里写相关注释（写法参考vendor/weiwei/api-doc/demo.php）
            * 5、访问Api文档：http://域名/index.php/doc
        
    * 参考资料：
        + [tp5 自动生成api文档](https://blog.csdn.net/qq_35349114/article/details/80207849)

    * 该部分版本：
        + 新增 2018-06-11 14:31:30
        + 增修 2018-06-11 14:57:11
        + 增修 2018-06-12 11:51:13



