<?php

use common\Router;

/**
 * @var \application\models\CvDataFactory $parts
 */

?>

<div class="col-lg-4 col-md-5">
    <form method="post" enctype="multipart/form-data"
          action="/<?= Router::getInstance()->getRoutMarker(); ?>/personal/update/id/<?= $parts->getPersonal()->getId(); ?>">
        <div class="card card-user">
            <?php if ($parts->getPersonal()->getPhoto()) : ?>
                <div class="image">
                    <img src="/public/administration/img/background.jpg" alt="CV"/>
                </div>
            <?php endif; ?>
            <div class="content">
                <?php if ($parts->getPersonal()->getPhoto()) : ?>
                    <div class="author">
                        <img class="avatar border-white" src="<?= $parts->getPersonal()->getPhoto() ?>"
                             alt="<?= $parts->getPersonal()->getName() ?>"/>
                    </div>
                <?php endif; ?>
                <input type="hidden" name="photo" value="<?= $parts->getPersonal()->getPhoto() ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name-data">Name</label>
                            <input id="name-data" class="form-control border-input" type="text"
                                   name="name" value="<?= $parts->getPersonal()->getName(); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="position-data">Requested position</label>
                            <input id="position-data" class="form-control border-input" type="text"
                                   name="position" value="<?= $parts->getPersonal()->getPosition(); ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="photoPart">Upload new photo (Old photo will be deleted)</label>
                            <p class="description text-center"><input id="photoPart" type="file" name="photo"></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="about-data">About me</label>
                            <textarea id="about-data" class="form-control border-input"
                                      name="about"><?= $parts->getPersonal()->getInformation(); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <input type="submit" value="Save" class="btn btn-info btn-fill btn-wd">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-lg-8 col-md-7">
    <div class="card">
        <div class="header">
            <h4 class="title">Phones</h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getPersonal()->getPhones() as $id => $phone) : ?>
                    <li>
                        <div class="row">
                            <form method="post"
                                  action="/<?= Router::getInstance()->getRoutMarker(); ?>/personal/update-phone/phone-id/<?= $phone['id'] ?>">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="phones-data-<?= $id ?>">Phone</label>
                                        <input id="phones-data-<?= $id ?>" class="form-control border-input" type="text"
                                               name="data" value="<?= $phone['data'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phones-description-<?= $id ?>">Type</label>
                                        <input id="phones-description-<?= $id ?>" class="form-control border-input"
                                               type="text"
                                               name="description"
                                               value="<?= $phone['description'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <br>
                                        <input type="submit" value="Save" class="btn btn-info btn-fill bottom">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <br>
                                        <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/personal/delete-phone/phone-id/<?= $phone['id'] ?>"
                                           class="btn btn-danger btn-fill">Delete</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
                <li>
                    <div class="row">
                        <form method="post"
                              action="/<?= Router::getInstance()->getRoutMarker(); ?>/personal/add-phone/person-id/<?= $parts->getPersonal()->getId(); ?>">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input placeholder="New phone" class="form-control border-input" type="text"
                                           name="data" value="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input placeholder="New phone type" class="form-control border-input"
                                           type="text"
                                           name="description"
                                           value="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="submit" value="Add" class="btn btn-success btn-fill bottom">
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="header">
            <h4 class="title">E-mails</h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getPersonal()->getEmails() as $id => $email) : ?>
                    <li>
                        <div class="row">
                            <form method="post"
                                  action="/<?= Router::getInstance()->getRoutMarker(); ?>/personal/update-email/email-id/<?= $email['id'] ?>">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="emails-data-<?= $id ?>">Email</label>
                                        <input id="emails-data-<?= $id ?>" class="form-control border-input"
                                               type="email"
                                               name="data" value="<?= $email['data'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="emails-description-<?= $id ?>">Type</label>
                                        <input id="emails-description-<?= $id ?>" class="form-control border-input"
                                               type="text"
                                               name="description"
                                               value="<?= $email['description'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <br>
                                        <input type="submit" value="Save" class="btn btn-info btn-fill bottom">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <br>
                                        <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/personal/delete-email/email-id/<?= $email['id'] ?>"
                                           class="btn btn-danger btn-fill">Delete</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
                <li>
                    <div class="row">
                        <form method="post"
                              action="/<?= Router::getInstance()->getRoutMarker(); ?>/personal/add-email/person-id/<?= $parts->getPersonal()->getId(); ?>">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input placeholder="New email" class="form-control border-input" type="email"
                                           name="data" value="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input placeholder="New email type" class="form-control border-input"
                                           type="text"
                                           name="description"
                                           value="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="submit" value="Add" class="btn btn-success btn-fill bottom">
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="header">
            <h4 class="title">Addresses</h4>
        </div>
        <div class="content">
            <ul class="list-unstyled team-members">
                <?php foreach ($parts->getPersonal()->getAddresses() as $id => $address) : ?>
                    <li>
                        <div class="row">
                            <form method="post"
                                  action="/<?= Router::getInstance()->getRoutMarker(); ?>/personal/update-address/address-id/<?= $address['id'] ?>">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="addresses-data-<?= $id ?>">Address</label>
                                        <input id="addresses-data-<?= $id ?>" class="form-control border-input"
                                               type="text"
                                               name="data" value="<?= $address['data'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="addresses-description-<?= $id ?>">Type</label>
                                        <input id="addresses-description-<?= $id ?>" class="form-control border-input"
                                               type="text"
                                               name="description"
                                               value="<?= $address['description'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <br>
                                        <input type="submit" value="Save" class="btn btn-info btn-fill bottom">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <br>
                                        <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/personal/delete-address/address-id/<?= $address['id'] ?>"
                                           class="btn btn-danger btn-fill">Delete</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
                <li>
                    <div class="row">
                        <form method="post"
                              action="/<?= Router::getInstance()->getRoutMarker(); ?>/personal/add-address/person-id/<?= $parts->getPersonal()->getId(); ?>">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input placeholder="New address" class="form-control border-input" type="text"
                                           name="data" value="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input placeholder="New address type" class="form-control border-input"
                                           type="text"
                                           name="description"
                                           value="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="submit" value="Add" class="btn btn-success btn-fill bottom">
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
