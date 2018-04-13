<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artis;
use App\ArtisBanners;

class ArtisController extends Controller {
    public function __construct(){

    }

    public function artis(Artis $artis){
        return response()->json($artis->with('ArtisBanners')->get());
    }

    public function artisId(Artis $artis){
        $cek = $artis->select(array('id', 'nama_lengkap'))->get();
        return response()->json($cek);
    }

    public function artisFromIdPosts($id){
        $cek = ArtisRelationships::where('id_posts', $id)->get();
        $merge ="";
        foreach ($cek as $key) {
            # code...
            $artis = Artis::where('id', $key->id_artis)->get();
            if ($artis){
                $merge = $merge . ',' . $artis;
            }
        }
        $merge = str_ireplace("[", "", $merge);
        $merge = str_ireplace("]", "", $merge);
        $merge = substr_replace($merge, "", 0, 1);
        $merge = '[' . $merge . ']';
        // echo json_encode($array);
        return response()->json(json_decode($merge));
    }

    public function artisGetBanners($id){
        $banner = ArtisBanners::where('id_artis', $id)->get();
        return response()->json($banner);
    }
}

?>
