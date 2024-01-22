<?php

namespace LearnerPlugin\Subscriber;

use LearnerPlugin\Service\CustomerWritingData;
use Shopware\Core\Checkout\Customer\Event\CustomerRegisterEvent;
use Shopware\Core\Checkout\Order\OrderEvents;
use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityWrittenEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CustomerSubscriber implements EventSubscriberInterface
{
    protected  CustomerWritingData $customerWritingData;

    public function __construct(CustomerWritingData $customerWritingData)
    {
        $this->customerWritingData = $customerWritingData;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents():array
    {
        // TODO: Implement getSubscribedEvents() method.
        return [
            //CustomerRegisterEvent::class=> "onCustomerRegister",
           // OrderEvents::ORDER_WRITTEN_EVENT => "onOrderWritten"
        ];
    }

    public function onCustomerRegister(CustomerRegisterEvent $event):void
    {
        $this->customerWritingData->signup($event->getContext() , $event);
    }

    public function onOrderWritten(EntityWrittenEvent $event):void
    {
        $orderId = $event->getPayloads()[0]["id"];
        $this->customerWritingData->completeOrder($orderId , $event->getContext());
    }
}