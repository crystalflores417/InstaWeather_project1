<?php include 'views/partials/header.php'; ?>

<!-- HEADER -->

<main class="container py-5 mt-5">
  <h1 class="display-3 text-center mt-5">
		InstaWeather
		
	</h1>
	
<!-- FORM -->
	<form action="forecast.php" method="post">
  <div class="form-group">
    <input type="text" class="form-control" id="location" aria-describedby="location-help" placeholder="Location" name="location" value="<?php echo (isset($_POST['location']) ? $_POST['location'] : '') ?>">
  </div>
  <div class="container-fluid center-align">
  <button type="submit" name="submit" class="btn btn-outline-dark btn-lg  align-self-center">Discover</button>
  </div>


</main>

<?php include 'views/partials/footer.php'; ?>