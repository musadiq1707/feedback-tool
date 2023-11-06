<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class CModel extends Eloquent
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $hidden= ['deleted_at'];

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
