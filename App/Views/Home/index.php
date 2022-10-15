<?php include 'App/Views/Templates/header.php' ?>

<!-- Main -->
<main>

	<!-- First block -->
	<div class="px-4 pt-5 my-5 text-center border-bottom">

		<h1 class="display-4 font-weight-normal">This is a Web application</h1>
		<div class="col-lg-6 mx-auto">
			<p class="lead mb-4">
				that allows you to operate with conferences. You can create, delete and edit conferences.
				Also, you can see all conferences and specific ones in details.
			</p>
		</div>

		<div class="overflow-hidden" style="max-height: 40vh;">
			<div class="container px-5">
				<img src="../../../public/images/ide_screenshot.png" class="img-fluid rounded  mb-4" loading="lazy">
			</div>
		</div>

	</div>
	<!-- First block -->

	<!-- Second block -->
	<div class="container col-xxl-8 px-4 py-5">

		<div class="row flex-lg-row-reverse align-items-center g-5 py-5">

			<div class="col-10 col-sm-8 col-lg-6">
				<img src="../../../public/images/git_screenshot.png" class="d-block mx-lg-auto img-fluid rounded"
				     alt="IDE screenshot" loading="lazy">
			</div>

			<div class="col-lg-6">
				<h1 class="display-4 font-weight-normal mb-3">Check out</h1>
				<h4 class="font-weight-light mb-4">
					the source code for this and many other projects on my
					GitHub repository.
				</h4>
				<a class="btn btn-dark btn-lg px-4 gap-3 mb-5" target="_blank" href="https://github.com/WinterSakuraa">
					GitHub
				</a>
			</div>

		</div>

	</div>
	<!-- Second block -->

</main>
<!-- Main -->

<?php include 'App/Views/Templates/footer.php' ?>
