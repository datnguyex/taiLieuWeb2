<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
         .register-header {
            margin-top: 30px;
            margin-left: 10px;
            width: calc(100% - 20px);
            text-align: center;
            border: 1px solid black;
            padding: 10px 0px;
        }

        .register-p {
            margin-top: 30px;
            text-align: center;
            font-size: 30px;
        }

        table {
            margin-top: 50px;
        }

        .table-title td {
            text-align: center;
            font-weight: bold;
        }

        table tr td:first-child {
            text-align: center;
        }
        .pagination {
            margin-left : 450px;
            margin-top : 50px;
        }
        img {
        width: 100px;
        height: 100px;
        margin-left:
        }
        .td2 td {
            text-align: center;
            line-height: 100px;
        }
       

    </style>
</body>
</html>
@extends('dashboard')

@section('content')
    <p class="register-p">Danh sách user</p>
    <div class="container">
        <table class="table table-bordered table-sm">
            <tr class="table-title">
                <td>#</td>
                <td>Username</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Images</td>
                <td>Thao tác</td>
            </tr>

            @foreach($users as $user)
          
            <tr class="td2">
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td><img src="{{('images/' . $user->profile_image) }}" alt=""></td>
                <td>
                <a href="{{route('user.readUser', ['id' => $user->id])}}">View | </a>
                    <a href="{{route('user.updateUser', ['id' => $user->id])}}">Edit | </a>
                    <a href="{{route('user.deleteUser',['id' => $user->id])}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>

        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a></li>
            @foreach (range(1, $pages) as $page)
   
        <a class="page-link" href="{{route('user.list',['page' => $page])}}">{{ $page }}</a>
 
@endforeach
       
            <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a></li>
        </ul>
        
    </div>


    
@endsection
