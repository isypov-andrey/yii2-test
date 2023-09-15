<?php

namespace app\models\EventFactory;

use app\models\History;

class HistoryObjectFactoryCreator
{
    /**
     * @var TaskFactory
     */
    private $taskFactory;
    /**
     * @var SmsFactory
     */
    private $smsFactory;
    /**
     * @var FaxFactory
     */
    private $faxFactory;
    /**
     * @var CustomerFactory
     */
    private $customerFactory;
    /**
     * @var CallFactory
     */
    private $callFactory;
    /**
     * @var FallbackFactory
     */
    private $fallbackFactory;

    public function __construct(
        TaskFactory $taskFactory,
        SmsFactory $smsFactory,
        FaxFactory $faxFactory,
        CustomerFactory $customerFactory,
        CallFactory $callFactory,
        FallbackFactory  $fallbackFactory
    ) {
        $this->taskFactory = $taskFactory;
        $this->smsFactory = $smsFactory;
        $this->faxFactory = $faxFactory;
        $this->customerFactory = $customerFactory;
        $this->callFactory = $callFactory;
        $this->fallbackFactory = $fallbackFactory;
    }

    public function getFactory(string $objectType): HistoryObjectFactoryInterface
    {
        switch ($objectType) {
            case History::OBJECT_TASK:
                return $this->taskFactory;
            case History::OBJECT_SMS:
                return $this->smsFactory;
            case History::OBJECT_FAX:
                return $this->faxFactory;
            case History::OBJECT_CUSTOMER:
            case History::OBJECT_LEAD:
            case History::OBJECT_DEAL:
                return $this->customerFactory;
            case History::OBJECT_CALL:
                return $this->callFactory;
            default:
                return $this->fallbackFactory;
        }
        //throw new \InvalidArgumentException("Unknown object type: $objectType");
    }
}
