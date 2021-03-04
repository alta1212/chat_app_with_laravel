<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\boxchat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class chatcontroller extends Controller
{
    //https://viblo.asia/p/file-storage-trong-laravel-bWrZnv9pZxw
    public function chat()
    {  
        
        $dataUser=[
            "userInfo"=> User::where('userid','=',session()->get('id'))->first()
         ];
        //  dd($dataUser);
        // dd( Storage::url('1614821684_avt.jpg'));
        $data=[
            "dataUser"=> $this->loadUserInfo(),
             "dataBoxChat"=>  $this->loadMessengerBox()
        ];
        //{{$dataBoxChat[0]}}
         //dd($data);
       return view("main.chat",$data);
    }
    ///hiển thị danh sách chat
    function loadMessengerBox()
    {   
         $dataMes=boxchat::where('user1',session()->get('id')) 
            ->orWhere('user2',session()->get('id')) ->get();
        dd($dataMes);
        return $dataMes;
    }
    //hiển thị nội dung chat cuói dungf
    // function getLastmessger($id)
    // {
    //      // $dataMes=boxchat::where('senderid',session()->get('id')) 
    //     //     ->orWhere('receiverid',session()->get('id')) ->get();
    //     $dataMes=DB::select('select  stt.*,mgs.* from message mgs,boxchatmessagestatus stt
    //     where mgs.boxchatid=((select boxchatid from boxchat where user1="'.session()->get('id').'"
    //     and user2="'.$id.'")
    //     or
    //     (select boxchatid from boxchat where user2="'.session()->get('id').'"
    //     and user1="'.$id.')) order by time desc limit 1;');
    //     dd($dataMes);
    //     return $dataMes;
    // }
    function loadUserInfo()
    {   
        $dataUser
            = User::where('userid','=',session()->get('id'))->first();
         
       // dd($dataMes);
        return $dataUser;
    }
}
