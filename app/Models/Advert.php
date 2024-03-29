<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Advert extends Authenticatable
{
    use SoftDeletes;

    public $table = 'adverts';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    protected $fillable = [
        'name',
        'publish_datetime',
        'featured_image',
        'content',
        'meta_tittle',
        'cannocial_link',
        'slug',
        'meta_description',
        'meta_keywords',
        'status',
        'advert_category_id',
        'is_on_category_page',
        'is_on_article_page'
    ];

    public function category()
    {
        return $this->belongsTo(AdvertCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function scopeIsFeaturedAdvert($query)
    {
        return $query->where('is_featured_advert', 1);
    }

}
