<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        

        <meta property="og:title" content="Japan Tourist">
        <meta property="og:description" content="Search places to visit in Japan.">        
        <meta property="og:image" itemprop="image" content="">
        <meta property="og:type" content="website">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:type" content="image/png">

        <!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
        <meta property="og:image:width" content="256">
        <meta property="og:image:height" content="256">

        <meta name="theme-color" content="#c62828">

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}">

        <title>Japan Tourist - Search places to visit in Japan.</title> 
        
        <!-- libraries -->
        <script src="{{ asset('lib/jquery/jquery.min.js') }}" defer></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('lib/materialize/materialize.min.css') }}">
        <script src="{{ asset('lib/materialize/materialize.min.js') }}" defer></script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <!-- Custom -->
        <link rel="stylesheet" type="text/css" href="{{ asset('lib/common/css/styles.css') }}">
        <script src="{{ asset('lib/common/js/scripts.js') }}" defer></script>
      
        <script src="https://kit.fontawesome.com/74bae1f858.js" crossorigin="anonymous"></script>
        
        <script>
            
        </script>


    </head>
    <body class="">
		<header> 
            <nav class="psf">
                <div class="nav-wrapper red darken-3">
                    <a href="#" class="brand-logo">
                        <img src="{{ asset('img/logo_flg.png') }}" height="50" alt="Japan Tourist"> 
                    </a>
                </div>
            </nav>          
		</header>
       
        <div class="page-contents">              
			<div class="search-cont">
                <h5 class="grey-text">Where do you want to go?</h5>
                <select class="browser-default" id="destination">
                    <option value="">Select your destination</option>
                    <option>Tokyo</option>
                    <option>Yokohama</option>
                    <option>Kyoto</option>
                    <option>Osaka</option>
                    <option>Sapporo</option>
                    <option>Nagoya</option>
                </select>
            </div>
            <div class="weather">
                
            </div>
            <div class="results places">
                
            </div>
		</div>
     
		<div class="footer">
            <div class="row footer-btn-cont red darken-3 mb0 show-on-small pt5">
                <div class="col s4 footer-menu-item center-align active default">
                    <div><i class="material-icons white-text">search</i></div>
                    <div><small class="white-text">Search</small></div>
                </div>
                <div class="col s4 footer-menu-item center-align">
                    <div><i class="material-icons white-text">map</i></div>
                    <div><small class="white-text">Map</small></div>
                </div>
                <div class="col s4 footer-menu-item center-align b-mid">
                    <div><i class="material-icons white-text">bookmark</i></div>
                    <div><small class="white-text">Bookmark</small></div>
                </div>
            </div>
		</div>
    </body>
</html>