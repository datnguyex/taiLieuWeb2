<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          .register-header
    {
        margin-left: 10px;
        width: calc(100% - 20px);
        padding: 10px 0px;
        border: 1px solid black;
        text-align: center;
    }
    .register-main-wrap
    {
        margin-top: 50px;
        width: 40%;
        border: 1px solid black;
        text-align: center;
        margin-left: calc(50% - 194px);
    }
    .register-main-wrap p
    {
      font-size: 20px;
    }
    .register-main
    {
        display: flex;
        margin-left: 85px;
    }
    .register-main p
    {
        font-size: 15px;
    }
    .register-main input
    {
        width: 250px;
        height: 20px;
    
        margin-left: 20px;
    }
    .register-main-button
    {
        margin-top: 30px;
        margin-left: 100px;
        margin-bottom: 30px;
    }
   .register-main-button .btn
   {
     padding: 5px 5px;
   
   }
   
    </style>
</head>
<body>
@extends('dashboard')

@section('content')
  
   <form action="{{route('user.createUser')}}" method="POST" enctype="multipart/form-data">
   <div class="register-main-wrap">
     <p>Màn hình Đăng Ký</p>
     <div class="register-main">
        <p>Username</p>
        <input style="margin-left: 13px," type="text" id="name" name="name" requierd autofocus>
     </div>
     <div class="register-main">
        <p>Mật Khẩu</p>
        <input style="margin-left: 22.5px;" type="password" id="password" name="password" requierd autofocus>
     </div>
     <!-- <div class="register-main">
        <p style="width: 80px; margin-left: -10px;">Nhập Lại Mật Khẩu</p>
        <input style="margin-left: 10px;margin-top: 13px;"  type="text">
     </div> -->
     <div class="register-main">
        <p>Email</p>
        <input style="margin-left: 51px;" type="text" id="email" name="email" required autofocus>
     </div>
     <div class="register-main">
        <p>Phone</p>
        <input style="margin-left: 44px;" type="text" id="phone" name="phone" required autofocus>
     </div>
     <div class="register-main">
        <p>Image</p>
        <!-- <input style="margin-left: 44px;" type="text" id="email" name="email" requierd autofocus> -->
        <input style="height: 50px; margin-left: 45px;" class="img-regis" type="file" name="profile_image" accept="image/*" require autofocus>
     </div>
     <div class="register-main-button">
        <button style="text-decoration: none;" type="button" class="btn btn-link">Đã có tài khoản</button>
        <button type="submit" class="btn btn-primary">Đăng Ký</button>
     </div>
     @csrf
   </form>
@endsection
</body>
</html>
