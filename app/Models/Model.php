<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id')->withDefault([
                'name' => '--',
            ]);
    }

    public function scopeEnabled($query)
    {
        return $query->where('enabled', 1);
    }
    public function scopeDisabled($query)
    {
        return $query->where('enabled', 0);
    }
}
