<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'curp',
        'modulo',
        'direccion'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeUniqueCurpDate($query, $fecha, $curp)
    {
        return $query->where('fecha', $fecha)->where('curp', $curp);
    }
}