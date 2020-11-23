<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function trainer()
    {
        return $this->belongsToMany(Trainer::class);
    }

}
