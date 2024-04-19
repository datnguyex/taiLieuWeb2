<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        .login-header {

            margin-top: 30px;
            width: calc(100% - 20px);
            padding: 10px 0px;
            border: 1px solid black;
            text-align: center;
            margin-left: 10px;



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
            margin-left: 10px;
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
</body>
</html>
@extends('dashboard')
@section('content')
  <form action="{{ route('user.authUser') }}" method="POST">
  <div class="container1">
        <p class="title-main-login">Màn Hình Đăng Nhập</p>
        <div class="main-login-infor1">
            <p style="margin-left: 0px;">Email</p>
            <input style="margin-left: 58px;" name="email" id="email" required autofocus type="text">
            @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
        </div>
        <div class="main-login-infor1">
            <p>Mật khẩu</p>
            <input  name="password" id="password" required autofocus type="password">
            @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
        </div>
        <div class="main-login-check">
        <input type="checkbox" value="">
            <p>Ghi Nhớ Đăng Nhập</p>
        </div>
        <div class="main-login-btn">
            <button style="text-decoration: none;" type="button" class="btn btn-link">Quên Mật Khẩu</button>
            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
        </div>
    </div>
    @csrf
  </form>
@endsection