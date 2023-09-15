<?php

namespace app\models\RenderDataProvider;

use app\models\Customer;
use app\models\DTO\ChangeDTO;
use app\models\History;
use app\models\User;

class CustomerRenderDataProvider implements RendererDataProviderInterface
{
    /** @var Customer */
    private $customer;
    /**
     * @var History
     */
    private $history;

    public function init(History $history): void
    {
        $this->customer = $history->customer;
        $this->history = $history;
    }

    public function getIcons(): array
    {
        return [];
    }

    public function getBodyText(): ?string
    {
        return $this->history->eventText;
    }

    public function getFooterText(): ?string
    {
        return null;
    }

    public function getComment(): ?string
    {
        return null;
    }

    public function getChanges(): ?array
    {
        switch ($this->history->event) {
            case History::EVENT_CUSTOMER_CHANGE_TYPE:
                $from = Customer::getTypeTextByType($this->history->getDetailOldValue('type'));
                $to = Customer::getTypeTextByType($this->history->getDetailNewValue('type'));
                break;
            case History::EVENT_CUSTOMER_CHANGE_QUALITY:
                $from = Customer::getQualityTextByQuality($this->history->getDetailOldValue('quality'));
                $to = Customer::getQualityTextByQuality($this->history->getDetailNewValue('quality'));
                break;
            default:
                throw new \InvalidArgumentException("Unknown event type {$this->history->event}");
        }
        return [new ChangeDTO($from, $to)];
    }
}
