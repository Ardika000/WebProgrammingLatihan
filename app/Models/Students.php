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
    public function student_scores(){
        return $this->hasMany(Scores::class, 'student_id');
    }

    // 4. custom function
    public function getAverage(): float{
        // if($this->relationLoaded('student_scores')){
        $count = $this->student_scores->count();
        if($count == 0) return 0;

        return round($this->student_scores->avg('score',2));
        // }

        // return 0;
    }

}
