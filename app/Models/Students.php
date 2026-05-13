<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    # Dalam membuat sebuah model ada 4 hal yang perlu dipastikan yaitu :
    // 1. Nama Table
    protected $table = "students";

    // 2. Column apa yang bisa diisi
    protected $fillable = ['name', 'nim'];

    // 3. relasi
    public function scores(){
        return $this->hasMany(Scores::class);
    }


    // 4. custom function
    public function getAverage(){
        if($this->relationLoaded('scores')){
            $count = $this->scores->count();
            if($count == 0) return 0;

            return round($this->scores->avg('score',2));
        }

        return 0;
    }

}
