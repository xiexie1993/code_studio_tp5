# 项目-ThinkPHP5学习与研究

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

### 3、 注意事项

+  权限审查：此文档仅供技术部功能组内部使用。
+  保存备份：此文档仅在服务器上作修改，不允许本地备份。
+  该文档采用 markdown 编写规范，建议使用markdownPad或相关编辑工具查看和修改。


## 二、 项目说明

### 1、概述
 



## 三、源码说明

### 1、源代码说明

~~~
/.
├── thinkphp5_server1                      服务端1源码(初始包thinkphp_5.0.20_with_ext.zip )
│  ├── README.md                           自述文件（帮助文档）
│  └──...
├──thinkphp5_server2                       服务端2源码(初始包thinkphp_5.0.20_with_ext.zip )
│  ├── README.md                           自述文件（帮助文档）
│  └──...
├──thinkphp5_workerman                     服务端3源码(WorkerMan的Windows版)
│  ├── README.md                           自述文件（帮助文档）
│  └──...
└── README.md                              自述文件（帮助文档）
~~~

+ 服务端1研究内容
    + php-jwt类（用户身份认证）
    + 根据注释生成api文档模块（makeapidoc）【简单，但功能少】

+ 服务端2研究内容
    + 另一种根据注释生成api文档模块（api-doc）【比较复杂，比较针对tp5框架，功能多，使用稍微复杂】


+ 服务端3研究内容
    * ThinkPHP5集成WorkerMan（WebSocket）windows版


### 2、Web服务器（Nginx配置）

~~~

    ## 项目 服务端1
    server {
        listen       80;
        server_name  server1.tp5.com;

        #charset koi8-r;

        #access_log  logs/server1_tp5_access.log  main;
            root   "C:/MyWorkSpace/GitHub_Prj/code_studio_tp5/thinkphp5_server1/public";
        location / {
            index  index.html index.htm index.php l.php;
           autoindex  off;
        }

        #error_page  404              /404.html;

        # redirect server error pages to the static page /50x.html
        #
        error_page   500 502 503 504  /50x.html;


        # proxy the PHP scripts to Apache listening on 127.0.0.1:80
        #
        #location ~ \.php$ {
        #    proxy_pass   http://127.0.0.1;
        #}

        # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
        #
        location ~ \.php(.*)$  {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_split_path_info  ^((?U).+\.php)(/?.+)$;
            fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
            fastcgi_param  PATH_INFO  $fastcgi_path_info;
            fastcgi_param  PATH_TRANSLATED  $document_root$fastcgi_path_info;
            include        fastcgi_params;
        }

        # deny access to .htaccess files, if Apache's document root
        # concurs with nginx's one
        #
        #location ~ /\.ht {
        #    deny  all;
        #}
    }

    ## 项目 服务端2
    server {
        listen       80;
        server_name   server2.tp5.com;

        #charset koi8-r;

        #access_log  logs/server2_tp5_access.log  main;
            root   "C:/MyWorkSpace/GitHub_Prj/code_studio_tp5/thinkphp5_server2/public";
        location / {
            index  index.html index.htm index.php l.php;
           autoindex  off;
        }

        #error_page  404              /404.html;

        # redirect server error pages to the static page /50x.html
        #
        error_page   500 502 503 504  /50x.html;


        # proxy the PHP scripts to Apache listening on 127.0.0.1:80
        #
        #location ~ \.php$ {
        #    proxy_pass   http://127.0.0.1;
        #}

        # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
        #
        location ~ \.php(.*)$  {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_split_path_info  ^((?U).+\.php)(/?.+)$;
            fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
            fastcgi_param  PATH_INFO  $fastcgi_path_info;
            fastcgi_param  PATH_TRANSLATED  $document_root$fastcgi_path_info;
            include        fastcgi_params;
        }

        # deny access to .htaccess files, if Apache's document root
        # concurs with nginx's one
        #
        #location ~ /\.ht {
        #    deny  all;
        #}
    }

    ## 项目 服务端3 workerman
    server {
        listen       80;
        server_name   workerman1.tp5.com server3.tp5.com;

        #charset koi8-r;

        #access_log  logs/server3_tp5_access.log  main;
            root   "C:/MyWorkSpace/GitHub_Prj/code_studio_tp5/thinkphp5_workerman/public";
        location / {
            index  index.html index.htm index.php l.php;
           autoindex  off;
        }

        #error_page  404              /404.html;

        # redirect server error pages to the static page /50x.html
        #
        error_page   500 502 503 504  /50x.html;


        # proxy the PHP scripts to Apache listening on 127.0.0.1:80
        #
        #location ~ \.php$ {
        #    proxy_pass   http://127.0.0.1;
        #}

        # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
        #
        location ~ \.php(.*)$  {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_split_path_info  ^((?U).+\.php)(/?.+)$;
            fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
            fastcgi_param  PATH_INFO  $fastcgi_path_info;
            fastcgi_param  PATH_TRANSLATED  $document_root$fastcgi_path_info;
            include        fastcgi_params;
        }

        # deny access to .htaccess files, if Apache's document root
        # concurs with nginx's one
        #
        #location ~ /\.ht {
        #    deny  all;
        #}
    }
    
~~~

### 3、数据库配置

+ 建议版本： MySQL
+ 字符集：   utf8--UTF-8 Unicode
+ 排序规则   utf8_general_ci

> 环境要求
> + PHP >= 5.4.0
> + PDO PHP Extension
> + MBstring PHP Extension
> + CURL PHP Extension


## 四、开发记录




## 五、参考资料

+ [ThinkPHP5.0完全开发手册](https://www.kancloud.cn/manual/thinkphp5/118008)

+ [PHP中Trait详解及其应用](https://segmentfault.com/a/1190000008009455)

+ [你必须理解的三大软件原则1_DRY](https://blog.csdn.net/zj_show/article/details/8065836)

+ [你必须理解的三大软件原则2_KISS](https://blog.csdn.net/zj_show/article/details/8071473)

+ [你必须理解的三大软件原则3_YAGNI](https://blog.csdn.net/zj_show/article/details/8078447)

+ [DRY原则和Shy原则](https://blog.csdn.net/haoxing168/article/details/4455340)

+ [Danny.Dai](https://www.cnblogs.com/kinglongdai/archive/2011/10/09/2204134.html)


