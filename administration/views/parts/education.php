<?php

use common\Router;

/**
 * @var \application\models\CvDataFactory $parts
 */

?>

<?php foreach ($parts->getEducation() as $id => $item) : ?>
    <div class="row">
        <form method="post"
              action="/<?= Router::getInstance()->getRoutMarker(); ?>/education/update/id/<?= $item->getId() ?>">
            <div class="col-lg-4 col-md-5">
                <div class="header">
                    <h4 class="title">Education</h4>
                </div>
                <div class="content">
                    <div class="form-group">
                        <label for="education-period-<?= $id ?>">Period</label>
                        <input id="education-period-<?= $id ?>" class="form-control border-input" type="text"
                               name="period" value="<?= $item->getPeriod() ?>">
                    </div>
                    <div class="form-group">
                        <label for="education-institution-<?= $id ?>">Institution</label>
                        <input id="education-institution-<?= $id ?>" class="form-control border-input"
                               type="text"
                               name="institution" value="<?= $item->getInstitution() ?>">
                    </div>
                    <div class="form-group">
                        <label for="education-specialty-<?= $id ?>">Specialty</label>
                        <input id="education-specialty-<?= $id ?>" class="form-control border-input"
                               type="text"
                               name="specialty" value="<?= $item->getSpecialty() ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-info btn-fill btn-wd">
                        <a class="btn btn-danger btn-fill"
                           href="/<?= Router::getInstance()->getRoutMarker(); ?>/education/delete/id/<?= $item->getId() ?>">Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="header">
                    <h4 class="title">Education description</h4>
                </div>
                <div class="content">
                    <div class="form-group">
                        <label for="education-description-<?= $id ?>">Description</label>
                        <textarea id="education-description-<?= $id ?>" class="form-control border-input" rows="8"
                                  name="description"><?= $item->getDescription(); ?></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
<?php endforeach; ?>
<div class="row">
    <form method="post"
          action="/<?= Router::getInstance()->getRoutMarker(); ?>/education/add/person_id/<?=$parts->getPersonId()?>">
    <div class="col-lg-4 col-md-5">
        <div class="header">
            <h4 class="title">New education data</h4>
        </div>
        <div class="content">
            <div class="form-group">
                <label for="education-period-add">Period</label>
                <input id="education-period-add" class="form-control border-input" type="text"
                       name="period" value="">
            </div>
            <div class="form-group">
                <label for="education-institution-add">Institution</label>
                <input id="education-institution-add" class="form-control border-input"
                       type="text"
                       name="institution" value="">
            </div>
            <div class="form-group">
                <label for="education-specialty-add">Specialty</label>
                <input id="education-specialty-add" class="form-control border-input"
                       type="text"
                       name="specialty" value="">
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-success btn-fill btn-wd">
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="header">
            <h4 class="title">New education description</h4>
        </div>
        <div class="content">
            <div class="form-group">
                <label for="education-description-add">Description</label>
                        <textarea id="education-description-add" class="form-control border-input" rows="8"
                                  name="description"></textarea>
            </div>
        </div>
    </div>
</div>
