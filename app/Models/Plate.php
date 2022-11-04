<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

    public function serial()
    {
        return $this->belongsTo(Serialnumbered::class);
    }

    public function Embosser(){
        return $this->hasOne(Embosser::class);
    }
}
