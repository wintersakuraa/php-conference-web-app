<?php /** @var $data array */ ?>

<?php require_once 'App/Views/Templates/header.php'; ?>
<?php require_once 'App/Views/Auxiliary/countrySelection.php'; ?>

<?php
$isEdit = isset($_POST['edit']);
$conference = array_key_exists('conference', $data) ? $data['conference'] : [];
$errors = array_key_exists('errors', $data) ? $data['errors'] : [];
?>

<!-- Main -->
<main class="container my-5 w-75 v-100 text-left">

	<form action="?controller=conference&action=edit&id=<?= $_GET['id']; ?>"
	      method="post"
	      autocomplete="off"
	      id="updateForm">

		<!-- Title -->
		<div class="form-group">
			<label for="title">Title:</label>
			<input
					id="title"
					type="text"
					class="form-control
					<?php if ($isEdit) {
						echo array_key_exists('title', $errors) ? 'is-invalid' : null;
					} ?>"
					name="title"
					value="<?= $conference->title; ?>"
			/>

			<!-- Validation error -->
			<div class="invalid-feedback">
				<?php echo $errors['title']; ?>
			</div>
			<!-- Validation error -->
		</div>
		<!-- Title -->

		<!-- Date -->
		<div class="form-group">
			<label for="date">Date:</label>
			<input
					id="date"
					type="datetime-local"
					class="form-control
					<?php if ($isEdit) {
						echo array_key_exists('date', $errors) ? 'is-invalid' : null;
					} ?>"
					name="date"
					value="<?= $conference->date; ?>"
			/>

			<!-- Validation error -->
			<div class="invalid-feedback">
				<?php echo $errors['date']; ?>
			</div>
			<!-- Validation error -->
		</div>
		<!-- Date -->

		<!-- Country-->
		<div class="form-group">
			<label for="country">Country:</label>

			<select
					id="inputCountry"
					name='country'
					class="form-control
					<?php if ($isEdit) {
						echo array_key_exists('country', $errors) ? 'is-invalid' : null;
					} ?>"
			>
				<optgroup label="Countries">
					<option value="">Choose...</option>
					<?php foreach ($countries as $country) {
						if ($country == $conference->country) {
							echo '<option selected="selected" value="' . $country . '">' . $country . '</option>';
						} else {
							echo '<option value="' . $country . '">' . $country . '</option>';
						}
					} ?>
				</optgroup>
			</select>

			<!-- Validation error -->
			<div class="invalid-feedback">
				<?php echo $errors['country']; ?>
			</div>
			<!-- Validation error -->
		</div>
		<!-- Country-->

		<!-- Address-->
		<div class="form-group">

			<table class="table table-borderless">

				<thead>
				<tr>
					<td>Enter Latitude:</td>
					<td>Enter Longitude:</td>
				</tr>
				</thead>

				<tbody>
				<tr>
					<td>
						<input
								class="form-control
								<?php if ($isEdit) {
									echo array_key_exists('lat', $errors) ? 'is-invalid' : null;
								} ?>"
								type="text"
								name="lat"
								id="latitude"
								value="<?= $conference->lat ?? ""; ?>"
						/>

						<!-- Validation error -->
						<div class="invalid-feedback">
							<?php echo $errors['lat']; ?>
						</div>
						<!-- Validation error -->
					</td>
					<td>
						<input
								class="form-control
								<?php if ($isEdit) {
									echo array_key_exists('lon', $errors) ? 'is-invalid' : null;
								} ?>"
								type="text"
								name="lon"
								id="longitude"
								value="<?= $conference->lon ?? ""; ?>"
						/>

						<!-- Validation error -->
						<div class="invalid-feedback">
							<?php echo $errors['lon']; ?>
						</div>
						<!-- Validation error -->
					</td>
					<td>
						<a class="btn btn-primary" onclick="updatePosition()">Set Location</a>
					</td>
				</tr>
				</tbody>

			</table>

			<!-- Map -->
			<div id="map"></div>

			<script type="text/javascript" async defer>
				$(document).ready(() => {
					initMap();
				});
			</script>
			<!-- Map -->

		</div>
		<!-- Address-->

		<!-- Buttons -->
		<input type="submit" value="Edit" name="edit" class="btn btn-warning btn-lg"/>
		<a href="<?= '?controller=conference&action=getById&id=' . $conference->id; ?>"
		   class="btn btn-secondary btn-lg">Back</a>
		<!-- Buttons -->

	</form>

</main>
<!-- Main -->

<!-- Google maps API -->
<script async defer
        src=
        "https://maps.googleapis.com/maps/api/js?key=AIzaSyDKchS_x-omrKl-cbDsEUy2BAgCz5_4hfE&callback=initMap">
</script>

<?php include 'App/Views/Templates/footer.php' ?>
