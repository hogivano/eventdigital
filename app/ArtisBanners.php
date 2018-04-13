<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Artis;

class ArtisBanners extends Model {


    protected $fillable = [
        'id_artis', 'images'
    ];

    public $timestamps = false;

    public function Artis(){

    }
}

?>
