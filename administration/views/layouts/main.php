<?php

use administration\helpers\Flash;
use common\Router;

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

    <title>Paper Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="/public/administration/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/public/administration/css/animate.min.css" rel="stylesheet"/>
    <link href="/public/administration/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="/public/administration/css/demo.css" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="/public/icons/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/public/administration/css/themify-icons.css" rel="stylesheet">

    <script src="/public/administration/js/jquery-1.10.2.js" type="text/javascript"></script>
</head>
<body>

<div class="wrapper">
    <div id="parent-menu-block" class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/<?= Router::getInstance()->getRoutMarker(); ?>" class="simple-text">
                    Brain CV
                </a>
            </div>
            <ul class="nav">
                <li class="<?= $active == 'dashboard' ? 'active' : '' ?>">
                    <a href="/<?= Router::getInstance()->getRoutMarker(); ?>">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="<?= $active == 'personal' ? 'active' : '' ?>">
                    <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/personal">
                        <i class="ti-user"></i>
                        <p>Personal</p>
                    </a>
                </li>
                <li class="<?= $active == 'skills' ? 'active' : '' ?>">
                    <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/skills">
                        <i class="ti-mouse-alt"></i>
                        <p>Skills</p>
                    </a>
                </li>
                <li class="<?= $active == 'education' ? 'active' : '' ?>">
                    <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/education">
                        <i class="ti-blackboard"></i>
                        <p>Education</p>
                    </a>
                </li>
                <li class="<?= $active == 'experience' ? 'active' : '' ?>">
                    <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/experience">
                        <i class="ti-briefcase"></i>
                        <p>Experience</p>
                    </a>
                </li>
                <li class="<?= $active == 'interests' ? 'active' : '' ?>">
                    <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/interests">
                        <i class="ti-camera"></i>
                        <p>Interests</p>
                    </a>
                </li>
            </ul>
            <hr>
            <ul class="nav">
                <li>
                    <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/index/logout">
                        <i class="ti-power-off"></i>
                        <p>Log out</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <span class="navbar-brand" href="/"><?= $title; ?></span>
                </div>
                <div class="collapse navbar-collapse"></div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (Flash::hasKey('success')) : ?>
                        <div class="alert alert-success">
                            <button class="close" aria-hidden="true" type="button">×</button>
                            <span><b> Success - </b> <?= Flash::get('success'); ?></span>
                        </div>
                        <?php endif; ?>
                        <?php if (Flash::hasKey('error')) : ?>
                        <div class="alert alert-danger">
                            <button class="close" aria-hidden="true" type="button">×</button>
                            <span><b> Error - </b> <?= Flash::get('error'); ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="card">
                            <?= $content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

<script src="/public/administration/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/public/administration/js/bootstrap-checkbox-radio.js"></script>
<script src="/public/administration/js/chartist.min.js"></script>
<script src="/public/administration/js/bootstrap-notify.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script src="/public/administration/js/paper-dashboard.js"></script>
<script src="/public/administration/js/demo.js"></script>

</html>