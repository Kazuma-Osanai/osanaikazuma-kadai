<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv = "content-type" charset = "UTF-8">
    <title>ろくまる農園</title>
</head>
<body>
    会員ログイン<br />
    <br />
    <form method = "post" action = "./member_login_check">   
        @csrf
        登録メールアドレス<br />
        <input type = "text" name = "email"><br />
        <br />
        パスワード<br />
        <input type = "password" name = "pass"><br />
        <br />
        <input type = "submit" value = "ログイン">
    </form>
</body>
</html>
