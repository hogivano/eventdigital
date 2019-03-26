<?php
namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Mail\VerifedMail;
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
            $token = str_random(60);

            if( count(Mail::failures()) > 0 ) {
              return response()->json(array(
                'success' => false,
                'message' => 'Akun gagal dibuat. Silahkan coba lagi',
              ));
            }

            else {
                $code = new \stdClass();
                $code->confrim = $token;
                $code->email = $req->email;

                Mail::to($req->email)->send(new VerifedMail($code));

                $user = User::create([
                      'username' => $req->username,
                      'email' => $email,
                      'password'  => $password,
                      'role'      => 0,
                      'auth_key' => $token,
                  ]);

                return response()->json(array(
                  'success' => true,
                  'message' => 'Akun telah dibuat. Silahkan login',
                ));
          }
        }
    }

    public function verifyUser($token, Request $req){
        $user = User::where('auth_key', $token)->where('email', $req->email)->first();
        if ($user){
            $user->confirmed = 1;
            $user->save();
            return redirect('/l4s0k');
        } else {
            return response()->json([
                'error' => true,
                'message' => 'token tidak valid'
            ]);
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
