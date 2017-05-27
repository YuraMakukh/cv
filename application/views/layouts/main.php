<?php

/**
 * @var string $content
 */

?>
<!DOCTYPE html>
<!--[if IE 7]><html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">

    <!-- TITLE OF SITE-->
    <title> Al Rayhan </title>

    <!-- META TAG -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CV, Portfolio, Resume">
    <meta name="author" content="Md. Siful Islam, Desiver Web">

    <!-- FAVICON -->
    <link rel="icon" href="/public/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/images/apple-icon-114x114.png">

    <link href="/public/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/animate.css">
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href="/public/icons/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/public/css/style.css" rel="stylesheet">
    <link href="/public/css/responsive.css" rel="stylesheet">

    <!-- COLORS -->
    <link rel="alternate stylesheet" href="/public/css/colors/red.css" title="red">
    <link rel="alternate stylesheet" href="/public/css/colors/purple.css" title="purple">
    <link rel="alternate stylesheet" href="/public/css/colors/orange.css" title="orange">
    <link rel="alternate stylesheet" href="/public/css/colors/green.css" title="green">
    <link rel="stylesheet" href="/public/css/colors/lime.css" title="lime">
    
    <!-- STYLE SWITCH STYLESHEET ONLY FOR DEMO -->
    <link rel="stylesheet" href="/public/css/demo.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Start Container-->
<div class="container">
    <!-- row -->
    <div class="row">
        <?= $content; ?>
    </div> <!-- end row -->
</div>  <!-- end container -->


<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/materialize.min.js"></script>
<script src="/public/js/wow.min.js"></script>
<script src="/public/js/masonry.pkgd.js"></script>
<script src="/public/js/validator.min.js"></script>
<script src="/public/js/jquery.mixitup.min.js"></script>

<!-- Customized js -->
<script src="/public/js/init.js"></script>

<!-- Style switter js -->
<script src="/public/js/styleswitcher.js"></script>

<div class="cv-style-switch" id="switch-style">
    <a id="toggle-switcher" class="switch-button icon_tools"> <i class="fa fa-cogs"></i></a>
    <div class="switched-options">
        <div class="config-title">
            Colors :
        </div>
        <ul class="styles">
            <li><a href="#" onclick="setActiveStyleSheet('red'); return false;" title="Red">
                    <div class="red"></div>
                </a></li>

            <li><a href="#" onclick="setActiveStyleSheet('purple'); return false;" title="purple">
                    <div class="purple"></div>
                </a></li>

            <li><a href="#" onclick="setActiveStyleSheet('orange'); return false;" title="orange">
                    <div class="orange"></div>
                </a></li>

            <li><a href="#" onclick="setActiveStyleSheet('green'); return false;" title="green">
                    <div class="green"></div>
                </a></li>

            <li><a href="#" onclick="setActiveStyleSheet('lime'); return false;" title="lime">
                    <div class="lime"></div>
                </a></li>

            <li class="p">
                ( NOTE: Pre Defined Colors. You can change colors very easily )
            </li>
        </ul>
    </div>
</div>

</body>
</html>
