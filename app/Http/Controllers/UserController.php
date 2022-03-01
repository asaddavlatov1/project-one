<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session as SessionSession;

class UserController extends Controller
{
    public function check(Request $req)
    {
        $req->validate([
            'login'=>'required',
            'password'=>'required',
        ]);

        $user=User::where('login','=',$req->login)->first();

        if(Hash::check($req->password, $user->password))
        {

       

        if(empty($user))
        return redirect()->back()->with('xabar','Login yoki Parol Xato');

        if($user->status=='1')
        {
            Session::put('user_id', $user->id);
               return  redirect('/admintemplate');
            
        }
        elseif($user->status=='2'){
            

            
            Session::put('user_id', $user->id);
            return redirect('/user');
            
            
        }
    }
     
    }

    public function adduser(Request $add)
    {
        $add ->validate([
            'name' => 'required',
            'pass' => 'required',
            'pass1' => 'required',
            'tel' => 'required',

        ]);


        $check = user::where('login','=',$add->login)->first();
        $check2 = user::where('email','=',$add->email)->first();
        if(!empty($check2))
        {
            return redirect()->back()->with('error', "Email avval ishlatilgan");
        }    
        if(empty($check)) 
        {
            if($add->pass===$add->pass1)
            {

            $user = new user;
            $user ->name = $add->name;
            $user ->status ='2';
            $user ->login = $add->login;
            $user ->password = Hash::make($add->pass);
            $user ->phone = $add->tel;
            $user ->email = $add->email;
            $user ->save();
            }
            else
            {
                return redirect()->back()->with('error', "Parollar bir xil emas");
            }

        } 
        
        else{

            return redirect()->back()->with('error', "Login avval ishlatilgan");
        }


        if($user)
        {
            return redirect()->back()->with('xabar', "Hammasi OK");
        }
        else
        {
            return redirect()->back()->with('error', "Xatolik yuz berdi");
        }

    }

    public function getlogin(Request $req) 
    { 
        $login=User::where('login','=',$req->log)->first();  
        
        if(empty($login))
        {
            $data = "Login Band qilinmagan";
        }
        else
        {
            $data = "O'zgartiring";
        }
        return response()->json($data); 
    }

    
    
}
