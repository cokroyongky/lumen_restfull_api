<?php

$url="http://127.0.0.1:8000/schedule";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);

$result = file_get_contents($url);
$hasil = json_decode($result, true);
?>

<!DOCTYPE html>
<html lang="en" style="transform: none;">
<style type="text/css" id="night-mode-pro-style">
    html {
        background-color: #FFFFFF !important;
    }
    
    body {
        background-color: #FFFFFF;
    }
</style>
<link type="text/css" rel="stylesheet" id="night-mode-pro-link">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- TITLE -->
    <title>Train Schedule</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- GOOGLE FONT -->
    <link href="./Up45/css" rel="stylesheet" type="text/css">
    <link href="./Up45/css(1)" rel="stylesheet" type="text/css">
    <link href="./Up45/css(2)" rel="stylesheet" type="text/css">

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="./Up45/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./Up45/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./Up45/awe-booking-font.css">
    <link rel="stylesheet" type="text/css" href="./Up45/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="./Up45/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="./Up45/jquery-ui.css">
    <!-- REVOLUTION DEMO -->
    <link rel="stylesheet" type="text/css" href="./Up45/settings.css">


    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="./Up45/style.css">
    <link rel="stylesheet" type="text/css" href="./Up45/demo.css">

    <!-- CSS COLOR -->
    <link id="colorreplace" rel="stylesheet" type="text/css" href="./Up45/blue.css">

    <style>
        .theiaStickySidebar:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>


<body>

    <div class="col-md-8">
        <div class="sale-flights-tabs tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
            <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="sale-flights-tabs-2" aria-labelledby="ui-id-8" aria-selected="true"><a href="https://envato.megadrupal.com/html/gofar/#sale-flights-tabs-2" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-8">Train Schedule</a></li>
            </ul>
            <div class="sale-flights-tabs__content tabs__content">
                <div id="sale-flights-tabs-2" aria-labelledby="ui-id-8" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">

                    <table class="sale-flights-tabs__table">
                        <tbody>
                            <?php 
                            
                            foreach( $hasil['datas'] as $item ){
                            ?>
                            <tr>
                                <td class="sale-flights-tabs__item-flight">
                                    <div class="image-wrap">
                                        <img src="./Up45/train.png" alt="">
                                    </div>
                                    <div class="td-content">
                                        <div class="title">
                                            <h3><?php echo $item['train_name'];?></h3>
                                        </div>
                                        <ul>
                                            <li>
                                                <span class="from"><?php echo $item['station_departure'];?> -</span>
                                                <span class="to"><?php echo $item['station_arrived'];?></span>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <span class="to"><?php echo $item['class_name'];?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="line"></div>
                                </td>
                                <td class="sale-flights-tabs__item-depart">
                                    <h4>Depart</h4>
                                    <ul>
                                        <li><?php echo $item['departure_time'];?></li>
                                    </ul>
                                    <div class="line"></div>
                                </td>
                                <td class="sale-flights-tabs__item-arrive">
                                    <h4>Arrive</h4>
                                    <ul>
                                        <li><?php echo $item['arrived_time'];?></li>
                                    </ul>
                                    <div class="line"></div>
                                </td>
                               
                                <td class="sale-flights-tabs__item-Pesan">

                                    <a href="#" class="awe-btn">Pesan</a>
                                    <div class="line"></div>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
<script type="text/javascript" src="./Up45/jquery-1.11.2.min.js.download"></script>
    <script type="text/javascript" src="./Up45/masonry.pkgd.min.js.download"></script>
    <script type="text/javascript" src="./Up45/jquery.parallax-1.1.3.js.download"></script>
    <script type="text/javascript" src="./Up45/jquery.owl.carousel.js.download"></script>
    <script type="text/javascript" src="./Up45/theia-sticky-sidebar.js.download"></script>
    <script type="text/javascript" src="./Up45/jquery.magnific-popup.min.js.download"></script>
    <script type="text/javascript" src="./Up45/jquery-ui.js.download"></script>
    <script type="text/javascript" src="./Up45/scripts.js.download"></script>

    <!-- REVOLUTION DEMO -->
    <script type="text/javascript" src="./Up45/jquery.themepunch.revolution.min.js.download"></script>
    <script type="text/javascript" src="./Up45/jquery.themepunch.tools.min.js.download"></script>


    <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>

</html>