<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
	      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<!-- Custom CSS -->
	<link href="../../../public/css/style.css" rel="stylesheet">

	<title>Conference Web</title>
</head>

<body class="text-center" style="min-width: 500px;">

<!-- Header -->
<header class="w-100">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08"
		        aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">

			<ul class="navbar-nav mt-2">
				<li class="nav-item">
					<h5 class="text-light nav-link">Conference Web</h5>
				</li>

				<li class="nav-item <?php if ($_SERVER['QUERY_STRING'] == 'controller=home&action=index') echo 'active' ?>">
					<a class="nav-link" href="<?= '?controller=home&action=index' ?>">Home</a>
				</li>

				<li class="nav-item <?php if ($_SERVER['QUERY_STRING'] == 'controller=conference&action=getAll') echo 'active' ?>">
					<a class="nav-link" href="<?= '?controller=conference&action=getAll' ?>">See
						All</a>
				</li>

				<li class="nav-item <?php if ($_SERVER['QUERY_STRING'] == 'controller=conference&action=create') echo 'active' ?>">
					<a class="nav-link" href="<?= '?controller=conference&action=create' ?>">Create</a>
				</li>
			</ul>
		</div>

	</nav>

</header>
<!-- Header -->
