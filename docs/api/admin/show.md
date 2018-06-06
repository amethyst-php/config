# Show Config

**URL** : `/api/v1/admin/configs/:id`

**Method** : `GET`

**Auth required** : YES 

**Permissions required** : None

## Success Response
 

**Code** : `200 OK`

**Content example**

```json
{
    "resource": {
        "id": 123,
        "key": "MAIL_HOST",
        "value": "localhost",
        "created_at": "2018-01-01 00:00:00",
        "updated_at": "2018-01-01 00:00:00"
    }
}
```

## Error Responses

**Code** : `404 NOT FOUND`