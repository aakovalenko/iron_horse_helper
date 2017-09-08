<?php

/* @var $this yii\web\View */

$this->title = 'Iron-horse helper';
?>


<div class="site-index">

   <!-- <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>-->

    <div class="body-content">

        <!--<div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>-->
        <div class="text-info">Your address:</div>
        <div id="address"> </div>
        <h1></h1>

        <div id="map" style="width:100%;height: 500px;"></div>

        <div class="text-success">Your position: </div>
        <div id="lat"></div>
        <div id="lng"></div>




        <script>
            // Note: This example requires that you consent to location sharing when
            // prompted by your browser. If you see the error "The Geolocation service
            // failed.", it means you probably did not give permission for the browser to
            // locate you.

            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    //center: {lat: 44, lng: 34},
                    zoom: 12

                });

                var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                var tribeca = {lat: 49.56, lng: 34.52};
                var marker = new google.maps.Marker({
                    position:tribeca,
                    map: map,
                    title: 'My Marker',
                    icon: image
                });

                var infowindow = new google.maps.InfoWindow({
                    content: 'my flag'
                });

                marker.addListener('click', function(){
                    infowindow.open(map,marker);
                });

                // var infoWindow = new google.maps.InfoWindow({map: map});

                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude

                        };

                        document.getElementById("lat").innerHTML = pos.lat;
                        document.getElementById("lng").innerHTML = pos.lng;
                        console.log(pos);

                        /* var tribeca = {lat:pos.lat, lng: pos.lng};
                         var marker = new google.maps.Marker({
                             position: tribeca,
                             map: map,
                             title: 'Your are here'
                         });*/

                        var geocoder = new google.maps.Geocoder;
                        var infowindow = new google.maps.InfoWindow;


                        var latlng = {lat: pos.lat, lng: pos.lng};
                        console.log(latlng);

                        geocoder.geocode({'location': latlng}, function(results, status) {
                            if (status === 'OK') {
                                if (results[1]) {
                                    map.setZoom(11);

                                    var marker = new google.maps.Marker({
                                        position: latlng,
                                        map: map
                                    });
                                    infowindow.setContent(results[1].formatted_address);


                                    var addr = infowindow.content.split(',');

                                    var addr3 = addr.shift();//delete first element of array
                                    delete(addr3);
                                    var addr2 = addr.pop(); //delete last element of array
                                    delete(addr2);
                                    console.log(infowindow.content);
                                    console.log(addr3);
                                    console.log(addr2);
                                    console.log(typeof (infowindow.content));

                                    document.getElementById('address').innerHTML = addr;



                                    infowindow.open(map, marker);
                                } else {
                                    window.alert('No results found');
                                }
                            } else {
                                window.alert('Geocoder failed due to: ' + status);
                            }
                        });

                        //infoWindow.setPosition(pos);
                        //infoWindow.setContent('You are here!');
                        map.setCenter(pos);
                    }, function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            }

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
            }


        </script>

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzhI2jTbdvHUGmbId1fx6eaNcTeSgpKW4&callback=initMap">
        </script


    </div>
</div>
