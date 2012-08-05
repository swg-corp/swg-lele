<!doctype html>
<html>
<head>
	<title><?php echo $this->bootstrap->title->default("Default title"); ?></title>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $this->bootstrap->description; ?>">
	<meta name="author" content="">
	<?php echo $this->bootstrap->meta; ?>
	<?php echo $this->bootstrap->stylesheet; ?>
        <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="container">

  <?php echo $this->bootstrap->widget("hero_widget", array("title"=>"Hello, world!")); ?>

  <?php echo $this->bootstrap->content; ?>

  <footer>
	<p><?php echo $this->bootstrap->copyright->default("There is no copyright"); ?></p>
  </footer>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<?php echo $this->bootstrap->javascript; ?>

</body>
</html>