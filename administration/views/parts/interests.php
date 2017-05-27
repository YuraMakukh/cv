<?php

use common\Router;

/**
 * @var \application\models\CvDataFactory $parts
 */

?>
<div class="header">
    <h4 class="title">Interests</h4>
</div>
<div class="content">
    <ul class="list-unstyled team-members">
        <?php foreach ($parts->getInterests() as $id => $interest) : ?>
            <li>
                <div class="row">
                    <form method="post"
                          action="/<?= Router::getInstance()->getRoutMarker(); ?>/interests/update/id/<?= $interest->getId() ?>">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="interests-data-<?= $id ?>">Interest</label>
                                <input id="interests-data-<?= $id ?>" class="form-control border-input" type="text"
                                       name="data" value="<?= $interest->getItem(); ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="interests-icon-<?= $id ?>">Icon (from FA library)</label>
                                <input id="interests-icon-<?= $id ?>" name="icon" type="text"
                                       class="form-control border-input"
                                       value="<?= $interest->getIcon(); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="interests-description-<?= $id ?>">Interest description</label>
                                <input id="interests-description-<?= $id ?>" name="description"
                                       type="text"
                                       class="form-control border-input"
                                       value="<?= $interest->getDescription(); ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <br>
                                <input type="submit" value="Save" class="btn btn-info btn-fill">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <br>
                                <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/interests/delete/id/<?= $interest->getId() ?>"
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
                      action="/<?= Router::getInstance()->getRoutMarker(); ?>/interests/add/person_id/<?=$parts->getPersonId()?>">
                    <div class="col-md-2">
                        <div class="form-group">
                            <input placeholder="New interest" class="form-control border-input" type="text"
                                   name="data" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input placeholder="New interest icon (from FA library)" name="icon" type="text"
                                   class="form-control border-input level-input"
                                   value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input placeholder="New interest description" name="description" type="text"
                                   class="form-control border-input"
                                   value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="submit" value="Add" class="btn btn-success btn-fill btn-wd">
                        </div>
                    </div>
                </form>
            </div>
        </li>
    </ul>
</div>