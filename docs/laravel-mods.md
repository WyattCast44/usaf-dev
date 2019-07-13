# Laravel Overides

-   Moved `App\User` to `App\Models\Users\User`
-   Changed the base user migration significantly

## Passport Overrides

-   Customized migrations
    -   User_ids changed to UUIDs
    -   Added info to client table
-   Extended
    -   Token
    -   Client
    -   Personal Access Client
    -   AuthCode
