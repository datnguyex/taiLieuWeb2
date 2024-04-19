<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        //tra ra giao dien trang login
        return view('crud_user.login');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        //kiem tra email va password khong duoc trong
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    

        //neu co loi thi ham bat loi ben kia se hien len
        // lưu vào đây để xác thực hàm auth
        $credentials = $request->only('email', 'password');
      
        //kiem tra email va password có hop le hay chua
        if (Auth::attempt($credentials)) {

            //hop le thi chuyen sang trang list voi thong bao sign in
            return redirect()->intended('list')
                ->withSuccess('Signed in');
        }
   //khong hop le thi o lai trang user voi thong bao Login details are not valid
        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Registration page
     */
    public function createUser()
    {
        return view('crud_user.create');
    }

    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        //phai dinh dang nhu 1 email / la duy nhat trong bang users/ ngan nhat la 6 ky tu
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // phai la hinh anh..., co kich thuoc la 2mb
            'phone'=>'required'
        ]);


          //lay tat ca tu request
        $data = $request->all();

        //kiem tra co lay hinh anh hay chua
        if ($request->hasFile('profile_image')) {
            // Lưu hình ảnh vào thư mục lưu trữ

            //luu hinh anh vao $image
            $image = $request->file('profile_image');

            //dat ten cho hinh anh neu chon 2 hinh giong nhau
            $imageName = time().'.'.$image->getClientOriginalExtension();

            //luu hinh anh vao 
            $image->move(public_path('images'), $imageName);
    
            // Thêm tên hình ảnh vào dữ liệu để lưu vào cơ sở dữ liệu
            $data['profile_image'] = $imageName;
        }


       //User -> khi ta tạo 1 database sử dụng câu lệnh 
       //php artisan make:model Product -m để tạo ra 1 model tương ứng
       // với table đó, và ta sẽ thao tác trên model thay vì bảng đó
        $check = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_image' => $data['profile_image'],
             'phone' => $data['phone']

        ]);

        return redirect("login");
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request) {
        $user_id = $request->get('id');

        //tim kiem thong tin nguoi dung co id...
        $user = User::find($user_id);

        //khong xái redirect vi truyen du lieu
        return view('crud_user.read', ['messi' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * Form update user page
     */
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
    {
        $input = $request->all();
        //unique:users,id,'.$input['id'], kiem tra chi thay doi cua nguoi dung co id duoc nhap hien tai

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6',
        ]);

       $user = User::find($input['id']);
       $user->name = $input['name'];
       $user->email = $input['email'];
       $user->password = $input['password'];

       //luu gia tri moi
       $user->save();


        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * List of users
     */
    public function listUser()
    {
        //kiem tra co dang nhap hay chua
        if(Auth::check()){
            //  $userTotal = User::all();
            $userTotal = User::count();
            $users = DB::table('users')->paginate(3);
            $pages = ceil($userTotal/3);
            return view('crud_user.list', ['users' => $users,"pages" => $pages]);

            //users la so thanh phan trong 1 trang -> no se tu dinh nghia duoc trang nao minh dang chon 
            //su dung $users->previousPageUrl() de quay lai
            // su dung $users->nextPageUrl() de sang trang tiep theo 
            //range de lam tron , vi du tong co 8 thanh phan va duoc chia thanh 3 trang , 8/3 con 2.3 no se lam tron thanh 3 va trang thu 3 se co it thanh phan hon

         
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Sign out
     */
    public function signOut() {

        //xoa seesion hien tai va dang xuat
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}