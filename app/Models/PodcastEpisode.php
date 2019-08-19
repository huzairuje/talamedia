<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PodcastEpisode extends Model
{
    use SoftDeletes;

    public $table = 'podcast_episodes';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'podcast_id',
        'listen_note_episode_id',
        'title',
        'description',
        'listen_note_audio_url',
        'audio_length_in_second',
        'image_url_listen_note',
        'thumbnail_url_listen_note',
        'explicit_content',
        'is_published',
    ];

    public function podcast()
    {
        return $this->belongsTo(Podcast::class, 'podcast_id');
    }
}
