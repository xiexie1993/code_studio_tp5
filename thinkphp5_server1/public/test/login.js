

/**
 * 查看Token解密信息(不需登陆)
 */
var CertifiedLogin = function()
{
    // var username = $("#username").val();
    // var passwd   = $("#passwd").val();
    var dataurl  = 'http://server1.tp5.com/index.php/test/Login/login';
    var method   = 'POST';
    var parm     = {
                    username:'admin',
                    passwd:'admin'
                    };
    $.ajax({
        // headers: {
        //     "X-Auth-Token": $.cookie('token')
        // },
        // headers: {
        //     "X-Auth-Token": 'ssss'
        // },
        type: method,
        url: dataurl,
        cache: false,
        async: this.asyncFlag,
        dataType: this.dataType,
        data: parm,
        beforeSend: function () {
            console.log('准备发送，发送内容如下：');
            console.log(parm);
        },
        success: function (result) {
            console.log('发送成功，得到回信如下：');
            console.log(result);
            // 将加密的jwt字符串 存在cookie里
            //创建一个整站cookie ，cookie 的有效期为  天
            // Cookies.set('name', 'value', { expires: 7 }); // 创建一个整站cookie ，cookie 的有效期为  天
            $.removeCookie('Token'); // 删除 Cookie
            if (result.result== "success" ) 
            {
                $.cookie('Token', result.jwt, { expires: 7 });
                // document.getElementById("text_show").innerHTML =JSON.stringify(result);//将json转字符串后写在页面上
            }
            else
            {
                console.log(result.result);
                // document.getElementById("text_show").innerHTML =JSON.stringify(result);//将json转字符串后写在页面上
            }
            document.getElementById("text_show").innerHTML =JSON.stringify(result);//将json转字符串后写在页面上
            // var expire= new Date();  
            // var expiresDate.setTime(expire.getTime() + (1 * 60 * 1000));  
            // //?替换成分钟数如果为60分钟则为 60 * 60 *1000  
            // $.cookie("__cookie__", 'helloworld', {  
            //   path : '/',//cookie的作用域  
            //   expires : expiresDate  
            //  });  
            // }  
        },
        error: function (result) {
            console.log('发生错误，信息如下：');
            console.log(result);
            document.getElementById("text_show").innerHTML =JSON.stringify(result);//将json转字符串后写在页面上
        }, 
    });
}

/**
 * 查看Token解密信息(不需通过认证)
 */
var getJWTInfo = function()
{
    var dataurl  = 'http://server1.tp5.com/index.php/test/Login/getJWTInfo';
    var method   = 'GET';
    var parm     = {
                   };
    console.log($.cookie('Token'));
    $.ajax({
        headers: {
            "X-Auth-Token": $.cookie('Token')
        },
        type: method,
        url: dataurl,
        cache: false,
        async: this.asyncFlag,
        dataType: this.dataType,
        data: parm,
        beforeSend: function () {
            console.log('准备发送，发送内容如下：');
            console.log(parm);
        },
        success: function (result) {
            console.log('发送成功，得到回信如下：');
            console.log(result);
            // 将加密的jwt字符串 存在cookie里
            //创建一个整站cookie ，cookie 的有效期为  天
            // Cookies.set('name', 'value', { expires: 7 }); // 创建一个整站cookie ，cookie 的有效期为  天
            // $.removeCookie('Token'); // 删除 Cookie
            // if (result.result== "success" ) 
            // {
            //     // $.cookie('Token', result.jwt);
            // }
            // else
            // {
            //     console.log(result);
            // }
            document.getElementById("text_show").innerHTML = JSON.stringify(result);;//将json转字符串后写在页面上
            // var expire= new Date();  
            // var expiresDate.setTime(expire.getTime() + (1 * 60 * 1000));  
            // //?替换成分钟数如果为60分钟则为 60 * 60 *1000  
            // $.cookie("__cookie__", 'helloworld', {  
            //   path : '/',//cookie的作用域  
            //   expires : expiresDate  
            //  });  
            // }  
        },
        error: function (result) {
            console.log('发生错误，信息如下：');
            console.log(result);
            document.getElementById("text_show").innerHTML =JSON.stringify(result);//将json转字符串后写在页面上
        }, 
    });

}


/**
 * 查看Token解密信息(需通过认证)
 */
var getUserInfo = function()
{

    var dataurl  = 'http://server1.tp5.com/index.php/test/Index/getUserInfo';
    var method   = 'GET';
    var parm     = {
                    };
    console.log($.cookie('Token'));
    $.ajax({
        headers: {
            "X-Auth-Token": $.cookie('Token')
        },
        type: method,
        url: dataurl,
        cache: false,
        async: this.asyncFlag,
        dataType: this.dataType,
        data: parm,
        beforeSend: function () {
            console.log('准备发送，发送内容如下：');
            console.log(parm);
        },
        success: function (result) {
            console.log('发送成功，得到回信如下：');
            console.log(result);
            // 将加密的jwt字符串 存在cookie里
            //创建一个整站cookie ，cookie 的有效期为  天
            // Cookies.set('name', 'value', { expires: 7 }); // 创建一个整站cookie ，cookie 的有效期为  天
            // $.removeCookie('Token'); // 删除 Cookie
            // if (result.result== "success" ) 
            // {
            //     // $.cookie('Token', result.jwt);
            // }
            // else
            // {
            //     console.log(result);
            // }
            document.getElementById("text_show").innerHTML =JSON.stringify(result);//将json转字符串后写在页面上

            // var expire= new Date();  
            // var expiresDate.setTime(expire.getTime() + (1 * 60 * 1000));  
            // //?替换成分钟数如果为60分钟则为 60 * 60 *1000  
            // $.cookie("__cookie__", 'helloworld', {  
            //   path : '/',//cookie的作用域  
            //   expires : expiresDate  
            //  });  
            // }  
        },
        error: function (result) {
            console.log('发生错误，信息如下：');
            console.log(result);
            document.getElementById("text_show").innerHTML =JSON.stringify(result);//将json转字符串后写在页面上

        }, 
    });

}

