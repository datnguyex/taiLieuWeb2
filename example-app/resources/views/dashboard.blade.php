<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10.48.0 - CRUD User Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
       

    <style>
         .login-header {

margin-top: 30px;
width: calc(100% - 20px);
padding: 10px 0px;
border: 1px solid black;
text-align: center;
margin-left: 10px;
margin-bottom: 30px;

}
.login-header a {
    color: black;
    text-decoration: none;
}

.container1 {
left: 50%;
width: 40%;
border: 1px solid black;
position: relative;
left: calc(50% - 275px);
margin-top: 50px;

}

.title-main-login {
text-align: center;
font-size: 25px;
}

.main-login-infor1 {
display: flex;
margin-left: calc(7%);

}

.main-login-infor1 input {
width: 270px;
height: 20px;
border: 1px solid black;
margin-top: 5px;
margin-left: 30px;
}

.main-login-check {
display: flex;
margin-left: 130px;

}

.main-login-check p {
margin-top: 15px;
margin-left: 7px;
font-size: 14px;

}

.main-login-btn {
margin-left: 152px;
margin-bottom: 20px;
}
        
    </style> 
</head>
<body>
<div class="login-header">
@guest
    <a href="">Home |</a>
    <a href="{{ route('login') }}">Đăng Nhập | <a>
    <a href="{{ route('user.createUser') }}">Đăng Ký | </a>
 @else    
 <a href="{{ route('signout') }}">Đăng Xuất</a>
 @endguest
</div>

@yield('content')



</div>
    <div class="login-header">Lập trình web @01/2024</div>
</body>

    
</body>
</html>