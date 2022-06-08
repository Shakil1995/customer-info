<?php

namespace App\Models;

use App\Models\Area;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable = [
        'area_id',
        'code',
        'name',
        'age',
        'is_active',
        
    ];

    public function areas()
    {
        return $this->belongsTo(Area::class);
    }

    public function scopeOrderByIdDescending($query)
    {
        return $query->orderBy('id', 'DESC');
    }
}
