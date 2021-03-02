<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login()
    {
       return view("auth.login");
    }
    public function signup()
    {
       return view("auth.signup");
    }
    public function createUser(Request $request)
    {
         //kiểm tra đầu vào
         //resources/lang/en/validation.php nơi quy tắc được đặt
        $request->validate([
         'nameuser'=>'required',
         'email'=>'required|email|unique:user',
         'password'=>'required|min:5|max:18',

        ]);
        //nếu đầu vào hợP lệ

        
         // $user =new User();
         // $user->email=$request->email;#mail
         // $user->pass=$request->password;
         // $user->name=$request->nameuser;
         // $query=$user->save();
         // if($query)
         // {
         //       return back()->with('xong','ờ m vào đƯợc rồi');
         // }
         // if($query)
         // {
         //       return back()->with('cút','Bố đéo cho vào');
         // }

         //dùng câu query
         $query=DB::table('user')->insert(
            [
               'email' =>$request->email,#mail
               'pass' =>Hash::make($request->password),//hash để mã hoá mật khẩu 
               'name' =>$request->nameuser,
            ]
         );
         if($query)
         {
               return back()->with('xong','ờ m vào được rồi');
         }
         else
         {
            return back()->with('loi','Có lỗi xảy ra vui long thử lại sau');
         }
         

    } 
    public function doLogin(Request $request)
    { 
       //kiêm tra đầu vào
      $request->validate([      
         'email'=>'required|email',
         'password'=>'required|min:5|max:18',
        ]);
      //nếu đầu vào hợp lệ thì cho đăng nhập
      //kiểm tra email đã tồn tại chưa
      $user= User::where('email','=',$request->email)->first();
      if($user)
      {  
         
         //nếu có tồn tại mail thì kiểm tra mật khẩu
         if(Hash::check($request->password,$user->pass))
         {  
            //nêu có thì lưu vào secction
            $request->session()->put('id',$user->userid);
            return redirect("profile");
         }
         else
         {
            return back()->with('loi','Mật khẩu không hợp lệ');
         }
      }
      else
      {
         return back()->with('loi','Email đang nhập không tồn tại');
      }
    }
    function profile()
    {
       if(session()->has("id"))
       { 
       
         //$value = session()->get('id');
         $dataUser=[
            "userInfo"=> User::where('userid','=',session()->get('id'))->first()
         ];
        
       }
       return view('auth.profile',$dataUser);
    }
}
