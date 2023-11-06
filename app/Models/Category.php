<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','enabled','created_at','updated_at'];

    public function scopeEnabled($query)
    {
        return $query->where('enabled', 1);
    }
    public function scopeDisabled($query)
    {
        return $query->where('enabled', 0);
    }
}
