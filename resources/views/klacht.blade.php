
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
   <!-- GOOGLE EARTH -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAVWqVjNRy6q63B4RNhMSf9lxY9LMHG7CI'></script>

<!-- BOOTSTRAP RESPONSIVE -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- klacht.css -->
<link rel="stylesheet" href="/css/klacht.css">
@extends('/layouts/bootstrap')
             <title>Klachten</title>



                                     <!-- STYLE -->

                                                 <!-- END STYLE -->

</head>


                                                  <!-- BODY -->

<body>
  <!-- NAVBAR 1 -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
           <div class="navbar-header">
               <a class="navbar-brand" href="/"><i class="fas fa-home"></i> Home</a>
           </div>
          <ul class="nav navbar-nav">
            <li><a href="overzicht">OVERZICHT</a></li>
            <li><a href="info"><i class="fas fa-info"></i> INFO</a></li>
            <li><a href="faq"><i class="far fa-comment-dots"></i> FAQ</a></li>
            <li><a href="contact"><i class="far fa-address-card"></i> CONTACT</a></li>
            <li><a href="disclaimer">DISCLAIMER</a></li>

          </ul>
        </div>
      </nav>



    <!-- HEADER -->
<div  class="container">
    <div id="header"  class="jumbotron">

<h1>  <!-- Single Element -->
    <i class="fas fa-hands-helping"></i>  KlachtenMelders <i class="fas fa-hands-helping"></i></h1>

    </div>
</div>


<!-- POST  4 -->
<div   class="container">
  <div id="menu" class="jumbotron">

    <div  class="row">

              <div class="col-md-5" >
                  <form id="post">
                      <i id="pic1"></i>
                        <div class="form-group">
                          <h1 id="h">MELD KLACHT</h1>
                          <label for="exampleFormControlInput1"><i class="far fa-edit"></i> Email address</label>
                          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"><i class="far fa-hand-pointer"></i> Selecteer een catogorie</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>Vuilnis</option>
                          <option>Lawaaioverlast</option>
                          <option>Stankoverlast</option>
                          <option>Criminaliteit</option>
                          <option>Parkeeroverlast</option>
                          <option>Parkeerproblemen</option>
                          </select>
                    </div>

                      <div class="form-group">

                        <label for="exampleFormControlTextarea1"><i class="far fa-edit"></i> Type uw klacht hier</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>

                        <button type="button" class="btn btn-primary my-1">Post klacht</button>
                  </form>


          </div>

          <div class="col-md-3" ></div>


<!-- ZOEKEN  5 -->

          <div  class="col-md-4">

                  <form id="zoeken">
                        <div class="form-group">
                          <h1 id="h"> ZOEK KLACHT</h1>
                          <!-- <label  for="exampleFormControlInput1"> Postcode</label> -->

                          <small id="emailHelp" ><i class="far fa-edit"></i> Voer alleen Nederlandse Postcodes in!</small>

                          <input type="text"  class="form-control" id="zip" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Postcode">
                          </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><i class="fas fa-glasses"></i> Voorkomende klachten</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
                        </div>

                        <button type="button" class="btn btn-primary my-1" onclick="lonlat()">Zoek op Postcode</button>

                    </form>
          </div>

          <div  class="col-md-4"></div>
      </div>
</div>
</div>



  <!--  GOOLE MAP CANVAS 6 -->
  <div   class="container">
      <div id='gmap_canvas' class="jumbotron"style='height:516px;' >
          <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>

      </div>
  </div>


<!-- Google map Generator -->
<a href='http://maps-generator.com/nl'>http://Maps-Generator.com/nl</a>

<script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=77788cb9ebd27122950fb30c8b73eead76e8bd1f'></script>


<!-- zipcode to long/lat CONVERTER 7 -->
<script>

    function lonlat() {
     var zipCode = document.getElementById("zip").value;
     var lat_out = document.getElementById('map');
    var lon_out = document.getElementById('map2');
    var input = document.getElementById('zip').value;
    document.getElementById("map3").innerHTML=input;
        var xhr = $.get('https://maps.googleapis.com/maps/api/geocode/json?address=' + zipCode + '&key=AIzaSyDVPLLlJAQ679Frd0gu11khJ9mW02wsvWQ');

        xhr.done(function(data) {

		lat_out.innerHTML = data.results[0].geometry.location.lat;
    lon_out.innerHTML = data.results[0].geometry.location.lng;
    lonlat_l();
    });

    }

</script>


<!-- LOAD GOOLGE MAP 8 -->
<script type='text/javascript'>

function lonlat_l() {


x=document.getElementById("map").innerHTML;
y=document.getElementById("map2").innerHTML;
z=document.getElementById("map3").innerHTML;

                            var myOptions = {zoom:18,center:new google.maps.LatLng(x,y),mapTypeId: google.maps.MapTypeId.HYBRID};
                            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                            marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(x,y)});
                            infowindow = new google.maps.InfoWindow({content:'<h4><strong>klachtenmelder</strong><br></h4>'+ ' <strong>Postcode: </strong>'+z+ '<br><strong>Klacht: </strong>'});
                            google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);
                                                                                                                 });

         infowindow.open(map,marker);
                   }google.maps.event.addDomListener(window, 'load', init_map);

                   </script>











<!-- FOOTER -->
<div  class="container">
    <div id="footer" class="jumbotron">

            <div  class="row">
                    <div class="col-md-4" >

                                    <img id="responsive" class="mySlides" src="/Fotos/img1.jpg">
                                    <img id="responsive" class="mySlides" src="/Fotos/img2.jpg">
                                    <img id="responsive" class="mySlides" src="/Fotos/img3.jpg">
                                    <img id="responsive" class="mySlides" src="/Fotos/img4.jpg">
                                    <img id="responsive" class="mySlides" src="/Fotos/img5.jpg">
                                    <img id="responsive" class="mySlides" src="/Fotos/img6.jpg">
                                    <img id="responsive" class="mySlides" src="/Fotos/img7.jpg">
                                    <img id="responsive" class="mySlides" src="/Fotos/img8.jpg">
                                    <img id="responsive" class="mySlides" src="/Fotos/img9.jpg">
                                    <img id="responsive" class="mySlides" src="/Fotos/img10.jpg">
                                <br/>
                    </div>

                    <div class="col-md-4" >
                        <!-- facebook-->
                        <a id="social" class="btn btn-block btn-social btn-facebook"href="https://www.facebook.com/">
                            <span class="fa fa-facebook"></span> Facebook
                        </a>

                        <!-- twitter -->
                        <a id="social" class="btn btn-block btn-social btn-twitter"  href="https://twitter.com/">

                            <span class="fa fa-twitter"></span> Twitter
                        </a>

                        <!-- Linkedin -->
                        <a id="social" class="btn btn-block btn-social btn-linkedin" href="https://nl.linkedin.com/">
                            <span class="fa fa-linkedin"></span> Linkedin
                        </a>
                        <br/>
                        <br/>
            <!-- Generated by codefuture.co.uk -->
            <script language="JavaScript">

                    document.write('&copy;' );
                    document.write(' 2019 - ');
                    document.write(new Date().getFullYear());
                    document.write(' http://www.hackermaster.tk/ - All Rights Reserved.');
                    document.write(' <br/>klachtenmelder/klacht - All Rights Reserved.');
                    document.write('<br/>Last Updated : ');
                    document.write(document.lastModified);
                    //-->
                    </script>

                    </div>
                    <div class="col-md-4" >





<div class="media border p-3">
          <div class="media-body">

                <h5> <i class="far fa-address-card"></i> Adres: </h5>
          <h6>Schieringerweg <br/>8924HV,Leeuwarden <br/>Nederland</h6>
<br/>
          <h5><i class="fas fa-phone"></i> Telphone: </h5>
          <h6>0612345678</h6>

          <br/>

          <h5><i class="far fa-envelope-open"></i> Email: </h5>
          <h6>klachtenmelder@hotmailcom</h6>

        </div>
      </div>


                    </div>
            </div>



    </div>
</div>


         <!-- HIDDEN LAT LONG input fields 2 -->
    <p id="map" type="hidden"></p>
    <p id="map2" type="hidden"></p>
    <p id="map3" type="hidden">POSTCODE</p>
    <p id="map1" type="hidden">52.3750823</p>
    <p id="map12" type="hidden">4.6259389</p>




    <script>
            var myIndex = 0;
            carousel();

            function carousel() {
              var i;
              var x = document.getElementsByClassName("mySlides");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
              }
              myIndex++;
              if (myIndex > x.length) {myIndex = 1}
              x[myIndex-1].style.display = "block";
              setTimeout(carousel, 8000); // Change image every 2 seconds
            }
            </script>

</body>
</html>
