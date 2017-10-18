<?php include 'partials/header.php';
      include 'app/forecast.php';

 ?>
<pre>
  <?php// print_r($forecast); ?>
</pre>

<pre>

<?php 
  require 'vendor/autoload.php';
  $client = new \GuzzleHttp\Client();
  $res = $client->request('GET', 'https://www.instagram.com/insta_weatherapp/media/');
  $data = json_decode($res->getBody());

  
  $images = $data->items;

  foreach ($images as $image ) {
$thumbnail =  $image->images->standard_resolution->url;
  //var_dump($thumbnail);

if($image->caption->text == '#clearday'){
    $thumbnail_clearday =  $image->images->standard_resolution->url;
  }else if( $image->caption->text =='#rain'){
    $thumbnail_rain =  $image->images->standard_resolution->url;
  }else if ( $image->caption->text =='#clearnight'){
    $thumbnail_clearnight =  $image->images->standard_resolution->url;
  }else if ( $image->caption->text =='#cloudy'){
    $thumbnail_cloudy =  $image->images->standard_resolution->url;
  }else if ( $image->caption->text =='#partlycloudyday'){
    $thumbnail_partlycloudyday =  $image->images->standard_resolution->url;
  }else if( $image->caption->text =='#snow'){
    $thumbnail_snow =  $image->images->standard_resolution->url;
  }else if( $image->caption->text =='#partlycloudynight'){
    $thumbnail_partlycloudynight =  $image->images->standard_resolution->url;
  }else if( $image->caption->text =='#wind'){
    $thumbnail_wind =  $image->images->standard_resolution->url;
  } else $thumbnail = NULL;
    
  }
 
if($forecast->currently->icon == 'clear-day') {
     $thumbnail = $thumbnail_clearday;
  } else if ($forecast->currently->icon == 'rain'){
     $thumbnail = $thumbnail_rain;
  } else if ($forecast->currently->icon == 'snow'){
     $thumbnail = $thumbnail_snow;
  } else if ($forecast->currently->icon == 'wind'){
     $thumbnail = $thumbnail_wind;
  } else if ($forecast->currently->icon == 'partly-cloudy-night'){
     $thumbnail = $thumbnail_partlycloudynight;
  } else if ($forecast->currently->icon == 'partly-cloudy-day'){
     $thumbnail = $thumbnail_partlycloudyday;
  } else if ($forecast->currently->icon == 'cloudy'){
     $thumbnail = $thumbnail_cloudy;
  } else if ($forecast->currently->icon == 'clear-night'){
      $thumbnail = $thumbnail_clearnight;
  } else {
     $thumbnail = $thumbnail_clearnight;
}

}  


    
    


  
  
?>


</pre>
 

<div class="row justify-content-center ">
  <h1 class="display-3 text-center  text-light">
    InstaWeather
    
  </h1>
  </div>
<div class="container-fluid">
<div class="container  mx-auto"  ">
  <div class="row  ">
  <form action="forecast.php" method="post" class="form-group mx-auto " style="width:400px">
  
    <input type="text" class="form-control" id="location" aria-describedby="location-help" placeholder="Location" name="location" value="<?php echo (isset($_POST['location']) ? $_POST['location'] : '') ?>">
  

   <button type="submit" name="submit" class="btn btn-outline-light  btn-lg  mt-3 mb-3  d-flex mx-auto .d-block text-center" style="width:200px;">Search</button>
 </form>

   </div>
   </div>

   <img src=" <?php echo $thumbnail ;?> " alt="" class=" img-fluid rounded mx-auto d-block">
  
  

  
   

</div>




<main class="container py-5 text-center ">



  
  <div class=" py-5 mx-auto" style="max-width: 320px;">
   
  </div>
  <div class=" p-4 my-5 mx-auto" style="max-width: 320px;">
    <p class="lead text-bold m-0">Todays Weather in <?php echo $place; ?> is</p>
    <h2 class=" mb-0">
      <?php echo round($forecast['currently']['temperature']); ?>&deg;

    </h2>
    <img src= "assets/dist/images/<?php echo $forecast['currently']['icon']; ?>.svg" alt="" width="100" Height="100" class="mx-auto">
    <?php 
     // $icon = $forecast['currently']['icon'];
     // echo '<img src="../assets/dist/images/'.$icon.'">';
     ?>
    <p class="lead">


      <?php echo $forecast['currently']['summary']; ?>
      
    </p>



    <!-- <p class="lead">
      Wind Speed: <?php echo round($forecast['currently']['windSpeed']); ?> MPH
    </p> -->
  </div>
  <div class="row">
    <?php foreach($forecast['daily']['data'] as $day): ?>
      <div class="col-6 col-md-3 " >
        <div class=" p-4 my-5 mx-auto"">
          <p class=" lead m-0">
            <?php echo gmdate("D", $day['time']); ?>
          </p>
          <h2 class="m-0">
            <?php echo round($day['temperatureHigh']); ?>&deg;
          </h2>
          <img src= "assets/dist/images/<?php echo $forecast['currently']['icon']; ?>.svg" alt="" width="100" Height="100" class="mx-auto">
          <p class="lead text-center">
            <?php echo $day['summary']; ?>
          </p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>
<?php include 'partials/footer.php'; ?>