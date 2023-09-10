<?php

namespace app\models\RenderDataProvider;

use app\models\History;
use app\models\Fax;
use app\models\User;
use yii\helpers\Html;

class FaxRenderDataProvider implements RendererDataProviderInterface
{
    /** @var Fax */
    private $fax;
    /**
     * @var History
     */
    private $history;

    public function init(History $history): void
    {
        $this->fax = $history->fax;
        $this->history = $history;
    }

    public function getIcons(): array
    {
        return ['fa-fax', 'bg-green'];
    }

    public function getBodyText(): ?string
    {
        return $this->history->eventText . ' - ' . (isset($this->fax->document) ? Html::a(
            \Yii::t('app', 'view document'),
            $this->fax->document->getViewUrl(),
            [
                'target' => '_blank',
                'data-pjax' => 0
            ]
        ) : '');
    }

    public function getFooterText(): ?string
    {
        return \Yii::t('app', '{type} was sent to {group}', [
            'type' => $this->fax->getTypeText(),
            'group' => isset($this->fax->creditorGroup) ? Html::a($this->fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
        ]);
    }

    public function getChanges(): ?array
    {
        return null;
    }

    public function getComment(): ?string
    {
        return null;
    }
}
