<?php

use app\widgets\HistoryList\HistoryList;

/**
 * @var \HistoryObjectFactoryCreator $objectFactoryCreator
 */

$this->title = 'Americor Test';
?>

<div class="site-index">
    <?= HistoryList::widget() ?>
</div>
