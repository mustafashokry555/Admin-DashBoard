<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pharm_drugs()
    {
        return $this->hasMany(Pharm_drug::class);
    }

    public function drug_cat()
    {
        return $this->belongsTo(Drug_cat::class);
    }
}
