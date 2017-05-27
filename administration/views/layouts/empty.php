<?php

use administration\helpers\Flash;
use administration\Router;

/**
 * @var string $active
 * @var string $title
 * @var string $content
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/public/administration/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/public/administration/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Brain CV</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="/public/administration/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/public/administration/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="/public/icons/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/public/administration/css/themify-icons.css" rel="stylesheet">
</head>
<body>

<div class="container">

    <?php if (Flash::hasKey('success')) : ?>
        <div class="alert alert-success">
            <button class="close" aria-hidden="true" type="button">×</button>
            <span><b> Success - </b> <?= Flash::get('success'); ?></span>
        </div>
    <?php elseif (Flash::hasKey('error')) : ?>
        <div class="alert alert-danger">
            <button class="close" aria-hidden="true" type="button">×</button>
            <span><b> Error - </b> <?= Flash::get('error'); ?></span>
        </div>
    <?php endif; ?>

    <?= $content; ?>

</div>

</body>

</html>