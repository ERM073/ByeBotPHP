# ByeBotPHP
PHP Script to Block Unwanted Access by Bots

#### 1. Download ByeBotPHP files
#### 2. Upload security.php and validate.php to the directory with the php files you want to use
#### 3. Put the following code at the top of the php file (index.php, contact.php, etc.) where you want to use ByeBotPHP.

```php
<?php
session_start();
include 'scurity.php';
if (!isset($_SESSION['validated']) || $_SESSION['validated'] !== true) {
    exit();
}
?>
```
#### 4. Access the page to check. We recommend replacing the language with that of your country.

# Demo Page
https://safe.idmx.eu.org/secure-php/index.php
