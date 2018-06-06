# Create Config

**URL** : `/api/v1/admin/configs`

**Method** : `POST`

**Auth required** : YES 

**Permissions required** : config.create

**Data example**

```json
{
    "key": "MAIL_HOST",
    "value": "localhost",
}
```
Please refer [here](/docs/common/attributes.md) for the full explanation of parameters

## Success Response

**Code** : `201 CREATED`

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

**Code** : `400 BAD REQUEST`

**Content example**

```json
{
    "errors": [
        {
            "code": "CONFIG_KEY_NOT_DEFINED",
            "attribute": "key",
            "message": "The key is required"
        }
    ]
}
```

Please refer [here](/docs/common/errors.md) for the full explanation of errors