<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string|null file_name
 */
class Image extends Model
{
    protected $fillable = [
        'file_name'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
