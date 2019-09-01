<?php

include 'config.php';
/*
$sql = "INSERT INTO user_table (firstname, lastname, address, phone, email, birthday, password) VALUES ('".$_POST["firstname"]."',
'".$_POST["lastname"]."','".$_POST["address"]."','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["birthday"]."', '".$_POST["password"]."')";
*/
$sql = "select lat, lon from location_info";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $latt = $row['lat'];
       $lonn = $row['lon'];
    }
} else {
    echo "0 results";
}
mysqli_close($conn);

?>


<html>
    <head>
        <title>Google Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <style>          
          #map { 
            height: 300px;    
            width: 600px;            
          }          
        </style>        
    </head>    
    <body>        
        <div style="padding:10px">
            <div id="map"></div>
        </div>
        
        <script type="text/javascript">
        var map;
        
        function initMap() {                            
            var latitude = <?php echo $latt ?>; // YOUR LATITUDE VALUE
            var longitude = <?php echo $lonn ?>; // YOUR LONGITUDE VALUE
            
            var myLatLng = {lat: latitude, lng: longitude};
            
            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 20                    
            });
                    
            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              //title: 'Hello World'
              
              // setting latitude & longitude as title of the marker
              // title is shown when you hover over the marker
              title: latitude + ', ' + longitude 
            });            
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrG9qeAV7qjeprT1eZ8AxCWuZWMCFr_hs&callback=initMap"
        async defer></script>
    </body>    
</html>