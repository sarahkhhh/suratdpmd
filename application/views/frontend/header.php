<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title><?= $title ?></title>
	<link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/favicon.ico" />
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="<?= base_url() ?>assets/css/test.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/jquery-ui-1.12.1/jquery-ui.css">

</head>

<body id="page-top">
	<!-- Navigation-->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="./"><img src="<?= base_url() ?>assets/img/logodpmd.png" alt="logo" width="100" height="40px" /></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars ml-1"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav text-uppercase ml-auto">
					<?php if ($this->session->userdata('is_login') == true) : ?>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('suratonline') ?>">Pengajuan Surat</a></li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('tracking') ?>">Tracking Surat</a></li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('profile') ?>">Profil</a></li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('logout') ?>">Log out</a></li>
					<?php endif ?>

					<?php if ($this->session->userdata('is_login') == false || $this->session->userdata('is_login') == null) : ?>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Login</a></li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>