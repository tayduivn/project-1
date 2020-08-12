
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
</head>

<body>
    <style>
        
body {
    font-size: 14px;
    font-family: Arial, Helvetica, sans-serif;
    background: #286fdb;
}
#wrapper{
    width: 360px;
    margin: 230px auto;
    background: #f1ecec;
    padding: 20px 30px;
    text-align: center;
    border-radius: 3px;
}

#form-login #username,#form-login #password, #form-login #email, #form-login #fullname,#form-login #gender{
    width: 100%;
    padding: 10px 0px;
    margin-right: 10px;
    margin-top: 5px;
    border: none;
}

#form-login #btn_reg{
    width: 100%;
    background: #286fdb;
    color: #f1f2f8;
    padding: 10px 0px ;
    margin: 15px 0px;
    cursor: pointer;
    border: none;
}
#form-login #btn_login{
    width: 100%;
    background: #286fdb;
    color: #f1f2f8;
    padding: 10px 0px ;
    margin: 10px 0px;
    cursor: pointer;
    border: none;
}
a#lost-pass{
    color: #4c51eb;
}
.form-control{
       margin-bottom: 20px;
   }
    h2{
       margin-bottom:40px;
    }
    

    </style>
    <div id="wrapper">
        <h2>Đăng nhập</h2>
        <form action="" method="post" id="form-login" class="form-group">
            <input type="text" name="username" class="form-control" id="username" placeholder=" Tên đăng nhập" value="">

            <input type="password" name="password" class="form-control" id="password" placeholder=" Mật khẩu">
            
            <input type="submit" name="btn_login"  class="btn btn-outline-primary btn-sm" id="btn_login" value="Đăng nhập">
        </form>
         {{--  <a href="" id="lost-pass">Don't remember password?</a><br>   --}}
    <a href="{{url('account/register')}}" id="lost-pass">Register</a>
    </div>
</body>

</html>