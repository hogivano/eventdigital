<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use App\User;
use JWTAuth;
use Carbon\Carbon;
use App\Mail\VerifedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    public function __construct(){
    }

    public function login(Request $request){

        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ];

        $message = [
            'email.required' => 'email harus diisi',
            'email.email' => 'format email salah',
            'password.required' => 'password harus diisi',
        ];

        $valid = Validator::make($request->all(), $rules, $message);

        if (!$valid){
            return response()->json([
                'error' => true,
                'message' => $valid
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!empty($user)){
            if (Hash::check($request->password, $user->password)){
                if ($user->confirmed == 0) {
                    return response()->json([
                        'error' => true,
                        'message' => 'email belum terverifikasi'
                    ]);
                }
                $user->makeHidden(["id", "created_at", "updated_at"]);
                $user->makeVisible(['password', 'remember_token', 'auth_key']);
                $user->error = false;
                return response()->json(Crypt::encrypt($user));
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'email atau password anda salah'
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'message' => 'email atau password anda salah'
            ]);
        }

        // $credentials = request(['email', 'password']);
        //
        // if(!Auth::attempt($credentials)){
        //     return response()->json([
        //         'error' => 'true',
        //         'message' => 'Unauthorized'
        //     ], 401);
        // }
        //
        // return response()->json(Auth::user());
        // $user = $request->user();
        //
        // $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        //
        // if ($request->remember_me)
        //     $token->expires_at = Carbon::now()->addWeeks(1);
        //
        // $token->save();
        //
        // return response()->json([
        //     'access_token' => $tokenResult->accessToken,
        //     'token_type' => 'Bearer',
        //     'expires_at' => Carbon::parse(
        //         $tokenResult->token->expires_at
        //     )->toDateTimeString()
        // ]);
    }

    public function register(Request $req){
        // $req->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|string|email|unique:users',
        //     'password' => 'required|string'
        // ]);
        //
        // $user = new User();
        // $user->name = $req->name;
        // $user->email = $req->email;
        // $user->password = bcrypt($request->password);
        // $user->save();
        //
        // return response()->json([
        //     'message' => 'Successfully created user!'
        // ], 201);

        $valid = Validator::make($req->all(), [
            'username'  => 'required|string|unique:users',
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
            $username = $req->username;

            if( count(Mail::failures()) > 0 ) {
              return response()->json(array(
                'error' => true,
                'message' => 'Akun gagal dibuat. Silahkan coba lagi',
              ));
            }

            else {
                $code = new \stdClass();
                $code->confrim = $token;
                $code->email = $email;
                Mail::to($req->email)->send(new VerifedMail($code));

                $user = User::create([
                      'name' => $req->name,
                      'email' => $email,
                      'username' => $username,
                      'password'  => $password,
                      'role'      => 1,
                      'auth_key' => $token,
                ]);

                return response()->json(array(
                  'error' => false,
                  'message' => 'Akun telah dibuat. Silahkan cek email untuk konfirmasi',
                ));
            }
        }
    }

    public function checkProfile(Request $req){
        $profile = ProfileUsers::where('id', $req->id)->first():
        if ($profile){
            return response()->json([
                'error' => false,
                'message' => 'profile user sudah ada'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'tidak bisa ditambahkan silahkan coba lagi'
            ]);
        }
    }

    public function createProfile(Request $req){
        
    }
}
