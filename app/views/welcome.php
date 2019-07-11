<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php if (isset($data['visitor-name'])) : ?>
    <!-- TODO: Add 'Welcome Back' greeting if user already exists -->
    <h1>Välkommen <?php echo($data['visitor-name']) ?>!</h1>
    <?php else : ?>
    <h1>Hej!</h1>
    <form action="<?php echo URLROOT; ?>/visitors/show"
        method="POST">
        <label>Vänligen skriv in ditt namn
            <input type="text" name="visitor-name">
        </label>
    </form>
    <?php endif ?>
    <?php if (isset($data['validation-error'])) : ?>
    <p><?php echo $data['validation-error'] ?>
    </p>
    <?php endif ?>
</body>

</html>
