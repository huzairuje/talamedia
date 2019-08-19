<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageStatic extends Model
{
    use SoftDeletes;

    public $table = 'pages';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'name',
        'content',
        'featured_image',
        'status',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'created_by',
        'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
