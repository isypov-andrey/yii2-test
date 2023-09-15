<?php

use app\models\DTO\ChangeDTO;
use app\models\User;
use yii\helpers\Html;

/* @var $user User */
/* @var $body string */
/* @var $footer string */
/* @var $footerDatetime string */
/* @var $bodyDatetime string */
/* @var $iconClass string */
/* @var $changes ChangeDTO[] */
?>
<?php echo Html::tag('i', '', ['class' => "icon icon-circle icon-main white $iconClass"]); ?>

    <div class="bg-success ">
        <p>
            <?php echo $body ?>
        </p>
        <?php if (!empty($changes)): ?>
            <?php foreach ($changes as $change): ?>
                <?php echo
                    "<span class='badge badge-pill badge-warning'>" . ($change->from ?? "<i>not set</i>") . "</span>" .
                    " &#8594; " .
                    "<span class='badge badge-pill badge-success'>" . ($change->to ?? "<i>not set</i>") . "</span>";
                ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

<?php if (isset($user)): ?>
    <div class="bg-info"><?= $user->username; ?></div>
<?php endif; ?>

<?php if (isset($content) && $content): ?>
    <div class="bg-info">
        <?php echo $content ?>
    </div>
<?php endif; ?>

<?php if (isset($footer) || isset($footerDatetime)): ?>
    <div class="bg-warning">
        <?php echo isset($footer) ? $footer : '' ?>
        <?php if (isset($footerDatetime)): ?>
            <span><?= \app\widgets\DateTime\DateTime::widget(['dateTime' => $footerDatetime]) ?></span>
        <?php endif; ?>
    </div>
<?php endif; ?>