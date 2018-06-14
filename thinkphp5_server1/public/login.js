
var loginFun = function () {

    if ($('#loginform').form('validate')) {

        Qrck.post(Qrck.baseApiLoginUrl, $('#loginform').serialize(), function () {
            $.messager.progress({
                text: '登录验证中请稍后……',

            });
        }, function (data) {
            var login_name = $('#username').val();

            $.cookie('login_name', login_name, {path: Qrck.cookiePath});
            $.cookie('token', data.token, {path: Qrck.cookiePath});

            window.location.href = Qrck.baseHtmlUrl + Qrck.baseHtmlMain;
        }, function (data) {
            $.messager.progress('close');
            $.messager.show({
                title: '提示',
                msg: '用户不存在或密码错误，请重新登录',
                showType: 'slide',
            });
        });
    }
};

var CertifiedLogin = function()
{
    var username = $("#username").val();
    var passwd   = $("#passwd").val();
    var dataurl  = 'http://datasynlocal.xzb.com/index.php/api/login/login';
    var method   = 'POST';
    var parm     = {
                    username:'admin',
                    passwd:'admin'
                    };
    $.ajax({
        // headers: {
        //     "X-Auth-Token": $.cookie('token')
        // },
        headers: {
            "X-Auth-Token": 'ssss'
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
            console.log('准备成功，得到回信如下：');
            console.log(result);
            // 将加密的jwt字符串 存在cookie里
            //创建一个整站cookie ，cookie 的有效期为  天
            // Cookies.set('name', 'value', { expires: 7 }); // 创建一个整站cookie ，cookie 的有效期为  天
            $.removeCookie('Token'); // 删除 Cookie
            if (result.result== "success" ) 
            {
                $.cookie('Token', result.jwt);
            }
            else
            {
                console.log(result.result);
            }
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
        }, 
    });
}

var SendInfo = function()
{

    var dataurl  = 'http://datasynlocal.xzb.com/index.php/api/Index/hello';
    var method   = 'POST';
    var parm     = {
                    username:'admin'
                    };
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
            console.log('准备成功，得到回信如下：');
            console.log(result);
            // 将加密的jwt字符串 存在cookie里
            //创建一个整站cookie ，cookie 的有效期为  天
            // Cookies.set('name', 'value', { expires: 7 }); // 创建一个整站cookie ，cookie 的有效期为  天
            $.removeCookie('Token'); // 删除 Cookie
            if (result.result== "success" ) 
            {
                $.cookie('Token', result.jwt);
            }
            else
            {
                console.log(result.result);
            }
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
        }, 
    });

}

// CertifiedLogin();
// var loginFun = function () {
//     if ($('#loginform').form('validate')) {

//         Qrck.post(Qrck.baseApiLoginUrl, $('#loginform').serialize(), function () {
//             $.messager.progress({
//                 text: '登录验证中请稍后……',

//             });
//         }, function (data) {
//             var login_name = $('#username').val();

//             $.cookie('login_name', login_name, {path: Qrck.cookiePath});
//             $.cookie('token', data.token, {path: Qrck.cookiePath});

//             window.location.href = Qrck.baseHtmlUrl + Qrck.baseHtmlMain;
//         }, function (data) {
//             $.messager.progress('close');
//             $.messager.show({
//                 title: '提示',
//                 msg: '用户不存在或密码错误，请重新登录',
//                 showType: 'slide',
//             });
//         });
//     }
// };






// GetAjaxData: function (url, method, parm, beforeSend, success, error) {

//     var dataurl = this.baseApiUrl + url;
//     $.ajax({
//         headers: {
//             "X-Auth-Token": $.cookie('token')
//         },
//         type: method,
//         url: dataurl,
//         cache: false,
//         async: this.asyncFlag,
//         dataType: this.dataType,
//         data: parm,
//         beforeSend: function () {
//             if (typeof beforeSend === "function") {
//                 beforeSend();
//             }
//         },
//         success: function (result) {
//             if (typeof success === "function") {
//                 success(result);
//             }
//         },
//         error: function (result) {
//             if (typeof error === "function") {
//                 error(result);
//             }
//         },
//     });
// },
