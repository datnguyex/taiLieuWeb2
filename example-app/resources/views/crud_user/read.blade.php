<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
         .register-header
        {
           margin-top: 30px;
           margin-left: 10px; 
            width: calc(100% - 20px);
            text-align: center;
            border: 1px solid black;
             padding: 10px 0px;
        }
        .view-main-wrap
        {
            margin-top: 30px;
            width: 40%;
            border: 1px solid black;
            margin-left: calc(50% - 192px);
            
        }
        .view-main-wrap .view-p
        {
            font-size: 20px;
            text-align: center;
        }
        .view-main
        {
          display: flex;
          margin-left: 75px;
        }
        .view-main p 
        {
          width: 70px;
          
        }
        .view-main h6
        {
         
          margin-left: 30px;
        }
        .register-main-button
    {
        margin-left: calc(70% - 30px);
        margin-bottom: 30px;
    }
   .register-main-button .btn
   {
     padding: 5px 5px;
     margin-left: 10px;
   
   }
    </style>
</body>
</html>
@extends('dashboard')

@section('content')
    <div class="view-main-wrap">
            <p class="view-p">Màn hình chi tiết</p>
            <div class="view-main">
                <p>Username</p>
                <h6>{{$messi->name}}</h6>
            </div>
            <div class="view-main">
                <p>Email</p>
                <h6>{{$messi->email}}</h6>
            </div>
            <div class="register-main-button">
                <button type="button" class="btn btn-primary">Chỉnh sửa</button>
            </div>
        </div>
@endsection