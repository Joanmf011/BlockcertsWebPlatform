<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Blockcerts UPF | Login
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css(['bootstrap.min.css', 'themify-icons.css', 'template/layout.css', 'template/login.css']) ?>
        <?= $this->Html->script(['jquery-3.3.1.min.js', 'bootstrap.min.js']) ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

    </head>
    <body>
        <main>
            <?= $this->fetch('content') ?>
        </main>
    </body>
</html>