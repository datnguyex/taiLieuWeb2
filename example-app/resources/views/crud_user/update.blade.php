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
            left: calc(100% - 20px);
            text-align: center;
            border: 1px solid black;
             padding: 10px 0px;
        }
        .update-main-wrap
        {
            margin-top: 30px;
            width: 40%;
            border: 1px solid black;
            margin-left: calc(50% - 192px);
        }
        .update-main-wrap p 
        {
            text-align: center;
            font-size: 20px;
            
        }
        .update-main-wrap .update-main
        {
         display: flex;
         margin-left: 30px;
        }
        .update-main-wrap .update-main p
        {
            font-size: 15px;
            width: 70px;
        }
        .update-main-wrap .update-main input
        {
        
            width: 240px;
            height: 20px;
            margin-top: 3px;
            margin-left: 30px;
            text-align: left;
            opacity: 0.8;
        }
        .register-main-button
    {
        margin-top: 30px;
        margin-left: 120px;
        margin-bottom: 30px;
    }
   .register-main-button .btn
   {
     padding: 5px 5px;
     margin-left: 10px;
   
   }
    </style>
</head>
<body>
@extends('dashboard')

@section('content')

    <form action="{{route('user.postUpdateUser')}}" method="POST">
    <div class="update-main-wrap">
       <p>Màn hình cập nhật</p>
       <input name="id" type="hidden" value="{{$user->id}}">
       <div class="update-main">
        <p>Username</p>
        <input  type="text" value="{{$user->name}}" name="name" id ="name" required autofocus>
        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif

       </div>
       <div class="update-main">
        <p>Mật Khẩu</p>
        <input type="password" value="" name="password" id="password"  required autofocus>
        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif   
    </div>
       <!-- <div class="update-main">
        <p>Nhập laị Mật Khẩu</p>
        <input style="margin-top: 15px;" type="text" value="XXX">
       </div> -->
       <div class="update-main">
        <p>Email</p>
        <input type="text" name="email" id="email" value="{{$user->email}}"  required autofocus>
        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
       </div>
       <div class="register-main-button">
        <button style="text-decoration: none;" type="button" class="btn btn-link">Đã có tài khoản</button>
        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
     </div>
     @csrf
    </form>
@endsection
</body>
</html>
