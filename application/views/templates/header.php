<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
	<head>
		<meta charset="utf-8">
		<title>Exchange rates</title>
		<link rel="stylesheet" type="text/css" href="<?php echo prep_url(base_url()); ?>assets/libs/bootstrap/css/bootstrap.min.css">
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo prep_url(base_url()); ?>assets/css/main.css">
	</head>
	<body class="d-flex flex-column h-100">
		<header>
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
				<a class="navbar-brand" href="#">Exchange rates</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item <?php if ($controller::page_current('')) echo 'active'; ?>">
							<a class="nav-link" href="<?php echo prep_url(site_url()); ?>">Home</a>
						</li>
						<li class="nav-item <?php if ($controller::page_current('exchange-history')) echo 'active'; ?>">
							<a class="nav-link" href="<?php echo prep_url(site_url()); ?>/exchange-history">Exchange history</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>