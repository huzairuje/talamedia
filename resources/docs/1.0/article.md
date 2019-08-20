# Article

---

- [Get All Article](#section-get-all-article)
- [Get Article By Id](#section-get-article-by-id)
- [Get Article By Slug](#section-get-article-by-slug)
- [Get Article Category](#section-get-article-category)
- [Get Article By Category](#section-get-article-by-category)
- [Get Article Featured](#section-get-articles-featured)

<a name="section-get-all-article"></a>
## Get All Article

Get All Article

Request Url 
```$xslt
https://talamedia.web.id/api/v1/articles
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
        "self": "https://talamedia.web.id/api/v1/articles",
        "next": null,
        "prev": null
    },
    "data": [
        {
            "id": 2,
            "name": "Kenapa Podcast Semakin Ramai?",
            "publish_datetime": "2019-08-17 15:38:05",
            "featured_image": "https://talamedia.web.id/storage/images/2019-08-17 15:15:160_bmi5KFt3_sZcvr_b.png",
            "slug": "Kenapa Podcast Semakin Ramai?",
            "created_by": "Probo Agung Laksono",
            "is_featured": 1
        },
        {
            "id": 1,
            "name": "test_artikel",
            "publish_datetime": "2019-08-16 22:17:38",
            "featured_image": "https://talamedia.web.id/storage/images/2019-08-16 22:17:382019-07-23 03_29_43jokowi-prabowo.jpg",
            "slug": "test_artikel",
            "created_by": "admin",
            "is_featured": 1
        }
    ]
}
```

<a name="section-get-article-by-id"></a>
## Get Article By Id

Request Url 

```$xslt
https://talamedia.web.id/api/v1/article/{id}
``` 

{id} = is the integer value from the article properties on the get all articles

example Request Url

```$xslt
https://talamedia.web.id/api/v1/article/2
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
        "id": 2,
        "name": "Jokowi VS Prabowo ngaden di MRT",
        "publish_datetime": "2019-07-26 16:53:50",
        "featured_image": "https://talamedia.id/storage/images/2019-07-23 03:29:43jokowi-prabowo.jpg",
        "content": "<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Pertemuan Presiden Joko Widodo dan Ketua Umum Partai Gerindra Prabowo Subianto di MRT jurusan Stasiun Lebak Bulus sampai Stasiun FX Senayan ini mencuri perhatian warganet. Pertemuan kedua politisi ini membuat warganet pun mengingat akan sosok yang mirip Jokowi dan Prabowo tengah tertidur di KRL.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Hal tersebut diungkapkan oleh pemilik akun @DesnaMonica di media sosial Twitter yang coba mencocokkan foto kedua sosok yang mirip dengan potret pertemuan Jokowi dan Prabowo.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">baca juga:</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Politisi PKS: Jangan Sedih Walau Kita Kecewa</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Pertemuan Jokowi dan Prabowo di MRT Jadi Sorotan Media Asing</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">PA 212: Kemungkinan yang Beri Masukan ke Prabowo Bertemu Jokowi adalah Pengkhianat</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">\"Masih ingat dengan 2 orang ini? Lelah di KRL akhirnya mereka dipertemukan di MRT,\" tulis Desna sambil melampirkan foto dua orang yang sempat viral karena memiliki kemiripan dengan Jokowi dan Prabowo.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Masih ingat dengan 2 orang ini? Lelah di KRL, akhirnya mereka dipertemukan di MRT.#03PersatuanIndonesia ?? pic.twitter.com/pwWqda5dr6</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&mdash; Desna Monica (@DesnaMonica) 13 Juli 2019</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Sontak saja cuitan dari @DesnaMonica ini langsung viral di dunia maya dengan lebih dari 5000 Retweet. Bahkan, beberapa warganet pun membalas dengan berbagai respons.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<blockquote>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><em style=\"font-family: georgia, palatino, serif; font-size: 32px;\">\"Aku ada Uje adalah jalang yang selalu kemana mana pergi kasana kmeari main ular tangga da teman temannya\"</em></p>\r\n</blockquote>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\">&nbsp;</p>\r\n<blockquote>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">\"Nasib orang memang misteri. Tak disangka tak pula diduga. Wkwkw,\" tulis @Vendta_Deje</span></p>\r\n</blockquote>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><a href=\"https://tirto.id/malam-jahanam-di-tenabang-momen-momen-menentukan-menuju-kerusuhan-d853\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">\"Dulu beda gerbong skrg segerbong,\" ungkap akun @Donni_Nodd</span></a></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Selain itu, akun @Detachment_81 justru membuatkan meme dari foto keduanya.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">pic.twitter.com/AzBee3nE5P</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&mdash; Sandi Yudha (@Detachment_81) 13 Juli 2019</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Gimana menurut kalian guys?</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Source : akurat.co</span></p>",
        "meta_tittle": null,
        "slug": "Jokowi VS Prabowo ngaden di MRT",
        "meta_keywords": "Jokowi VS Prabowo ngaden di MRT",
        "meta_description": "Jokowi VS Prabowo ngaden di MRT",
        "status": "Published",
        "article_category": "BeritaBaik",
        "created_at": "2019-07-23T03:29:43.000000Z",
        "updated_at": "2019-07-26T16:53:50.000000Z",
        "created_by": "admin"
    }
}
``` 

<a name="section-get-article-by-slug"></a>
## Get Article By Slug

Request Url 

```$xslt
https://talamedia.web.id/api/v1/articles/{slug}
```

{slug} = String Value from Article Properties from "slug"

example request

```$xslt
https://talamedia.web.id/api/v1/articles/Jokowi%20VS%20Prabowo%20ngaden%20di%20MRT
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
        "id": 2,
        "name": "Jokowi VS Prabowo ngaden di MRT",
        "publish_datetime": "2019-07-26 16:53:50",
        "featured_image": "https://talamedia.id/storage/images/2019-07-23 03:29:43jokowi-prabowo.jpg",
        "content": "<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Pertemuan Presiden Joko Widodo dan Ketua Umum Partai Gerindra Prabowo Subianto di MRT jurusan Stasiun Lebak Bulus sampai Stasiun FX Senayan ini mencuri perhatian warganet. Pertemuan kedua politisi ini membuat warganet pun mengingat akan sosok yang mirip Jokowi dan Prabowo tengah tertidur di KRL.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Hal tersebut diungkapkan oleh pemilik akun @DesnaMonica di media sosial Twitter yang coba mencocokkan foto kedua sosok yang mirip dengan potret pertemuan Jokowi dan Prabowo.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">baca juga:</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Politisi PKS: Jangan Sedih Walau Kita Kecewa</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Pertemuan Jokowi dan Prabowo di MRT Jadi Sorotan Media Asing</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">PA 212: Kemungkinan yang Beri Masukan ke Prabowo Bertemu Jokowi adalah Pengkhianat</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">\"Masih ingat dengan 2 orang ini? Lelah di KRL akhirnya mereka dipertemukan di MRT,\" tulis Desna sambil melampirkan foto dua orang yang sempat viral karena memiliki kemiripan dengan Jokowi dan Prabowo.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Masih ingat dengan 2 orang ini? Lelah di KRL, akhirnya mereka dipertemukan di MRT.#03PersatuanIndonesia ?? pic.twitter.com/pwWqda5dr6</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&mdash; Desna Monica (@DesnaMonica) 13 Juli 2019</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Sontak saja cuitan dari @DesnaMonica ini langsung viral di dunia maya dengan lebih dari 5000 Retweet. Bahkan, beberapa warganet pun membalas dengan berbagai respons.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<blockquote>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><em style=\"font-family: georgia, palatino, serif; font-size: 32px;\">\"Aku ada Uje adalah jalang yang selalu kemana mana pergi kasana kmeari main ular tangga da teman temannya\"</em></p>\r\n</blockquote>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\">&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\">&nbsp;</p>\r\n<blockquote>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">\"Nasib orang memang misteri. Tak disangka tak pula diduga. Wkwkw,\" tulis @Vendta_Deje</span></p>\r\n</blockquote>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><a href=\"https://tirto.id/malam-jahanam-di-tenabang-momen-momen-menentukan-menuju-kerusuhan-d853\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">\"Dulu beda gerbong skrg segerbong,\" ungkap akun @Donni_Nodd</span></a></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Selain itu, akun @Detachment_81 justru membuatkan meme dari foto keduanya.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">pic.twitter.com/AzBee3nE5P</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&mdash; Sandi Yudha (@Detachment_81) 13 Juli 2019</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Gimana menurut kalian guys?</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height: 1.2; background-color: #ffffff; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11.5pt; font-family: Arial; color: #666666; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Source : akurat.co</span></p>",
        "meta_tittle": null,
        "slug": "Jokowi VS Prabowo ngaden di MRT",
        "meta_keywords": "Jokowi VS Prabowo ngaden di MRT",
        "meta_description": "Jokowi VS Prabowo ngaden di MRT",
        "status": "Published",
        "article_category": "BeritaBaik",
        "created_at": "2019-07-23T03:29:43.000000Z",
        "updated_at": "2019-07-26T16:53:50.000000Z",
        "created_by": "admin"
    }
}
```

<a name="section-get-article-category"></a>
## Get Article Category

Request Url 

```$xslt
https://talamedia.web.id/api/v1/articles-category
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
        "to": 6
    },
    "links": {
        "self": "https://talamedia.web.id/api/v1/articles-category",
        "next": null,
        "prev": null
    },
    "data": [
        {
            "id": 1,
            "name": "BeritaBaik",
            "featured_image": null,
            "status": true,
            "instagram_access_token_1": null,
            "instagram_access_token_2": null,
            "instagram_access_token_3": null,
            "slug": null,
            "created_at": "2019-08-16T19:10:49.000000Z",
            "updated_at": "2019-08-16T19:10:49.000000Z"
        },
        {
            "id": 2,
            "name": "InfoKampus",
            "featured_image": null,
            "status": true,
            "instagram_access_token_1": "4302286755.1677ed0.5c2e5e61c3d84efa9ee8920ac2b1cc89",
            "instagram_access_token_2": "5427535868.1677ed0.b5435eed4d624002aa696941ae678c76",
            "instagram_access_token_3": null,
            "slug": null,
            "created_at": "2019-08-16T19:10:49.000000Z",
            "updated_at": "2019-08-16T19:10:49.000000Z"
        },
        {
            "id": 3,
            "name": "RuangKota",
            "featured_image": null,
            "status": true,
            "instagram_access_token_1": "2512571853.1677ed0.e01dd7ec0f4047f38475552924875c23",
            "instagram_access_token_2": "5326334945.1677ed0.f47f75244a4e4715a7bfca086f80f9c1",
            "instagram_access_token_3": null,
            "slug": null,
            "created_at": "2019-08-16T19:10:49.000000Z",
            "updated_at": "2019-08-16T19:10:49.000000Z"
        },
        {
            "id": 4,
            "name": "Podcast",
            "featured_image": null,
            "status": true,
            "instagram_access_token_1": "2160507790.1677ed0.3b66615cbb6843f28b6d741fdecf1961",
            "instagram_access_token_2": null,
            "instagram_access_token_3": null,
            "slug": null,
            "created_at": "2019-08-16T19:10:49.000000Z",
            "updated_at": "2019-08-16T19:10:49.000000Z"
        },
        {
            "id": 5,
            "name": "Event",
            "featured_image": null,
            "status": true,
            "instagram_access_token_1": null,
            "instagram_access_token_2": null,
            "instagram_access_token_3": null,
            "slug": null,
            "created_at": "2019-08-16T19:10:49.000000Z",
            "updated_at": "2019-08-16T19:10:49.000000Z"
        },
        {
            "id": 6,
            "name": "Kerjasama",
            "featured_image": null,
            "status": true,
            "instagram_access_token_1": null,
            "instagram_access_token_2": null,
            "instagram_access_token_3": null,
            "slug": null,
            "created_at": "2019-08-16T19:10:49.000000Z",
            "updated_at": "2019-08-16T19:10:49.000000Z"
        }
    ]
}
```

<a name="section-get-article-by-category"></a>
## Get Article By Category

Request Url 

```$xslt
https://talamedia.web.id/api/v1/articles-by-category/{name-category}
```
example Request, with the name of category from get Article Category
```$xslt
https://talamedia.web.id/api/v1/articles-by-category/BeritaBaik
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
        "to": 2
    },
    "links": {
        "self": "https://talamedia.web.id/api/v1/articles-by-category/BeritaBaik",
        "next": null,
        "prev": null
    },
    "data": [
        {
            "id": 5,
            "name": "10 Akun Instagram Terpopuler untuk Pelaku Startup",
            "publish_datetime": "2019-08-17 16:48:05",
            "featured_image": "https://talamedia.web.id/storage/images/2019-08-17 16:48:05Instagram-on-iPhone-Featured.jpg",
            "slug": "10 Akun Instagram Terpopuler untuk Pelaku Startup",
            "created_by": "Probo Agung Laksono",
            "is_featured": true
        },
        {
            "id": 1,
            "name": "test_artikel",
            "publish_datetime": "2019-08-16 22:17:38",
            "featured_image": "https://talamedia.web.id/storage/images/2019-08-16 22:17:382019-07-23 03_29_43jokowi-prabowo.jpg",
            "slug": "test_artikel",
            "created_by": "admin",
            "is_featured": true
        }
    ]
}
```

<a name="section-get-articles-featured"></a>
## Get Article Featured

This Section get All Article Featured. where "is_featured = true"

Request Url 

```$xslt
https://talamedia.web.id/api/v1/articles-featured
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
        "per_page": 4,
        "current_page": 1,
        "last_page": 2,
        "has_more_pages": true,
        "from": 1,
        "to": 4
    },
    "links": {
        "self": "https://talamedia.web.id/api/v1/articles-featured",
        "next": "https://talamedia.web.id/api/v1/articles-featured?page=2",
        "prev": null
    },
    "data": [
        {
            "id": 6,
            "name": "Ini 13 Perguruan Tinggi Negeri Terbaik di Indonesia 2019, ITB Nomor 1",
            "publish_datetime": "2019-08-17 17:00:43",
            "featured_image": "https://talamedia.web.id/storage/images/2019-08-17 17:00:43itb2.jpg",
            "slug": "Ini 13 Perguruan Tinggi Negeri Terbaik di Indonesia 2019, ITB Nomor 1",
            "created_by": "Probo Agung Laksono",
            "is_featured": true
        },
        {
            "id": 5,
            "name": "10 Akun Instagram Terpopuler untuk Pelaku Startup",
            "publish_datetime": "2019-08-17 16:48:05",
            "featured_image": "https://talamedia.web.id/storage/images/2019-08-17 16:48:05Instagram-on-iPhone-Featured.jpg",
            "slug": "10 Akun Instagram Terpopuler untuk Pelaku Startup",
            "created_by": "Probo Agung Laksono",
            "is_featured": true
        },
        {
            "id": 3,
            "name": "Mengenal Podcast Dan Kelebihannya Dibandingkan Radio Dan Video",
            "publish_datetime": "2019-08-17 16:22:46",
            "featured_image": "https://talamedia.web.id/storage/images/2019-08-17 16:22:462310-tips-teknologi_feat.jpg",
            "slug": "Mengenal Podcast Dan Kelebihannya Dibandingkan Radio Dan Video",
            "created_by": "Probo Agung Laksono",
            "is_featured": true
        },
        {
            "id": 2,
            "name": "Kenapa Podcast Semakin Ramai?",
            "publish_datetime": "2019-08-17 15:38:05",
            "featured_image": "https://talamedia.web.id/storage/images/2019-08-17 15:15:160_bmi5KFt3_sZcvr_b.png",
            "slug": "Kenapa Podcast Semakin Ramai?",
            "created_by": "Probo Agung Laksono",
            "is_featured": true
        }
    ]
}
```
