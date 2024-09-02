<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Fundamentals</title>
</head>

<body>
    <h1><?= $heading ?></h1>

    <ul>
        <?php foreach ($planets as $planet) : ?>
            <li>
                <h3><?= $planet['name']; ?></h3>
                <p>Distance from the sun: <?= $planet['distanceFromTheSun'] ?> AU</p>
                <img src="<?= $planet['image']; ?>" alt="<?php $planet['name'] ?>" />
            </li>
        <?php endforeach ?>
    </ul>
</body>

</html>