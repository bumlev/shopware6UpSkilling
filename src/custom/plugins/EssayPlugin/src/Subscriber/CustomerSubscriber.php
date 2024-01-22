<?php

namespace EssayPlugin\Subscriber;

use EssayPlugin\Service\CustomerService;
use Shopware\Core\Checkout\Customer\Event\CustomerRegisterEvent;
use Shopware\Core\Checkout\Order\OrderEvents;
use Shopware\Core\Framework\DataAbstractionLayer\Event\EntityWrittenEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CustomerSubscriber implements EventSubscriberInterface
{
    private CustomerService $customerService;

    public function __construct
    (
        CustomerService $customerService
    ){
        $this->customerService = $customerService;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents():array
    {
        // TODO: Implement getSubscribedEvents() method.
        return [
            CustomerRegisterEvent::class=> "onCustomerRegister",
            OrderEvents::ORDER_WRITTEN_EVENT => "onOrderWritten"
        ];
    }

    public function onCustomerRegister(CustomerRegisterEvent $event):void
    {
        $customerId = $event->getCustomerId();
        $context = $event->getContext();
        $this->customerService->CustomerUpsert($customerId , $context);
    }

    public function onOrderWritten(EntityWrittenEvent $event):void
    {
        $orderId = $event->getPayloads()[0]["id"];
        $context = $event->getContext();

        $this->customerService->addPoints($orderId , $context);
    }
}