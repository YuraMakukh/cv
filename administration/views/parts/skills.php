<?php

use common\Router;

/**
 * @var \application\models\CvDataFactory $parts
 */

?>
<div class="header">
    <h4 class="title">Skills</h4>
</div>
<div class="content">
    <ul class="list-unstyled team-members">
        <?php foreach ($parts->getSkills() as $id => $skill) : ?>
            <li>
                <div class="row">
                    <form method="post"
                          action="/<?= Router::getInstance()->getRoutMarker(); ?>/skills/update/id/<?= $skill['id'] ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="skills-data-<?= $id ?>">Skill</label>
                                <input id="skills-data-<?= $id ?>" class="form-control border-input" type="text"
                                       name="data" value="<?= $skill['data'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="skills-level-<?= $id ?>">Rate from 1 to 100</label>
                                <input id="skills-level-<?= $id ?>" name="level" type="text"
                                       class="form-control border-input level-input"
                                       value="<?= $skill['level'] ?>">
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
                                <a href="/<?= Router::getInstance()->getRoutMarker(); ?>/skills/delete/id/<?= $skill['id'] ?>"
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
                      action="/<?= Router::getInstance()->getRoutMarker(); ?>/skills/add/person_id/<?=$parts->getPersonId()?>">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input placeholder="New skill" class="form-control border-input" type="text"
                                   name="data" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input placeholder="New skill level" name="level" type="text"
                                   class="form-control border-input level-input"
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
    <p class="description">
        <input type="submit" value="Save" class="btn btn-info btn-fill btn-wd">
    </p>
</div>