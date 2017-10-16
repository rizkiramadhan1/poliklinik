<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
	public function dokter() {

        return $this->hasMany('App\Dokter');  

    }

    protected $table = 'poliklinik';
    protected $fillable = 
    ['nama'];

    public $timestamps = false;
}
