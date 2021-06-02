<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/app.css'); ?>" />
</head>
<body class="antialiased font-sans text-gray-800 md:bg-gray-200">

	<div id="app">
		<?php $this->load->view($content); ?>
	</div>	

	<script type="text/javascript" src="<?php echo base_url('dist/app.js') ?>"></script>
</body>
</html>
