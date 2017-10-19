<?php include 'partials/header.php';
      include 'app/forecast.php';

 ?>
<!-- <pre>
  <?php// print_r($forecast); ?>
</pre> -->

 <!-- <pre> -->

<?php 
  require 'vendor/autoload.php';
  $client = new \GuzzleHttp\Client();
  $res = $client->request('GET', 'https://www.instagram.com/insta_weatherapp/media/');
  $data = json_decode($res->getBody());
  //print_r($data);

  
//   $images = $data->items;

//   foreach ($images as $image ) {
// $thumbnail =  $image->images->standard_resolution->url;
//  // var_dump($thumbnail);

// if($image->caption->text == '#clearday'){
//     $thumbnail_clearday =  $image->images->standard_resolution->url;
//   }else if( $image->caption->text =='#rain'){
//     $thumbnail_rain =  $image->images->standard_resolution->url;
//   }else if ( $image->caption->text =='#clearnight'){
//     $thumbnail_clearnight =  $image->images->standard_resolution->url;
//   }else if ( $image->caption->text =='#cloudy'){
//     $thumbnail_cloudy =  $image->images->standard_resolution->url;
//   }else if ( $image->caption->text =='#partlycloudyday'){
//     $thumbnail_partlycloudyday =  $image->images->standard_resolution->url;
//   }else if( $image->caption->text =='#snow'){
//     $thumbnail_snow =  $image->images->standard_resolution->url;
//   }else if( $image->caption->text =='#partlycloudynight'){
//     $thumbnail_partlycloudynight =  $image->images->standard_resolution->url;
//   }else if( $image->caption->text =='#wind'){
//     $thumbnail_wind =  $image->images->standard_resolution->url;
//   } else {
//     $thumbnail = $thumbnail_rain;
    
//   }
 
// if($forecast->currently->icon == 'clear-day') {
//      $thumbnail = $thumbnail_clearday;
//   } else if ($forecast->currently->icon == 'rain'){
//      $thumbnail = $thumbnail_rain;
//   } else if ($forecast->currently->icon == 'snow'){
//      $thumbnail = $thumbnail_snow;
//   } else if ($forecast->currently->icon == 'wind'){
//      $thumbnail = $thumbnail_wind;
//   } else if ($forecast->currently->icon == 'partly-cloudy-night'){
//      $thumbnail = $thumbnail_partlycloudynight;
//   } else if ($forecast->currently->icon == 'partly-cloudy-day'){
//      $thumbnail = $thumbnail_partlycloudyday;
//   } else if ($forecast->currently->icon == 'cloudy'){
//      $thumbnail = $thumbnail_cloudy;
//   } else if ($forecast->currently->icon == 'clear-night'){
//       $thumbnail = $thumbnail_clearnight;
//   } else {
//      $thumbnail = $thumbnail_rain;
// }

// }  

$conditions = $forecast['currently']['icon'];

switch ($conditions) {
case "clear-day":
$photo = "https://scontent-lax3-2.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/22639018_2028258974120073_6001746226658148352_n.jpg";
break;
case "clear-night":
$photo = "https://scontent-lax3-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/22581768_899780986846482_3535013351694270464_n.jpg";
break;
case "rain":
$photo = "https://scontent-lax3-2.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/22582368_1519565718101698_3336267004247015424_n.jpg";
break;
case "snow":
$photo = "https://scontent-lax3-2.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/22582509_833558763479428_7820111547287470080_n.jpg";
break;
case "wind":
$photo = "https://scontent-lax3-2.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/22638850_337440070054566_6934227349386821632_n.jpg";
break;

case "cloudy":
$photo = "https://scontent-lax3-2.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/22580060_1964417837135510_3111904733112041472_n.jpg";
break;
case "partly-cloudy-day":
$photo = "https://scontent-lax3-2.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/22580578_1925838701011532_959237978708770816_n.jpg";
break;
case "partly-cloudy-night":
$photo = "https://scontent-lax3-2.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/22580729_136237330360257_7877386933339422720_n.jpg";
break;
case "fog":
$photo = "https://scontent-lax3-2.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/22580578_1925838701011532_959237978708770816_n.jpg";
break;
case "sleet":
$photo = "https://scontent-lax3-2.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/22581805_887165231440930_377602306209742848_n.jpg";
break;
default:

$photo = "PHOTO URL HERE INSIDE QUOTES";
}
    
    


  
  
?>


<!--  </pre>  -->

 
<div class="container">
<div class="row justify-content-center ">
  <h1 class="display-3 text-center   text-light">
    Insights
    
  </h1>
  </div>

  <div class="row  ">
  <form action="forecast.php" method="post" class="form-group mx-auto p-2 " style="width:400px">
  
    <input type="text" class="form-control" id="location" aria-describedby="location-help" placeholder="Location" name="location" value="<?php echo (isset($_POST['location']) ? $_POST['location'] : '') ?>">
  

   <button type="submit" name="submit" class="btn btn-outline-light  btn-lg  mt-3 mb-3  d-flex mx-auto .d-block justify-content-center" style="width:200px;">Search</button>
 </form>

   </div>
   

   
 
  

  
   






<main class="container text-center ">


  



  
  <div class=" row " >
    <!-- <img src=" <?php echo $thumbnail ;?> " alt="" class=".img-thumbnail" style=""  > -->


  <div class="container-photo">
     
<img src="<?php echo $photo; ?>" alt="" class="mt-2" style="width:100%  ">

  </div>
  
  <div class=" .col-md-6 p-4 mt-3  mx-auto text-light" " style="width:300px;" >
    <h3> Todays Weather in <?php echo $place; ?> is</h3>
    <h2 class=" mb-0">
      <?php echo round($forecast['currently']['temperature']); ?>&deg;

    </h2>

    <img src= "assets/dist/images/<?php echo $forecast['currently']['icon']; ?>.svg" alt="" width="200" Height="200" class="mx-auto">
    <h3>
      

      #<?php echo $forecast['currently']['summary']; ?>
      
    </h3>

    <?php 

     // $icon = $forecast['currently']['icon'];
     // echo '<img src="../assets/dist/images/'.$icon.'">';
     ?>
    
    
    
</div>


    <!-- <p class="lead">
      Wind Speed: <?php echo round($forecast['currently']['windSpeed']); ?> MPH
    </p> -->
  </div>
  <div class="col p-4 mt-3  mx-auto text-light" " style="width:600px;" >  
  <h1 class="text-center align-top d-inline-block" ><?php
  $quotes = array(
      '"Have A Beautiful Day"',
      '"Go Change the World"',
      '"Treat Yo Self"',
      '"Be a Good Human"',
      '"We are all Still Growing"',
      '"Karma isnt a Bitch its  mirror"',
      '"Positive Energy can Heal the Universe"',
      '"If it doesnt challenge you, It wont change you"',
      '"You are Amazing"',
       '"Your a Unicorn"',
        '"Make Yourself Proud Today"',
         '"You are Amazing"',
          '"Get Shit Done"',
      '"Aligned is the New Hustle"'
    
    );

  

  
    echo $quotes [rand(0, 7)];
   
     ?></h1>
   </div>
  <div class="row text-light mt-5 mb-5">
    <?php foreach($forecast['daily']['data'] as $day): ?>
      <div class="col-12 col-md-3 " >
        <div class="  mx-auto"">
          <p class=" lead m-0">
            <?php echo gmdate("D", $day['time']); ?>
          </p>
          <h2 class="m-0">
            <?php echo round($day['temperatureHigh']); ?>&deg;
          </h2>
          <img src= "assets/dist/images/<?php echo $forecast['currently']['icon']; ?>.svg" alt="" width="110" Height="110" class="mx-auto">
          <p class="lead text-center"> 
            <?php echo $day['summary']; ?>
          </p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>
</div>
<?php include 'partials/footer.php'; ?>