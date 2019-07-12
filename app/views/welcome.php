<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php if (isset($data['visitor'])) : ?>
    <h1><?php echo($data['greeting']) ?>
    </h1>
    <form action="<?php echo URLROOT; ?>/visitors/delete/<?php echo($data['visitor']->id) ?>" method="post">
        <button type="submit">Glöm bort mig</button>
    </form>
    <?php else : ?>
    <h1>Hej!</h1>
    <form action="<?php echo URLROOT; ?>/visitors/show"
        method="POST">
        <label>Vänligen skriv in ditt namn
            <input type="text" name="visitor-name">
        </label>
    </form>
    <?php endif ?>
    <?php if (isset($data['message'])) : ?>
    <p><?php echo $data['message'] ?>
    </p>
    <?php endif ?>
</body>

</html>
