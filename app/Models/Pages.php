<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $table = 'pages';

    protected $fillable = [
        'id',
        'parent_id',
        'title',
        'slug',
        'short_description',
        'long_description',
        'created_at',
        'updated_at',
    ];

    public function subpages(){

        return $this->hasMany(Pages::class, 'parent_id');

    }

}
