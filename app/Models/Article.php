<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Article extends Authenticatable
{

    use SoftDeletes;

    public $table = 'articles';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    protected $fillable = [
        'name',
        'publish_datetime',
        'featured_image',
        'content',
        'meta_tittle',
        'slug',
        'meta_description',
        'meta_keywords',
        'status',
        'article_category_id'
    ];
    public function tag()
    {
       return $this->belongsToMany(ArticleTag::class);
    }

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function articleTags()
    {
        return $this->belongsToMany(ArticleTag::class, 'article_articletags');
    }

}
