<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php echo($data['tablename'])?>
    <?php if (isset($data['visitor'])) : ?>
    <h1>Välkommen <?php echo($data['visitor']) ?>!</h1>
    <?php else : ?>
    <h1>Hej!</h1>
    <form action="index.php" method="POST">
        <label>Vänligen skriv in ditt namn
            <input type="text" name="visitor-name">
        </label>
    </form>
    <?php endif ?>
</body>

</html>
