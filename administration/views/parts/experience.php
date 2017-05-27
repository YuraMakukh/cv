<?php

use common\Router;

/**
 * @var \application\models\CvDataFactory $parts
 */

?>
<?php foreach ($parts->getExperience() as $id => $item) : ?>
    <div class="row">
        <form method="post"
              action="/<?= Router::getInstance()->getRoutMarker(); ?>/experience/update/id/<?= $item->getId() ?>">
            <div class="col-lg-4 col-md-5">
                <div class="header">
                    <h4 class="title">Experience</h4>
                </div>
                <div class="content">
                    <div class="form-group">
                        <label for="experience-period-<?= $id ?>">Period</label>
                        <input id="experience-period-<?= $id ?>" class="form-control border-input" type="text"
                               name="period" value="<?= $item->getPeriod() ?>">
                    </div>
                    <div class="form-group">
                        <label for="experience-company-<?= $id ?>">Company</label>
                        <input id="experience-company-<?= $id ?>" class="form-control border-input"
                               type="text"
                               name="company" value="<?= $item->getCompany() ?>">
                    </div>
                    <div class="form-group">
                        <label for="experience-position-<?= $id ?>">Position</label>
                        <input id="experience-position-<?= $id ?>" class="form-control border-input"
                               type="text"
                               name="position" value="<?= $item->getPosition() ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-info btn-fill btn-wd">
                        <a class="btn btn-danger btn-fill"
                           href="/<?= Router::getInstance()->getRoutMarker(); ?>/experience/delete/id/<?= $item->getId() ?>">Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="header">
                    <h4 class="title">Experience description</h4>
                </div>
                <div class="content">
                    <div class="form-group">
                        <label for="experience-description-<?= $id ?>">Description</label>
                        <textarea id="experience-description-<?= $id ?>" class="form-control border-input"
                                  name="description"
                                  rows="8"><?= $item->getDescription(); ?></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
<?php endforeach; ?>
<div class="row">
    <form method="post"
          action="/<?= Router::getInstance()->getRoutMarker(); ?>/experience/add/person_id/<?=$parts->getPersonId()?>">
        <div class="col-lg-4 col-md-5">
            <div class="header">
                <h4 class="title">New experience data</h4>
            </div>
            <div class="content">
                <div class="form-group">
                    <label for="experience-period-add">Period</label>
                    <input id="experience-period-add" class="form-control border-input" type="text"
                           name="period" value="">
                </div>
                <div class="form-group">
                    <label for="experience-company-add">Company</label>
                    <input id="experience-company-add" class="form-control border-input"
                           type="text"
                           name="company" value="">
                </div>
                <div class="form-group">
                    <label for="experience-position-add">Position</label>
                    <input id="experience-position-add" class="form-control border-input"
                           type="text"
                           name="position" value="">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-success btn-fill btn-wd">
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="header">
                <h4 class="title">New experience description</h4>
            </div>
            <div class="content">
                <div class="form-group">
                    <label for="experience-description-add">Description</label>
                        <textarea id="experience-description-add" class="form-control border-input" rows="8"
                                  name="description"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>
