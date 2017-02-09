# Simple PDO
Secure and simple library for PHP's PDO class.

## Installation 
Install the [composer package](https://packagist.org/packages/abbe98/simple-pdo).

```
composer require abbe98/simple-pdo
```

In define your database connection/user details using constants:

```php
const HOST = '' // the IP of the database
const DBNAME = '' // the database name to be used
const USERNAME = '' // the username to be used with the database
const PASSWORD = '' // the password to be used with the username
```

## Usage Examples

**Create new SimplePDO instance and open a connection:**

```php
$database = SimplePDO::getInstance();`
```

If there is already a open connection that one will be used automatically.

**Query database and return a single row:**

```php
$database = SimplePDO::getInstance();
$database->query("SELECT `column` FROM `table` WHERE `columnValue` = :id");
$database->bind(':id', 123);
$result = $database->single();
```

**Query database and return multiply rows:**

```php
$database = SimplePDO::getInstance();
$database->query("SELECT * FROM `table`");
$result = $database->resultSet();
```

**Insert new row in database:**

```php
$database = SimplePDO::getInstance();
$database->query("INSERT INTO `users` (name, email) VALUES (:name, :email)");
$database->bind(':name', $name);
$database->bind(':name', $email);
$database->execute();
```

**Update existing row:**

```php
$database = SimplePDO::getInstance();
$database->query("UPDATE `users` SET `name` = :name WHERE `id` = :id");
$database->bind(':name', $newName);
$database->bind(':id', $id);
$database->execute();
```
