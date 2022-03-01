<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\user;

class AddController extends Controller
{
 
    public function add(Request $request)
    {
            
              $request->validate([
                        'name' => 'required',
                        'phone' => 'required|numeric',
                        'comment'=>'required',
              ]);
              
              $add = new user;
              $add -> name = $request ->name;
              $add -> phone = $request ->phone;
              $add -> comment = $request ->comment;
              $add-> save();
              

              return redirect('/')->with('xabar', 'Success OK');
    }
}    