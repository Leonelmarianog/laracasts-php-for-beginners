# My First PHP tag

```php
<!-- index.php --->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Playground</title>
</head>

<body>
    <h1>
        <?php
        echo "Hello World!";
        ?>
    </h1>
</body>

</html>
```

1. To write PHP code, we need a `.php` file, like `index.php`.
2. When working with `.php` files, we can mix HTML and PHP code.
3. Anything we write between the opening (`<?php`) and closing (`?>`) PHP tags is interpreted as PHP code, not HTML.
4. When writing PHP code we end a command with a semicolon.

# Print a string in PHP

```php
echo "Hello World!";
```

# String Concatenation

```php
echo "Hello" . "World!"; // "Hello World!"
```

# Variables

```php
$greeting = "Hello";
echo $greeting . " " . "World!"; // "Hello World!" 
```

# Evaluate a variable within a string

```php
$greeting = "Hello";

// Double Quotes allow us to evaluate the variable before printing
echo "$greeting Everybody!"; // "Hello Everybody!" 

// Single Quotes print do not evaluate the variable
echo '$greeting Everybody!'; // "$greeting Everybody!"
```

# Echo short-hand

```php
<body>
    <h1><?= "Hello World!"; ?></h1>
    <h2><?= "I'm printing text!" ?></h2> // Semicolon can be omitted
</body>
```

# Conditionals and Booleans

Think of conditionals as a way to ask a question.

> "Have you read Dark Matter?"

```php
$book = "Dark Matter";
$read = true;

if ($read) {
    $message = "You have read $book";
} else {
    $message = "You have NOT read $book";
}

echo $message; // "You have read Dark Matter"
```

Example 1: Rendering whether you have read a book or not.

```php

<body>
    <?php 
        $book = "Dark Matter";
        $read = true;

        if ($read) {
            $message = "You have read $book";
        } else {
            $message = "You have NOT read $book";
        }
    ?>

    <h1><?= $message ?></h1>
</body>
```

# Arrays

An Array is the programming equivalent of a folder. It's a way to take a group of things and put them in a "folder".

```php
    $books = [
        "Do Androids Dream of Electric Sheep",
        "The Langoliers",
        "Hail Mary"
    ];
```

Example 1: Rendering a list of books in HTML with `foreach` (Method 1).

```php
<body>
    <h1>Recommended Books</h1>

    <?php
        $books = [
            "Do Androids Dream of Electric Sheep",
            "The Langoliers",
            "Hail Mary"
        ];
    ?>

    <ul>
        <?php foreach ($books as $book) {
            // We can use curly braces to scope the variable inside of it
            // In this example it allows us to add the "™" text next to it.
            echo "<li>{$book}™</li>"; 
        }
        ?>
    </ul>
</body>
```

Example 2: Rendering a list of books in HTML with `foreach - endforeach` (Method 2 - Useful when rendering views).

```php
<body>
    <h1>Recommended Books</h1>

    <?php
        $books = [
            "Do Androids Dream of Electric Sheep",
            "The Langoliers",
            "Hail Mary"
        ];
    ?>

    <ul>
        <?php foreach ($books as $book) : ?>
            <li><?= $book ?>™</li>
        <?php endforeach; ?>
    </ul>
</body>
```

# Associative Arrays

Associative Arrays allow us to associate a key with a value when working with arrays.

```php
$books = [
    [
        "name" => "Do Androids Dream of Electric Sheep",
        "author" => "Philip K. Dick",
        "purchaseUrl" => "http://example.com",
    ],
    [
        "name" => "Project Hail Mary",
        "author" => "Andy Weir",
        "purchaseUrl" => "http://example.com",
    ]
];


echo $books[0]["name"]; // "Do Androids Dream of Electric Sheep"
echo $books[1]["name"]; // "Project Hail Mary"
```

Example 1: Rendering a list of books.

```php
<body>
    <h1>Recommended Books</h1>

    <?php
    $books = [
        [
            "name" => "Do Androids Dream of Electric Sheep",
            "author" => "Philip K. Dick",
            "purchaseUrl" => "http://example.com",
        ],
        [
            "name" => "Project Hail Mary",
            "author" => "Andy Weir",
            "purchaseUrl" => "http://example.com",
        ]
    ];
    ?>

    <ul>
        <?php foreach ($books as $book) : ?>
            <li>
                <a href="<?= $book["purchaseUrl"]; ?>" alt="<?= $book["name"]; ?>">
                    <?= $book["name"]; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>
```

# Functions and Filters

Functions are the verbs of the programming world, their job is to get called and do something and sometimes return a result.

```php
function filterByAuthor($books, $author)
{
    $filteredBooks = [];

    foreach ($books as $book) {
        if ($book['author'] === $author) {
            $filteredBooks[] = $book; // append element to array
        }
    }

    return $filteredBooks;
}
```

Example 1: Rendering a filtered list of books

```php
<body>
    <h1>Recommended Books</h1>

    <?php
    $books = [
        [
            "name" => "Do Androids Dream of Electric Sheep",
            "author" => "Philip K. Dick",
            "releaseYear" => 1968,
            "purchaseUrl" => "http://example1.com",
        ],
        [
            "name" => "Project Hail Mary",
            "author" => "Andy Weir",
            "releaseYear" => 2021,
            "purchaseUrl" => "http://example2.com",
        ],
        [
            "name" => "The Martian",
            "author" => "Andy Weir",
            "releaseYear" => 2011,
            "purchaseUrl" => "http://example3.com",
        ]
    ];

    function filterByAuthor($books, $author)
    {
        $filteredBooks = [];

        foreach ($books as $book) {
            if ($book['author'] === $author) {
                $filteredBooks[] = $book;
            }
        }

        return $filteredBooks;
    }
    ?>

    <ul>
        <?php foreach (filterByAuthor($books, "Andy Weir") as $book) : ?>
            <li>
                <a href="<?= $book["purchaseUrl"]; ?>" alt="<?= $book["name"]; ?>">
                    <?= $book["name"] ?> (<?= $book["releaseYear"] ?>) - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
```

# Lambda Functions

What if I want to filter books by other attributes beside "author"?

Maybe creating more functions?

```php
function filterByName($books, $name)
{
    $filteredBooks = [];

    foreach ($books as $book) {
        if ($book['name'] === $name) {
            $filteredBooks[] = $book;
        }
    }

    return $filteredBooks;
}

function filterByYear($books, $year)
{
    $filteredBooks = [];

    foreach ($books as $book) {
        if ($book['year'] === $year) {
            $filteredBooks[] = $book;
        }
    }

    return $filteredBooks;
}
```

What if I want to avoid duplication?

Let's do this in steps:

1. Notice we are looping through books, which is the result of calling `filterByAuthor`, let's extract it to a variable.

```php
<body>
    <h1>Recommended Books</h1>

    <?php
    $books = [
        [
            "name" => "Do Androids Dream of Electric Sheep",
            "author" => "Philip K. Dick",
            "releaseYear" => 1968,
            "purchaseUrl" => "http://example1.com",
        ],
        [
            "name" => "Project Hail Mary",
            "author" => "Andy Weir",
            "releaseYear" => 2021,
            "purchaseUrl" => "http://example2.com",
        ],
        [
            "name" => "The Martian",
            "author" => "Andy Weir",
            "releaseYear" => 2011,
            "purchaseUrl" => "http://example3.com",
        ]
    ];

    function filterByAuthor($books, $author)
    {
        $filteredBooks = [];

        foreach ($books as $book) {
            if ($book['author'] === $author) {
                $filteredBooks[] = $book;
            }
        }

        return $filteredBooks;
    }

    $filteredBooks = filterByAuthor($books, "Andy Weir");
    ?>

    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
            <li>
                <a href="<?= $book["purchaseUrl"]; ?>" alt="<?= $book["name"]; ?>">
                    <?= $book["name"] ?> (<?= $book["releaseYear"] ?>) - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
```

2. In PHP we can create named functions, like `filterByAuthor`, or **Anonymous Functions**, which are functions with no name.

```php
<body>
    <h1>Recommended Books</h1>

    <?php
    $books = [
        [
            "name" => "Do Androids Dream of Electric Sheep",
            "author" => "Philip K. Dick",
            "releaseYear" => 1968,
            "purchaseUrl" => "http://example1.com",
        ],
        [
            "name" => "Project Hail Mary",
            "author" => "Andy Weir",
            "releaseYear" => 2021,
            "purchaseUrl" => "http://example2.com",
        ],
        [
            "name" => "The Martian",
            "author" => "Andy Weir",
            "releaseYear" => 2011,
            "purchaseUrl" => "http://example3.com",
        ]
    ];

    // We need to assign anonymous functions to a variable to be able to call them.
    $filterByAuthor = function ($books, $author)
    {
        $filteredBooks = [];

        foreach ($books as $book) {
            if ($book['author'] === $author) {
                $filteredBooks[] = $book;
            }
        }

        return $filteredBooks;
    };

    $filteredBooks = $filterByAuthor($books, "Andy Weir"); // Need to reference the function like a variable.
    ?>

    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
            <li>
                <a href="<?= $book["purchaseUrl"]; ?>" alt="<?= $book["name"]; ?>">
                    <?= $book["name"] ?> (<?= $book["releaseYear"] ?>) - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
```

3. Now with this knowledge let's refactor the filter function to be more generic.

```php
<body>
    <h1>Recommended Books</h1>

    <?php
    $books = [
        [
            "name" => "Do Androids Dream of Electric Sheep",
            "author" => "Philip K. Dick",
            "releaseYear" => 1968,
            "purchaseUrl" => "http://example1.com",
        ],
        [
            "name" => "Project Hail Mary",
            "author" => "Andy Weir",
            "releaseYear" => 2021,
            "purchaseUrl" => "http://example2.com",
        ],
        [
            "name" => "The Martian",
            "author" => "Andy Weir",
            "releaseYear" => 2011,
            "purchaseUrl" => "http://example3.com",
        ]
    ];

    function filter($items, $key, $value)
    {
        $filteredItems = [];

        foreach ($items as $item) {
            if ($item[$key] === $value) {
                $filteredItems[] = $item;
            }
        }

        return $filteredItems;
    };

    $filteredBooks = filter($books, "author", "Andy Weir");
    ?>

    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
            <li>
                <a href="<?= $book["purchaseUrl"]; ?>" alt="<?= $book["name"]; ?>">
                    <?= $book["name"] ?> (<?= $book["releaseYear"] ?>) - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
```

4. What if we wanted books which "releaseYear" is after the year 2000? We can improve our filter function further.

```php
<body>
    <h1>Recommended Books</h1>

    <?php
    $books = [
        [
            "name" => "Do Androids Dream of Electric Sheep",
            "author" => "Philip K. Dick",
            "releaseYear" => 1968,
            "purchaseUrl" => "http://example1.com",
        ],
        [
            "name" => "Project Hail Mary",
            "author" => "Andy Weir",
            "releaseYear" => 2021,
            "purchaseUrl" => "http://example2.com",
        ],
        [
            "name" => "The Martian",
            "author" => "Andy Weir",
            "releaseYear" => 2011,
            "purchaseUrl" => "http://example3.com",
        ]
    ];

    function filter($items, $fn)
    {
        $filteredItems = [];

        foreach ($items as $item) {
            if ($fn($item)) {
                $filteredItems[] = $item;
            }
        }

        return $filteredItems;
    };

    // Now we are in charge of the comparison that is made.
    $filteredBooks = filter($books, function ($book) {
        return $book['releaseYear'] > 2000;
    });
    ?>

    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
            <li>
                <a href="<?= $book["purchaseUrl"]; ?>" alt="<?= $book["name"]; ?>">
                    <?= $book["name"] ?> (<?= $book["releaseYear"] ?>) - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
```

PHP provides built-in functions to work with arrays.

```php
<body>
    <h1>Recommended Books</h1>

    <?php
    $books = [
        [
            "name" => "Do Androids Dream of Electric Sheep",
            "author" => "Philip K. Dick",
            "releaseYear" => 1968,
            "purchaseUrl" => "http://example1.com",
        ],
        [
            "name" => "Project Hail Mary",
            "author" => "Andy Weir",
            "releaseYear" => 2021,
            "purchaseUrl" => "http://example2.com",
        ],
        [
            "name" => "The Martian",
            "author" => "Andy Weir",
            "releaseYear" => 2011,
            "purchaseUrl" => "http://example3.com",
        ]
    ];

    $filteredBooks = array_filter($books, function ($book) {
        return $book['releaseYear'] > 2000;
    });
    ?>

    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
            <li>
                <a href="<?= $book["purchaseUrl"]; ?>" alt="<?= $book["name"]; ?>">
                    <?= $book["name"] ?> (<?= $book["releaseYear"] ?>) - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
```

# Separating Logic from the template

`index.php`

```php
// If the file contains ONLY PHP code, then we don't need to close the PHP tag.
<?php

$books = [
    [
        "name" => "Do Androids Dream of Electric Sheep",
        "author" => "Philip K. Dick",
        "releaseYear" => 1968,
        "purchaseUrl" => "http://example1.com",
    ],
    [
        "name" => "Project Hail Mary",
        "author" => "Andy Weir",
        "releaseYear" => 2021,
        "purchaseUrl" => "http://example2.com",
    ],
    [
        "name" => "The Martian",
        "author" => "Andy Weir",
        "releaseYear" => 2011,
        "purchaseUrl" => "http://example3.com",
    ]
];

$filteredBooks = array_filter($books, function ($book) {
    return $book['releaseYear'] > 2000;
});

require "index.view.php"; // Loads the HTML, which can reference all the variables we create in this file
```
  
`index.view.php`

```php
// index.view.php

// Views should be "dumb", meaning they shouldn't contain complex logic (like accessing a database or external service).
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP Playground</title>
</head>

<body>
    <h1>Recommended Books</h1>

    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
            <li>
                <a href="<?= $book["purchaseUrl"]; ?>" alt="<?= $book["name"]; ?>">
                    <?= $book["name"] ?> (<?= $book["releaseYear"] ?>) - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
```