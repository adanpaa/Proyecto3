<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'trainers';
    protected $fillable = [
        'nombre', 'apellido', 'edad', 'area'
    ];

    public function customer()
    {
        return $this->belongsToMany(Customer::class);
    }
}
