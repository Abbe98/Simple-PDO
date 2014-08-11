#Simple PDO
Secure and simple!

##Installation 
Include `pdo.php` or install the [composer package](https://packagist.org/packages/abbe98/simple-pdo).

In `pdo.php` enter your database connection/user details:
`private $host = '';`
`private $user = '';`
`private $pass = '';`
`private $dbname = '';`

##Usage
Create new SimplePDO instance or use the existing one:

`$database = SimplePDO::getInstance();`

Query database and return a single row:

    function get_user_from_id($userid) {
        $database = SimplePDO::getInstance();
        $database->query("SELECT `name` FROM `users` WHERE `id` = :userid");
        $database->bind(':userid', $userid);
        return $database->single();
    }
    
Query database and return multiply rows:

    function get_all_users() {
        $database = SimplePDO::getInstance();
        $database->query("SELECT * FROM `users`");
        return $database->resultset();
    }
    
Insert new row in database:

    function new_user($name, $email) {
        $database = SimplePDO::getInstance();
        $database->query("INSERT INTO `users` (name, email) VALUES (:name, :email)");
        $database->bind(':name', $name);
        $database->bind(':name', $email);
        $database->execute();
    }
    
Update existing row:

    function update_user_name($new_name, $id) {
        $database = SimplePDO::getInstance();
        $database->query("UPDATE `users` SET `name` = :name WHERE `id` = :id");
        $database->bind(':name', $new_name);
        $database->bind(':id', $id);
        $database->execute();
    }

**Licensed under MIT**