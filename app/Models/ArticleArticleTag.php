<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleArticleTag extends Model
{
    public $table = 'article_article_tag';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['article_id', 'article_tag_id'];

    public function sql()
    {
        //
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function articlearticletags()
    {
        return $this->belongsTo(ArticleTag::class);
    }
}
