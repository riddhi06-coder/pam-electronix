<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    use HasFactory;

    protected $table = 'product_description';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'banner_image',
        'product_image',
        'product_description',
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
