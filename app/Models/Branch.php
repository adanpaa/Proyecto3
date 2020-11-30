<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;

    protected $table = 'branches';
    protected $fillable = [
        'nombre', 'direccion', 'correo', 'telefono'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst(strtolower($value));
    }

}
