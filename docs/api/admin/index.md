# Query Config

**URL** : `/api/v1/admin/configs/:id`

**Method** : `GET`

**Auth required** : YES 

**Permissions required** : None

**Data example**

```json
{
    "query": "key sw 'MAIL_'",
    "show": 10,
    "page": 1,
    "sort_field": "id",
    "sort_direction": "DESC"
}
```

Please refer [here](https://github.com/railken/search-query) for the syntax of the query param

## Success Response

**Code** : `200 OK`

**Content example**

```json
{
    "resources": [
        {
            "id": 123,
            "key": "MAIL_HOST",
            "value": "localhost",
            "created_at": "2018-01-01 00:00:00",
            "updated_at": "2018-01-01 00:00:00"
        }
    ],
    "pagination": {
        "total": 1,
        "skip": 0,
        "take": 10,
        "from": 1,
        "to": 1,
        "page": 1,
        "pages": 1
    }
}
```

## Error Responses

**Code** : `400 BAD REQUEST`

**Content example**

```json
{
    "errors" : [
        {
            code: 'QUERY_SYNTAX_ERROR',
            message: 'Syntax error'
        },
        {
            code: 'SORT_INVALID_FIELD',
            message: 'Invalid sorting field'
        }
    ]
}
```