<?php

/**
 * @var \application\models\cv\CvPartsFactory $parts
 */

?>
<!-- Start Sidebar -->
<aside class="col l4 m12 s12 sidebar z-depth-1" id="sidebar">
    <!--  Sidebar row -->
    <div class="row">
        <!--  top section   -->
        <div class="heading">
            <?php if ($parts->getPersonal()->getPhoto()) : ?>
                <div class="feature-img">
                    <a href="/"><img src="<?= $parts->getPersonal()->getPhoto(); ?>" class="responsive-img" alt=""></a>
                </div>
            <?php endif; ?>
            
            <div class="title col s12 m12 l9 right  wow fadeIn" data-wow-delay="0.1s">
                <h2><?= $parts->getPersonal()->getName(); ?></h2> <!-- title name -->
                <span><?= $parts->getPersonal()->getPosition(); ?></span>  <!-- tagline -->
            </div>
        </div>
        <!-- sidebar info -->
        <div class="col l12 m12 s12 sort-info sidebar-item">
            <div class="row">
                <div class="col m12 s12 l3 icon"> <!-- icon -->
                    <i class="fa fa-user"></i>
                </div>
                <div class="col m12 s12 l9 info wow fadeIn a1" data-wow-delay="0.1s"> <!-- text -->
                    <div class="section-item-details">
                        <p><?= $parts->getPersonal()->getInformation(); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- MOBILE NUMBER -->
        <div class="col l12 m12 s12  mobile sidebar-item">
            <div class="row">
                <div class="col m12 s12 l3 icon">
                    <i class="fa fa-phone"></i> <!-- icon -->
                </div>
                <div class="col m12 s12 l9 info wow fadeIn a2" data-wow-delay="0.2s">
                    <div class="section-item-details">
                        <?php foreach ($parts->getPersonal()->getPhones() as $phone) : ?>
                            <div class="personal">
                                <h4>
                                    <a href="tel:<?= $phone['data']; ?>">
                                        <?= $phone['data']; ?>
                                    </a>
                                </h4>
                                <span><?= $phone['description']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--  EMAIL -->
        <div class="col l12 m12 s12  email sidebar-item ">
            <div class="row">
                <div class="col m12 s12 l3 icon">
                    <i class="fa fa-envelope"></i> <!-- icon -->
                </div>
                <div class="col m12 s12 l9 info wow fadeIn a3" data-wow-delay="0.3s">
                    <div class="section-item-details">
                        <?php foreach ($parts->getPersonal()->getEmails() as $email) : ?>
                            <div class="personal">
                                <h4>
                                    <a href="mailto:<?= $email['data']; ?>">
                                        <?= $email['data']; ?>
                                    </a>
                                </h4>
                                <span><?= $email['description']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- ADDRESS  -->
        <div class="col l12 m12 s12  address sidebar-item ">
            <div class="row">
                <div class="col l3 m12  s12 icon">
                    <i class="fa fa-home"></i> <!-- icon -->
                </div>
                <div class="col m12 s12 l9 info wow fadeIn a4" data-wow-delay="0.4s">
                    <div class="section-item-details">
                        <?php foreach ($parts->getPersonal()->getAddresses() as $address) : ?>
                            <div class="address-details">
                                <h4><?= $address['data']; ?><br>
                                    <span><?= $address['description']; ?></span></h4>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- SKILLS -->
        <div class="col l12 m12 s12  skills sidebar-item">
            <div class="row">
                <div class="col m12 l3 s12 icon">
                    <i class="fa fa-calendar-o"></i> <!-- icon -->
                </div>
                <!-- Skills -->
                <div class="col m12 l9 s12 skill-line a5 wow fadeIn" data-wow-delay="0.5s">
                    <h3>Professional Skills </h3>
                    <?php foreach ($parts->getSkills() as $skill) : ?>
                        <span><?= $skill['data']; ?></span>
                        <div class="progress">
                            <div class="determinate"> <?= $skill['level']; ?>%</div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>   <!-- end row -->
</aside><!-- end sidebar -->

<!-- =========================================
   Work experiences
==========================================-->

<section class="col s12 m12 l8 section">
    <div class="row">
        <div class="section-wrapper z-depth-1">
            <div class="section-icon col s12 m12 l2">
                <i class="fa fa-suitcase"></i>
            </div>
            <div class="custom-content col s12 m12 l10 wow fadeIn a1" data-wow-delay="0.1s">
                <h2>Work Experience</h2>
                <?php foreach ($parts->getExperience() as $id => $work) : ?>
                    <div class="custom-content-wrapper wow fadeIn a<?= $id + 2; ?>" data-wow-delay="0.2s">
                        <h3>
                            <?= $work->getPosition(); ?>
                            <span>@<?= $work->getCompany(); ?></span>
                        </h3>
                        <span><?= $work->getPeriod(); ?> </span>
                        <p><?= nl2br($work->getDescription()); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ========================================
         Education
        ==========================================-->

        <div class="section-wrapper z-depth-1">
            <div class="section-icon col s12 m12 l2">
                <i class="fa fa-graduation-cap"></i>
            </div>
            <div class="custom-content col s12 m12 l10 wow fadeIn a1" data-wow-delay="0.1s">
                <h2>Education </h2>
                <?php foreach ($parts->getEducation() as $id => $education) : ?>
                    <div class="custom-content-wrapper wow fadeIn a<?= $id + 2; ?>" data-wow-delay="0.2s">
                        <h3>
                            <?= $education->getSpecialty(); ?>
                            <span>@<?= $education->getInstitution(); ?></span>
                        </h3>
                        <span><?= $education->getPeriod(); ?> </span>
                        <p><?= nl2br($education->getDescription()); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ========================================
              Intertests
        ==========================================-->

        <div class="section-wrapper z-depth-1">
            <div class="section-icon col s12 m12 l2">
                <i class="fa fa-plane"></i>
            </div>
            <div class="interests col s12 m12 l10 wow fadeIn" data-wow-delay="0.1s">
                <h2>Interests </h2>
                <ul>
                    <?php foreach ($parts->getInterests() as $interest) : ?>
                        <li>
                            <i class="fa <?= $interest->getIcon(); ?> tooltipped"
                               data-position="top" data-delay="50" data-tooltip="<?= $interest->getItem(); ?>"></i>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div><!-- end row -->
</section><!-- end section -->