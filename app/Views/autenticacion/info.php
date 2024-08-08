<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
<?php if (session()->get('exito')) : ?>
                    <div class="alert alert-exito">
                        <?= session()->get('exito'); ?>
                    </div>
                <?php endif ?>
</main>
</body>
</html>