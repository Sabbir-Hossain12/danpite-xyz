<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paintingcost extends Model
{
    use HasFactory;

    public function paintingtypes()
    {
        return $this->belongsTo(Paintingtype::class, 'paintingtype_id');
    }
}
