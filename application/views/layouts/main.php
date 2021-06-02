<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $title ?></title>
        <link href="<?= base_url('dist/app.css') ?>" rel="stylesheet">
        <script>
            var base_url = '<?= base_url() ?>';
        </script>

    </head>
    <body class="antialiased font-sans text-gray-800 md:bg-gray-200">
        <div id="app">
            <?php $this->load->view('includes/navbar', TRUE) ?>
            <?php $this->load->view($content, TRUE) ?>
        </div>
    </body>
    <script type="text/javascript" src="<?= base_url('dist/app.js') ?>"></script>
</html>
