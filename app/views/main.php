<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
 <!-- Change this to check DB instead -->
    <?php if (isset($_POST['visitor-name'])) : ?>
    <h1>Välkommen <?php echo($_POST['visitor-name']) ?>!</h1>
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