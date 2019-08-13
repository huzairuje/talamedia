<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Podcast extends Model
{
    use SoftDeletes;

    public $table = 'podcasts';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'listen_note_podcast_id',
        'title',
        'publisher',
        'image_url_listen_note',
        'thumbnail_url_listen_note',
        'description',
        'country',
        'language',
        'rss_url_from_listen_note',
        'listen_note_url',
        'explicit_content',
        'is_published'
    ];
    public function episode()
    {
        return $this->belongsToMany(PodcastEpisode::class);
    }
}
