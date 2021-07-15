<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharm_drug extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function drugs()
    {
        return $this->hasMany(Drug::class);
    }
}
