<?php

use common\Router;

/**
 * @var \application\models\CvDataFactory $parts
 */

?>
<div class="col-lg-4 col-md-5">
    <div class="card card-user">
        <?php if ($parts->getPersonal()->getPhoto()) : ?>
            <div class="image">
                <img src="/public/administration/img/background.jpg" alt="CV"/>
            </div>
        <?php endif; ?>
        <div class="content">
            <div class="author <?= empty($parts->getPersonal()->getPhoto()) ? 'no-margin' : ''; ?>">
                <?php if ($parts->getPersonal()->getPhoto()) : ?>
                    <img class="avatar border-white" src="<?= $parts->getPersonal()->getPhoto(); ?>"
                         alt="<?= $parts->getPersonal()->getName(); ?>"/>
                <?php endif; ?>
                <h4 class="title"><?= $parts->getPersonal()->getName(); ?><br/>
                    <a href="#">
                        <small>@<?= $parts->getPersonal()->getPosition(); ?></small>
                    </a>
                </h4>
            </div>
            <p class="description text-center">
                <?= nl2br($parts->getPersonal()->getInformation()); ?>
            </p>
            <p class="description text-center">
                <a href="/<?= Router::getInstance()->getRoutMarker() ?>/personal" class="btn btn-info btn-fill btn-wd">
                    Edit personal data
                </a>
            </p>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h4 class="title">
                Phones
                <a href="/<?= Router::getInstance()->getRoutMarker() ?>/personal" class="pull-right">
                    <small>Edit</small>
                </a>
            </h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getPersonal()->getPhones() as $phone) : ?>
                    <li>
                        <div class="row">
                            <div class="col-xs-6">
                                <?= $phone['data'] ?>
                                <br/>
                                <span class="text-muted"><small><?= $phone['description'] ?></small></span>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h4 class="title">
                E-mails
                <a href="/<?= Router::getInstance()->getRoutMarker() ?>/personal" class="pull-right">
                    <small>Edit</small>
                </a>
            </h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getPersonal()->getEmails() as $email) : ?>
                    <li>
                        <div class="row">
                            <div class="col-xs-6">
                                <?= $email['data'] ?>
                                <br/>
                                <span class="text-muted"><small><?= $email['description'] ?></small></span>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h4 class="title">
                Addresses
                <a href="/<?= Router::getInstance()->getRoutMarker() ?>/personal" class="pull-right">
                    <small>Edit</small>
                </a>
            </h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getPersonal()->getAddresses() as $address) : ?>
                    <li>
                        <div class="row">
                            <div class="col-xs-6">
                                <?= $address['data'] ?>
                                <br/>
                                <span class="text-muted"><small><?= $address['description'] ?></small></span>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h4 class="title">
                Skills
                <a href="/<?= Router::getInstance()->getRoutMarker() ?>/skills" class="pull-right">
                    <small>Edit</small>
                </a>
            </h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getSkills() as $skill) : ?>
                    <li>
                        <div class="row">
                            <div class="col-xs-6">
                                <?= $skill['data'] ?>
                                <span class="text-success"><small><?= $skill['level'] ?> / 100</small></span>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-8 col-md-7">
    <div class="card">
        <div class="header">
            <h4 class="title">
                Work Experience
                <a href="/<?= Router::getInstance()->getRoutMarker() ?>/experience" class="pull-right">
                    <small>Edit</small>
                </a>
            </h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getExperience() as $experience) : ?>
                    <li>
                        <p>
                            <span class="text-success"><small><?= $experience->getPeriod(); ?></small></span>
                            <br>
                            <?= $experience->getPosition(); ?> in
                            <span class="text-success"><?= $experience->getCompany(); ?></span>
                        </p>
                        <blockquote>
                            <p><?= nl2br($experience->getDescription()); ?></p>
                        </blockquote>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h4 class="title">
                Education
                <a href="/<?= Router::getInstance()->getRoutMarker() ?>/education" class="pull-right">
                    <small>Edit</small>
                </a>
            </h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getEducation() as $education) : ?>
                    <li>
                        <p>
                            <span class="text-success"><small><?= $education->getPeriod(); ?></small></span>
                            <br>
                            <?= $education->getSpecialty(); ?> in
                            <span class="text-success"><?= $education->getInstitution(); ?></span>
                        </p>
                        <blockquote>
                            <p><?= nl2br($education->getDescription()); ?></p>
                        </blockquote>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h4 class="title">
                Interests
                <a href="/<?= Router::getInstance()->getRoutMarker() ?>/interests" class="pull-right">
                    <small>Edit</small>
                </a>
            </h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getInterests() as $interest) : ?>
                    <li>
                        <div class="row">
                            <div class="col-xs-6">
                                <i class="fa <?= $interest->getIcon(); ?>"></i>
                                <?= $interest->getItem() ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>