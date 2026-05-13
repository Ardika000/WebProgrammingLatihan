<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    // 1. Nama Table
    protected $table = "scores";

    // 2. Column apa yang bisa diisi
    protected $fillable = ['student_id', 'course_id', 'score'];

    public function students(){
        return $this->belongsTo(Students::class);
    }
}
