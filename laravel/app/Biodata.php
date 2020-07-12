<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';

    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'tanggal_lahir',
        'alamat',
        'hobi',
        'quote',
        'id_kelas',
        'foto',
    ];

    public function getNamaAttribute($nama){   
    return ucwords($nama);  
}
  
    public function setNamaAttribute($nama){     
    $this->attributes['nama'] = strtolower($nama);  
}

    public function ibukandung(){    
    return $this->hasOne('App\Ibukandung', 'id_biodata');
   }

   public function kelas(){
       return $this->belongsTo('App\kelas', 'id_kelas');
   }

}
