<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ArticleCategory extends Authenticatable
{

    protected $fillable = [
        'name',
        'status',
        'instagram_access_token_1',
        'instagram_access_token_2',
        'featured_image'
    ];

    public function sql()
    {
        return $this
            ->select(
                $this->table.'.id',
                $this->table.'.name',
                $this->table.'.status'
            )->orderBy(
                $this->table.'.name'
            );
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
