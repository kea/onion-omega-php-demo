<!-- 3. Display the application -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Onion Omega PHP demo</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <!-- link rel="icon" sizes="192x192" href="images/android-desktop.png" -->

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <!-- link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png" -->

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <!-- meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png" -->
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="js/vendors/material.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="mdl-layout-container">

        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title">Dashboard</span>
                    <div class="mdl-layout-spacer"></div>
                </div>
            </header>
            <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
                <div class="demo-drawer-header">
                    <img src="img/onion.png" class="demo-avatar" />
                    <span>Onion Omega</span>
                </div>
                <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                    <a to="/" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Dashboard</a>
                    <a to="/oled" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">subtitles</i>Oled</a>
                    <a to="/relay" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">tune</i>Relay</a>
                    <a to="/pwm" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">replay</i>Servo (PWM)</a>
                    <a to="/gps" class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">my_location</i>GPS</a>
                </nav>
            </div>
            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">
                    <?php foreach (['OLED' => 'oled', 'Relay' => 'relay', 'Servo PWM' => 'pwm', 'GPS' => 'gps'] as $name => $section) : ?>
                        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
                            <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                                <h2 class="mdl-card__title-text"><?php echo $name ?></h2>
                            </div>
                            <div class="mdl-card__supporting-text mdl-color-text--grey-600" id="<?php echo $section ?>">
                                Loading...
                            </div>
                            <div class="mdl-card__actions mdl-card--border" id="<?php echo $section ?>-action">
                                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">Use it<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </div>


    </div>
    <script src="js/vendors/material.min.js"></script>
    <script src="js/vendors/zepto.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>