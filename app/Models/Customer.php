<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;

    protected $table = 'customers';
    protected $fillable = [
        'nombre', 'edad', 'plan',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function trainer()
    {
        return $this->belongsToMany(Trainer::class);
    }

    public function getPlanAttribute($value)
    {
        return mb_strtoupper($value);
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucfirst(strtolower($value));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
