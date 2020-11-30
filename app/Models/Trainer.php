<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;

    protected $table = 'trainers';
    protected $fillable = [
        'nombre', 'apellido', 'edad', 'area'
    ];

    public function customer()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function getNombreConApellidoAttribute()
    {
        return $this->nombre . " " . $this->apellido;
    }
}
