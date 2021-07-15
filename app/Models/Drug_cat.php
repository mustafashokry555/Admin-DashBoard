<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug_cat extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function drugs()
    {
        return $this->hasMany(Drug::class);
    }
}
