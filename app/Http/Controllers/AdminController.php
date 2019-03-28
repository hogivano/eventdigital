<?php
namespace App\Http\Controllers;

use Auth;
use App\Artis;
use App\ArtisBanners;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller {
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        return view ('admin.index');
    }

    public function artisShow(){
        $artis = Artis::orderBy('nama_lengkap', 'ASC')->get();
        return view ('admin.artis.index', compact('artis'));
    }

    public function artisBaruShow(){
        return view ('admin.artis.baru');
    }

    public function artisCreate(Request $req){
        $valid = Validator::make($req->all(), [
            'images_artis' => 'image|mimes:png,jpg,jpeg|max:10000',
        ]);
        //
        // if ($valid){
        if($req->hasFile('images_artis') && $valid){
            $artis = new Artis();
            $artis->nama_lengkap = $req->nama_lengkap;
            $artis->nama_panggung = $req->nama_panggung;
            $artis->tempat_lahir = $req->tempat_lahir;
            $artis->tanggal_lahir = $req->tanggal_lahir;
            $artis->pekerjaan = $req->pekerjaan;
            if ($req->deskripsi == ""){
                $artis->deskripsi = "";
            } else {
                $artis->deskripsi = $req->deskripsi;
            }
            if ($req->prestasi == ""){
                $artis->prestasi = "";
            } else {
                $artis->prestasi = $req->prestasi;
            }
            $artis->images = "";
            $artis->save();

            $images_artis = 'artis_' . $req->nama_panggung . '.' . $req->file('images_artis')->getClientOriginalExtension();
            $artis->images = $images_artis;
            // $artis->save();
            $path = $req->file('images_artis')->move('artis/' . $artis->id . '/images' , $images_artis);
            Artis::where('id', $artis->id)->update(['images' => $images_artis]);

            $jml = $req->jmlBanner;
            $cek = true;

            if ($jml != ""){
                for ($i=1; $i <= $jml; $i++) {
                    # code...
                    $nameImage = 'banner_' . $i;
                    $valid = Validator::make($req->all(), [
                        $nameImage => 'image|mimes:png,jpg,jpeg|max:10000',
                    ]);

                    if ($valid && $req->hasFile($nameImage)){

                    } else {
                        $cek = false;
                        break;
                    }
                }

                if ($cek){
                    for ($i=1; $i <= $jml; $i++) {
                        $namaBanner = 'banner_' . $i;
                        $banner = 'banner_' . $artis->id . '_' . $i . '.' . $req->file($namaBanner)->getClientOriginalExtension();
                        $path = $req->file($namaBanner)->move('artis/' . $artis->id . '/banner', $banner);

                        $artisBanner = new ArtisBanners();
                        $artisBanner->id_artis = $artis->id;
                        $artisBanner->images = $banner;
                        $artisBanner->save();
                    }
                }
            }

            return redirect ('/admin/artis');
        } else {
            $artis = new Artis();
            $artis->nama_lengkap = $req->nama_lengkap;
            $artis->nama_panggung = $req->nama_panggung;
            $artis->tempat_lahir = $req->tempat_lahir;
            $artis->tanggal_lahir = $req->tanggal_lahir;
            $artis->pekerjaan = $req->pekerjaan;
            if ($req->deskripsi == ""){
                $artis->deskripsi = "";
            } else {
                $artis->deskripsi = $req->deskripsi;
            }
            if ($req->prestasi == ""){
                $artis->prestasi = "";
            } else {
                $artis->prestasi = $req->prestasi;
            }
            $artis->images = "";
            $artis->save();


            $jml = $req->jmlBanner;
            $cek = true;

            if ($jml != ""){
                for ($i=1; $i <= $jml; $i++) {
                    # code...
                    $nameImage = 'banner_' . $i;
                    $valid = Validator::make($req->all(), [
                        $nameImage => 'image|mimes:png,jpg,jpeg|max:10000',
                    ]);

                    if ($valid && $req->hasFile($nameImage)){

                    } else {
                        $cek = false;
                        break;
                    }
                }

                if ($cek){
                    for ($i=1; $i <= $jml; $i++) {
                        $namaBanner = 'banner_' . $i;
                        $banner = 'banner_' . $artis->id . '_' . $i . '.' . $req->file($namaBanner)->getClientOriginalExtension();
                        $path = $req->file($namaBanner)->move('artis/' . $artis->id . '/banner', $banner);

                        $artisBanner = new ArtisBanners();
                        $artisBanner->id_artis = $artis->id;
                        $artisBanner->images = $banner;
                        $artisBanner->save();
                    }
                }
            }

            return redirect ('/admin/artis');
        }
    }

    public function artisDelete($id){
        $artis = Artis::where('id', $id)->delete();
        $artisBanners = ArtisBanners::where('id', $id)->delete();

        if  ($artis || $artisBanners){
            return redirect('/admin/artis');
        } else {
            return response()->json(array(
                'fails'     => true,
                'message'   => 'gagal'
            ));
        }
    }

    public function artisEditShow($id){
        $artis = Artis::where('id', $id)->get();
        return view ('admin.artis.edit', compact('artis'));
    }

    public function endPointIndex(){
        return view('admin.endpoint.index');
    }

    public function logout(){
        Auth::logout();

      // $request->session()->flush();
      //
      // $request->session()->regenerate();

        return redirect('/');
    }

    //guard
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
