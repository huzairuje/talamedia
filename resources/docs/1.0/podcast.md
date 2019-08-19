# Article

---

- [Get All Podcast](#section-get-all-podcast)
- [Get Podcast By Id](#section-get-podcast-by-id)
- [Get Podcast By Title](#section-get-podcast-by-title)
- [Get All Episode By Podcast Title](#section-get-all-episode-by-podcast-title)
- [Get Episode By Podcast Episode Id](#section-get-episode-by-podcast-episode-id)

<a name="section-get-all-podcast"></a>
## Get All Podcast

Get All Podcast

Request Url
```$xslt
https://talamedia.web.id/api/v1/podcasts
```

Response
```$xslt
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Operation successfully executed."
    },
    "pages": {
        "per_page": 10,
        "current_page": 1,
        "last_page": 1,
        "has_more_pages": false,
        "from": 1,
        "to": 1
    },
    "links": {
        "self": "http://localhost:8000/api/v1/podcasts",
        "next": null,
        "prev": null
    },
    "data": [
        {
            "id": 15,
            "listen_note_podcast_id": "41db8df60df342bc87d9054989d29a10",
            "title": "Trifantasia Podcast",
            "publisher": "Trifantasia",
            "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "description": "Trifantasia adalah sebuah podcast tentang seni, sastra, fotografi dari Talamedia Networks. Kami membahas segala hal tentang kehidupan dan keheureuyan serta kebodoran. Surel ke talamedia.id@gmail.com dan follow instagram kami @trifantasia part of @talamedia.id",
            "country": "Indonesia",
            "language": "Indonesian",
            "explicit_content": false
        }
    ]
}
```

<a name="section-get-podcast-by-id"></a>
## Get Podcast By Id

Get Podcast By Id

Request Url
```$xslt
https://talamedia.web.id/api/v1/podcast/{id}
```

{id} = is the integer value from the article properties on the get all Podcasts

example Request
```$xslt
https://talamedia.web.id/api/v1/podcast/15
```

Response

```$xslt
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Operation successfully executed."
    },
    "data": {
        "id": 15,
        "listen_note_podcast_id": "41db8df60df342bc87d9054989d29a10",
        "title": "Trifantasia Podcast",
        "publisher": "Trifantasia",
        "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
        "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
        "description": "Trifantasia adalah sebuah podcast tentang seni, sastra, fotografi dari Talamedia Networks. Kami membahas segala hal tentang kehidupan dan keheureuyan serta kebodoran. Surel ke talamedia.id@gmail.com dan follow instagram kami @trifantasia part of @talamedia.id",
        "country": "Indonesia",
        "language": "Indonesian",
        "explicit_content": false
    }
}
```

<a name="section-get-podcast-by-title"></a>
## Get Podcast By Title

Get Podcast By Title

Request Url
```$xslt
https://talamedia.web.id/api/v1/podcasts/{title}
```

{title} = is the string value from the article properties on the get all Podcasts

example Request
```$xslt
https://talamedia.web.id/api/v1/podcasts/Trifantasia
```

Response
```$xslt
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Operation successfully executed."
    },
    "data": {
        "id": 15,
        "listen_note_podcast_id": "41db8df60df342bc87d9054989d29a10",
        "title": "Trifantasia Podcast",
        "publisher": "Trifantasia",
        "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
        "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
        "description": "Trifantasia adalah sebuah podcast tentang seni, sastra, fotografi dari Talamedia Networks. Kami membahas segala hal tentang kehidupan dan keheureuyan serta kebodoran. Surel ke talamedia.id@gmail.com dan follow instagram kami @trifantasia part of @talamedia.id",
        "country": "Indonesia",
        "language": "Indonesian",
        "explicit_content": false
    }
}
```

<a name="section-get-all-episode-by-podcast-title"></a>
## Get All Episode By Podcast Title

Get All Episode By Podcast Title

Request Url
```$xslt
https://talamedia.web.id/api/v1/podcasts/{title}/episodes/
```

Example Request Url
```$xslt
https://talamedia.web.id/api/v1/podcasts/Trifantasia/episodes/
```

Response
```$xslt
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Operation successfully executed."
    },
    "pages": {
        "per_page": 10,
        "current_page": 1,
        "last_page": 1,
        "has_more_pages": false,
        "from": 1,
        "to": 9
    },
    "links": {
        "self": "http://localhost:8000/api/v1/podcasts/Trifantasia/episodes",
        "next": null,
        "prev": null
    },
    "data": [
        {
            "id": 1,
            "podcast_by": "Trifantasia",
            "listen_note_episode_id": "a7ee7d4c0dda418d965d70a238f6688b",
            "title": "Episode 8.1 - Psychadelic Music, a Gateway of Daydreaming",
            "description": "Music is a part of human life. It was discovered long-long time ago in the time of pre-history. Men have been discovered in nature all of rythm and harmony that may varies. All of the sound in the majestic jungle inspired men through time with a mysterious human-nature relation. As if there is something more than human and nature above the sky.\n\nThe creation of music is about a reflection of human soul. It was begin by the tweet of birds, the roar of lion, and the howling branch of tree that slowly moved by wind. All of this sound was the inspiration for humanbeing. Afterwards, human create a sort of music and a ritual as a way of comunication with something bigger...",
            "listen_note_audio_url": "https://www.listennotes.com/e/p/a7ee7d4c0dda418d965d70a238f6688b/",
            "audio_length_in_second": 3155,
            "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "explicit_content": false
        },
        {
            "id": 2,
            "podcast_by": "Trifantasia",
            "listen_note_episode_id": "77efaec941b14362bd3ba73284f2f78b",
            "title": "Episode X Special 17 Agustus - Ebel Talk, Si Maung",
            "description": "Salam Indonesia, kami kasih ini episode Spesial lagi, dalam rangka 17 agustusan dan Dirgahayu 74 bersama Ebel, selamat mendengarkan!",
            "listen_note_audio_url": "https://www.listennotes.com/e/p/77efaec941b14362bd3ba73284f2f78b/",
            "audio_length_in_second": 273,
            "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast/episode-x-special-17-agustus-uVc6rhYtA_n-28t7y1DCgmq.300x300.jpg",
            "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast/episode-x-special-17-agustus-uVc6rhYtA_n-28t7y1DCgmq.300x300.jpg",
            "explicit_content": false
        },
        {
            "id": 3,
            "podcast_by": "Trifantasia",
            "listen_note_episode_id": "25290f25cb0e441c8e57c300552dd19e",
            "title": "Episode 7 - Obrolan Wedding",
            "description": "Obrolan bersama traveller & podcaster \"URANG & MANEH\" @birawa seputar pernikahan indonesia dan pernikahan negeri jiran malaysia",
            "listen_note_audio_url": "https://www.listennotes.com/e/p/25290f25cb0e441c8e57c300552dd19e/",
            "audio_length_in_second": 2174,
            "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "explicit_content": false
        },
        {
            "id": 4,
            "podcast_by": "Trifantasia",
            "listen_note_episode_id": "a39a82a47c5b4e67804a07bb3f5e5649",
            "title": "Episode 6 - Tobacco Talk and Testing",
            "description": "Santai dan santuy tapi setress, hiyahiyahiya",
            "listen_note_audio_url": "https://www.listennotes.com/e/p/a39a82a47c5b4e67804a07bb3f5e5649/",
            "audio_length_in_second": 1446,
            "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "explicit_content": false
        },
        {
            "id": 5,
            "podcast_by": "Trifantasia",
            "listen_note_episode_id": "fedd2cc03a8b463fadb9fb7553816b61",
            "title": "Episode 5 - Pacar Seorang Seniman WS Rendra",
            "description": "Pembacaan Cerpen dari WS Rendra - Pacar Seorang Seniman",
            "listen_note_audio_url": "https://www.listennotes.com/e/p/fedd2cc03a8b463fadb9fb7553816b61/",
            "audio_length_in_second": 1818,
            "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "explicit_content": false
        },
        {
            "id": 6,
            "podcast_by": "Trifantasia",
            "listen_note_episode_id": "41aa303c851249c490cde10b9f4e7f3d",
            "title": "Episode 4 - Discussion Énérgique",
            "description": "<p>Episode kali ini ngobrol dan diskusi asik bari ngacapruk with Gema Febriansyah and Ali Jafar.</p>",
            "listen_note_audio_url": "https://www.listennotes.com/e/p/41aa303c851249c490cde10b9f4e7f3d/",
            "audio_length_in_second": 1917,
            "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "explicit_content": false
        },
        {
            "id": 7,
            "podcast_by": "Trifantasia",
            "listen_note_episode_id": "bd11b3f5ccf84d38bf295d82ec836a18",
            "title": "Episode 3 - Perkenalan Trifantasia",
            "description": "Episode kali ini mengenai perkenalan nama \"Trifantasia\". Ini berkaitan dengan arti dan makna di balik nama. Saya ditemani oleh Azizah Lufthi dalam perbincangan podcast kali ini. Yap, silahkan mendengarkan!",
            "listen_note_audio_url": "https://www.listennotes.com/e/p/bd11b3f5ccf84d38bf295d82ec836a18/",
            "audio_length_in_second": 682,
            "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "explicit_content": false
        },
        {
            "id": 8,
            "podcast_by": "Trifantasia",
            "listen_note_episode_id": "6ad63c9178ed4f678ecee157abf66d35",
            "title": "Episode 0.2 - Teaser Story Time",
            "description": "Teaser Posdcast of Trifantasia!",
            "listen_note_audio_url": "https://www.listennotes.com/e/p/6ad63c9178ed4f678ecee157abf66d35/",
            "audio_length_in_second": 68,
            "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "explicit_content": false
        },
        {
            "id": 9,
            "podcast_by": "Trifantasia",
            "listen_note_episode_id": "66b7d8e0e87f47908b149d8c1a13ff88",
            "title": "Episode 1 - Sonet 1-6 Sapardi Djoko Damono",
            "description": "Sonet / soneta adalah salah satu kesusastraan Italia, lahir pada pertengahan abad 13. Sonet berarti sajak 14 baris yang merupakan satu pikiran atau perasaan yang bulat.\n1940, Sapardi.",
            "listen_note_audio_url": "https://www.listennotes.com/e/p/66b7d8e0e87f47908b149d8c1a13ff88/",
            "audio_length_in_second": 493,
            "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
            "explicit_content": false
        }
    ]
}
```

<a name="section-get-episode-by-podcast-episode-id"></a>
## Get Episode By Episode Podcast Id

Get All Episode By Podcast Title

Request Url
```$xslt
https://talamedia.web.id/api/v1/podcasts/{title}/episodes/{id}
```

{title} = string Value from Podcast properties "title"

{id} = integer Value from Episode Properties

Example Request Url
```$xslt
https://talamedia.web.id/api/v1/podcasts/Trifantasia/episodes/2
```

Response
```$xslt
{
    "meta": {
        "code": 200,
        "status": "success",
        "message": "Operation successfully executed."
    },
    "data": {
        "id": 1,
        "podcast_by": "Trifantasia",
        "listen_note_episode_id": "a7ee7d4c0dda418d965d70a238f6688b",
        "title": "Episode 8.1 - Psychadelic Music, a Gateway of Daydreaming",
        "description": "Music is a part of human life. It was discovered long-long time ago in the time of pre-history. Men have been discovered in nature all of rythm and harmony that may varies. All of the sound in the majestic jungle inspired men through time with a mysterious human-nature relation. As if there is something more than human and nature above the sky.\n\nThe creation of music is about a reflection of human soul. It was begin by the tweet of birds, the roar of lion, and the howling branch of tree that slowly moved by wind. All of this sound was the inspiration for humanbeing. Afterwards, human create a sort of music and a ritual as a way of comunication with something bigger...",
        "listen_note_audio_url": "https://www.listennotes.com/e/p/a7ee7d4c0dda418d965d70a238f6688b/",
        "audio_length_in_second": 3155,
        "image_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
        "thumbnail_url_listen_note": "https://cdn-images-1.listennotes.com/podcasts/trifantasia-podcast-trifantasia-B2XcxnKNsDF-wa6OgfPVS9q.300x300.jpg",
        "explicit_content": false
    }
}
```








