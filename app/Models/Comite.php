<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function priode()
    {
        return $this->belongsTo(Priode::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
