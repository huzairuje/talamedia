<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
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
        'article_category_id',
        'is_featured_article'
    ];
    public function tag()
    {
       return $this->belongsToMany(ArticleTag::class);
    }

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function articleTags()
    {
        return $this->belongsToMany(ArticleTag::class, 'article_article_tag');
    }

    public function scopeIsFeaturedArticle($query)
    {
        return $query->where('is_featured_article', 1);
    }

}
