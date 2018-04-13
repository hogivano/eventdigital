<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ErrorHandlerController extends Controller {
    public function __construct(){

    }

    public function show400(){
        return view('errors.400');
    }

    public function show401(){
        return view('errors.401');
    }

    public function show403(){
        return view('errors.403');
    }

    public function show404(){
        return view('errors.404');
    }

    public function show405(){
        return view('errors.405');
    }

    public function show408(){
        return view('errors.408');
    }

    public function show500(){
        return view('errors.500');
    }
}

?>
