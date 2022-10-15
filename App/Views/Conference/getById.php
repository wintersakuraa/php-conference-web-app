<?php /** @var $data array */ ?>

<?php require_once 'App/Views/Templates/header.php'; ?>

<!-- Main -->
<main class="container my-5 v-100">

	<!-- Card -->
	<div class="card shadow bg-white rounded">

		<!-- Card Title -->
		<div class="card-header bg-warning">
			<h2 class="card-title text-dark"><?= $data[0]->title ?></h2>
		</div>
		<!-- Card Title -->

		<!-- Card Body -->
		<div class="card-body">

			<!-- Content -->
			<div class="container text-left">
				<p class="card-text lead">
					<span class="font-weight-bold">Date:</span>&emsp;<?= date('d.m.Y / H:i', strtotime($data[0]->date)); ?>
				</p>

				<!-- If address is det -->
				<?php if ($data[0]->lat != null && $data[0]->lon != null): ?>
					<span class="font-weight-bold lead">Address:</span>

					<div id="viewMap" class="mb-3"></div>

					<script type="text/javascript" async defer>
						let confLat = <?= $data[0]->lat ?>;
						let confLng = <?= $data[0]->lon ?>;
					</script>
				<?php endif; ?>
				<!-- If address is det -->

				<p class="card-text lead">
					<span class="font-weight-bold">Country:</span>&emsp;<?= $data[0]->country ?>
				</p>
			</div>
			<!-- Content -->

			<!-- Buttons -->
			<div class="container mt-5">
				<a class="btn btn-warning"
				   href="<?= '?controller=conference&action=edit&id=' . $data[0]->id; ?>">Edit</a>
				<a class="btn btn-danger"
				   href="<?= '?controller=conference&action=delete&id=' . $data[0]->id; ?>">Delete</a>
				<a class="btn btn-secondary"
				   href="<?= '?controller=conference&action=getAll'; ?>">Back to the list</a>
			</div>
			<!-- Buttons -->

		</div>
		<!-- Card Body -->

	</div>
	<!-- Card -->

</main>
<!-- Main -->

<!-- Google maps API -->
<script async defer
        src=
        "https://maps.googleapis.com/maps/api/js?key=AIzaSyDKchS_x-omrKl-cbDsEUy2BAgCz5_4hfE&callback=viewMap">
</script>

<?php include 'App/Views/Templates/footer.php' ?>

