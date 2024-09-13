<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supllier_category_id',
        'supplier_category_name',
        'pic_name',
        'supplier_name',
    ];

    /**
     *
     * @return string
     */
    public function getCategorySupplierNameAttribute()
    {
        return $this->supplier_category_name;
    }

    public function category()
    {
        return $this->belongsTo(Supplier::class, 'supllier_category_id', 'id');
    }
}
