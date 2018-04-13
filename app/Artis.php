<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\ArtisBanners;

class Artis extends Model {


    protected $fillable = [
        'nama_lengkap', 'nama_panggung', 'tempat_lahir', 'tanggal_lahir', 'pekerjaan', 'deskripsi', 'prestasi', 'images'
    ];

    public $timestamps = false;

    public function ArtisBanners (){
        return $this->hasMany('App\ArtisBanners', 'id_artis', 'id');
    }
}

?>
