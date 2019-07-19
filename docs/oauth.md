# OAuth

USAF.Cloud provides an OAuth2 API, which can be used for traditional API access,
or for Single Sign On (SSO).

## Authentication

-   Pass the users OAuth token via a header

```php
'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer ' . $token
]
```

## Endpoints

-   User endpoint
-   Email endpoint

### User Endpoint

```http
https://usaf.cloud/api/user
```

#### Response

```php
[
  "data" => [
    "id" => "uuid_id"
    "name" => [
      "first_name" => "John"
      "last_name" => "Doe"
      "middle_name" => "Henry"
      "nickname" => "JDoe"
      "full_name" => "John Doe"
    ]
    "email" => "john.doe@us.af.mil"
    "email_verified" => true
    "avatar" => null
  ]
]
```

### Email Endpoint

```http
https://usaf.cloud/api/email
```
