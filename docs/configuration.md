# Configuration Options

## Open User Registration

-   Config File: `settings.php`
-   Desc: A boolean flag that determines whether user registrations are open.
-   Env: OPEN_REGISTRATION
-   Default: false
-   Middleware: `open-registration`

## Allow Password Resets

-   Config File: `settings.php`
-   Desc: A boolean flag that determines whether users can reset thier own
    password.
-   Env: ALLOW_PASSWORD_RESETS
-   Default: true
-   Middleware: `allow-password-resets`
