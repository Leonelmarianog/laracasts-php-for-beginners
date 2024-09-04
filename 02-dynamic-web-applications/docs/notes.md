# Controller

Responsible for accepting incoming requests and providing a response. In this case, the requests are getting a page.

# Superglobals

Variables accessible from any script.

```php
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";
die(); // Special function to end execution here
```

# Ternary Operator

```php
echo $_SERVER["REQUEST_URI"] === "/" ? "bg-gray-900 text-white" : "text-gray-300";
```

# Classes

We can think of a class like a blueprint for anything.

```php
// blueprint for Person
class Person {
    public $name;
    public $age;

    // Called when creating a new person
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this ->age = $age;
    }

    public function breathe() 
    {
        echo $this->name . ' is breathing!';
    }
}

// implementation/instance
$person = new Person();
$person->name = 'John Doe';
$person->age = 25;
$person->breathe(); // "John Doe is breathing!"
```

# PDO (PHP Data Objects)

A PDO is just an interface to access a database. 

```php
// DSN: Data Source Name, a connection string that declares the connection to a database.
$dns = "mysql:host=database;port=3306;dbname=development;user=root;password=123456;charset=utf8mb4";

$pdo = new PDO($dsn);

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC); // returns records as an associative array

// PDO::FETCH_ASSOC -> The double colon is named "Scope Resolution Operator" and gives access to a "static" or "constant" declared on the class.
```