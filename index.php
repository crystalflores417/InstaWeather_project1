<?php include 'views/partials/header.php';
      

?>

  


<!-- HEADER -->




<div class="bg-img-main jumbotron">

<main class="container py-5 mt-5 ">
  

<div class="row justify-content-center ">
  <h1 class="display-3 text-center mt-5 text-light .col-md-8">
		Insights
		
	</h1>
</div>
	
<!-- FORM -->
<!-- style="background: url(<?php echo $thumbnail; ?>);" -->

  <div class="row  ">
	<form action="forecast.php" method="post" class="form-group mx-auto " style="width:400px">
  
    <input type="text" class="form-control .leade" id="location" aria-describedby="location-help" placeholder="Location" name="location" value="<?php echo (isset($_POST['location']) ? $_POST['location'] : '') ?>">
  

   <button type="submit" name="submit" class="btn btn-outline-light  btn-lg  mt-3 mb-3  d-flex mx-auto .d-block justify-content-center z-index .lead" style="width:200px;">Search</button>
 </form>

   </div>
   

    
 
<div class="row justify-content-center">
  <h3 class="text-center col align-self-center text-light ">
    Check the weather <br>
Get Inspired <br>
Get Motivated
    
  </h3>
</div>
</main>


</div>

<?php include 'views/partials/footer.php'; ?>