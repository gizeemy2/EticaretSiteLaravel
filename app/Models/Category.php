<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, int $int)
 */
class Category extends Model
{
    protected $table = 'categories';
    protected $appends =   [
        'parent',
    ];

    #one to many
    public function products(){
        return $this->hasMany(Product::class);
    }
    #One To Many Inverse Tersi

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function children(){
        return $this->hasMany(Category::class,'parent_id');
    }
}
