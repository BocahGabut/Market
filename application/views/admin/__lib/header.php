<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta content="Potenz Global Solutions" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="mobile-web-app-capable" content="yes">
	<!-- app favicon -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/template/') ?>img/favicon.ico">
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<!-- plugin stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/template/') ?>css/vendors.css" />
	<!-- app style -->
	<link href="<?php echo base_url('assets/template/') ?>css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/template/') ?>css/custom.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.tiny.cloud/1/3c9u2a5btj33eisnohk2ody6zfniaz88zih7gd8jkechddka/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<?php
$this->load->view('admin/__lib/navbar__top');
$this->load->view('admin/__lib/navbar__left');
?>
