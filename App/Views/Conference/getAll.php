<?php /** @var $data array */ ?>

<?php require_once 'App/Views/Templates/header.php'; ?>

<!-- Main -->
<main class="container my-5 mx-auto v-100">

	<?php if (empty($data)) : ?>
		<h1>Currently</h1>
		<h3>there are no planned conferences. You can schedule a conference <a
					href="<?= '?controller=conference&action=create' ?>">here</a>.</h3>

	<?php else: ?>
	<table class="table table-bordered table-hover table-sm shadow p-3 mb-5 bg-white rounded">

		<thead class="thead-light">
		<tr>
			<th scope="col">Title</th>
			<th scope="col">Date</th>
			<th scope="col">Action</th>
		</tr>
		</thead>

		<tbody>
		<?php foreach ($data as $conference): ?>
			<tr>
				<td><?= $conference->title; ?></td>
				<td><?= date('d.m.Y / H:i', strtotime($conference->date)) ?></td>
				<td>
					<a class="btn btn-info btn-sm" type="button"
					   href="<?= '?controller=conference&action=getById&id=' . $conference->id ?>">View</a>
					<a class="btn btn-danger btn-sm" type="button"
					   href="<?= '?controller=conference&action=delete&id=' . $conference->id ?>">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>

	</table>
	<?php endif; ?>

</main>
<!-- Main -->

<?php include 'App/Views/Templates/footer.php' ?>
