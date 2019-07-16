<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleArticletag extends Model
{
    public $table = 'article_articletags';

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
