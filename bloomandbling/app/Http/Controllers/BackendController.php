<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    //
    public function login() {
        return view('backend.login');
    }
    public function loginAfter(Request $req) {
        $email = $req->email;
        $password = $req->password;
        $result = Admin::where(['email'=>$email,'password'=>$password])->get();
        // echo "<pre>";
        // print_r($result);
        if(isset($result['0']->id)){
return view('backend.dashboard');
        } else {
$req->Session()->flash('error','please login valid details');
            return redirect('admin');
        }
// return $result;

    }

    public function logout() {
        return redirect('/admin');
    }
}
