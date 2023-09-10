<?php

namespace app\models\RenderDataProvider;

use app\models\History;
use app\models\Sms;

class SmsRenderDataProvider implements RendererDataProviderInterface
{
    /** @var Sms */
    private $sms;
    /**
     * @var History
     */
    private $history;

    public function init(History $history): void
    {
        $this->sms = $history->sms;
        $this->history = $history;
    }

    public function getIcons(): array
    {
        return ['icon-sms', 'bg-dark-blue'];
    }

    public function getBodyText(): ?string
    {
        return $this->sms->message;
    }

    public function getFooterText(): ?string
    {
        return $this->sms->direction == Sms::DIRECTION_INCOMING ?
            \Yii::t('app', 'Incoming message from {number}', [
                'number' => $this->sms->phone_from ?? ''
            ]) : \Yii::t('app', 'Sent message to {number}', [
                'number' => $this->sms->phone_to ?? ''
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
