<?php
namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class SignUpController extends Controller {
    public function __construct (){

    }

    public function daftarPage(){
        return view ("daftar");
    }

    public function signUp(Request $req){

        //validate form

        // $check = $this->validate(request(), [
        //     "username"  => "required",
        //     "email"     => "required",
        //     "password"  => "required"
        // ]);

        // if ($check){
        // //create and save the user
        //     $user = User::create(request([
        //         "username",
        //         "email",
        //         "password"
        //     ]));
        //
        // }
        // $validator = $this->validator($req->all());
        $valid = Validator::make($req->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($valid->fails()){
            return response()->json(array(
                'fail' => true,
                'errors' => $valid->getMessageBag()->toArray()
            ));
        } else {
            $email = $req->email;
            $password = bcrypt($req->password);
            $token = Str::random(60);

            if( count(Mail::failures()) > 0 ) {
              return response()->json(array(
                'success' => false,
                'message' => 'Akun gagal dibuat. Silahkan coba lagi',
              ));
            }

            else {
              $user = User::create([
                    'email' => $email,
                    'password'  => $password,
                    'role'      => 1,
                    'auth_key' => $token,
                ]);

              return response()->json(array(
                'success' => true,
                'message' => 'Akun telah dibuat. Silahkan login',
              ));
          }
        }
    }
    //
        // public function validator($data){
        //     return Validator::make($data, [
        //         'username' => 'required|string|max:255',
        //         'email' => 'required|string|email|max:255|unique:users',
        //         'password' => 'required|string|min:8|confirmed',
        //     ]);
        // }
}
?>
