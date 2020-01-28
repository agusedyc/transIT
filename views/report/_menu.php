<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use app\widgets\ReportMenu;
use yii\helpers\Html;
// use dektrium\user\widgets\UserMenu;

/**
 * @var dektrium\user\models\User $user
 */

$user = Yii::$app->user->identity;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        	Report
        </h3>
    </div>
    <div class="panel-body">
        <?= ReportMenu::widget() ?>
    </div>
</div>