<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ProfileUsers extends Model {

    protected $fillable = [
        'id_users', 'nama', 'photo', 'created_at', 'updated_at'
    ];

    public function Users(){
        return $this->hasOne('App\Users', 'id', 'id_users');
    }
}

?>
