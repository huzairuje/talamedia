# Page Static

---

- [Get All Page Static](#section-get-all-page-static)
- [Get Page Static By Id](#section-get-page-static-by-id)
- [Get Page Static By Name](#section-get-page-static-by-name)

<a name="section-get-all-page-static"></a>
## Get All Page Static

Get Page Static

Request Url
```$xslt
https://talamedia.web.id/api/v1/pages
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
        "from": null,
        "to": null
    },
    "links": {
        "self": "http://localhost:8000/api/v1/pages",
        "next": null,
        "prev": null
    },
    "data": []
}
```

<a name="section-get-page-static-by-id"></a>
## Get Page Static By Id

Get Page Static By Id

Request Url
```$xslt
https://talamedia.web.id/api/v1/pages/{id}
```

Example Request
```$xslt
https://talamedia.web.id/api/v1/pages/2
```

Response
```$xslt
{
    "meta": {
        "status": 404,
        "message": "Not Found"
    }
}
```

<a name="section-get-page-static-by-name"></a>
## Get Page Static By Name

Get Page Static By Name

Request Url
```$xslt
https://talamedia.web.id/api/v1/pages/{name}
```

{name} = String Value from Page Static properties "name"

Example Request
```$xslt
https://talamedia.web.id/api/v1/pages/Medpart
```

Response
```$xslt
{
    "meta": {
        "status": 404,
        "message": "Not Found"
    }
}
```
