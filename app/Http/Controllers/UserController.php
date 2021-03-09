<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 use App\Models\User;
use Directory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
         'nameuser'=>'required|max:20',
         'email'=>'required|email|unique:user',
         'password'=>'required|min:5|max:100',

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
         // if(!$query)
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
            return redirect("chat");
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
    function logout()
    {
      if(session()->has("id"))
      {
         session()->pull("id");

         return redirect('/');
      }
    }
    public function updateDataU(Request $request)
    {   //kiểm tra tính hợp lệ
        //$file = $request->avt;
       // $file1=file_get_contents($request->avt);
      //  dd($request->input());
         $file="";
       if($request->avt) {
          $fileName = time().'_'.$request->avt->getClientOriginalName();
            
          $file=$request->file('avt')->storeAs('avataUser', $fileName, 'public');
          dd($request->file('avt'));
       }
      //https://packagist.org/packages/propaganistas/laravel-phone
        $request->validate([
            'username'=>'required|max:20',
            'email'=>'required|email',
            'avt' => 'mimes:jpeg,bmp,png',
            'quequan'=>'max:100',
            'mota'=>'max:500',
           ]);
          
           //nếu nhập số đt
           if($request->phone)
           $request->validate([
            'phone'=>'phone:US,VN',
           ]);
           
            // dd($request->input());
           //nếu kt thành công
           $query=DB::table('user')
           ->where('userid', session("id"))
           ->update(
            [
               'email' =>$request->email,#mail
               'pass' =>Hash::make($request->password),//hash để mã hoá mật khẩu 
               'name' =>$request->username,
               'mota'=>$request->mota,

               'diachi'=>$request->quequan,
               'phone'=>$request->phone
            ]
            );
            //nếu chọn ảnh
               if($file!="")
               {
                  //xoá avt cũ trong sever
                  $dataUser= User::where('userid','=',session()->get('id'))->first();
                  Storage::disk('public')->delete($dataUser->avata);
                  $query=DB::table('user')
                  ->where('userid', session("id"))
                  ->update(
                     [
                        'avata'=>$file
                     ]
                     );
               }

            if($query)
            {
              return back()->with('xong','Cập nhật thông tin thành công');
            }
            
           
    }

      //lấy về thông in user
   
}
