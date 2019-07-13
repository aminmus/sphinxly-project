<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php if (isset($data['visitor'])) :?>
        <?php include('greeting.php'); ?>
    <?php else : ?>
        <h1>Hej!</h1>
        <?php include('form.php'); ?>
    <?php endif ?>
    <?php if (isset($data['message'])) : ?>
        <p><?php echo $data['message'] ?>
        </p>
    <?php endif ?>
    <form action="<?php echo URLROOT; ?>/visitors/file"
        method="post">
        <button type="submit">Skapa fil med namn</button>
    </form>
</body>

</html>
