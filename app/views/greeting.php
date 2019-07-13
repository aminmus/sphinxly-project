<h1><?php echo($data['greeting']) ?></h1>
<form
    action="<?php echo URLROOT; ?>/visitors/delete/<?php echo($data['visitor']->id) ?>"
    method="post">
    <button type="submit">Glöm bort mig</button>
</form>
