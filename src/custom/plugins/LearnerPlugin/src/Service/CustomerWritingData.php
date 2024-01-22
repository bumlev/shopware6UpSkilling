<?php

namespace LearnerPlugin\Service;

use Shopware\Core\Checkout\Customer\Event\CustomerRegisterEvent;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;

class CustomerWritingData
{
    private EntityRepository $customerRepository;
    private EntityRepository $orderRepository;
    private EntityRepository $customerExtensionRepository;

    public function __construct(
        EntityRepository $customerRepository,
        EntityRepository $orderRepository,
        EntityRepository $customerExtensionRepository
    )
    {
        $this->customerRepository = $customerRepository;
        $this->orderRepository = $orderRepository;
        $this->customerExtensionRepository = $customerExtensionRepository;
    }

    public function signup(Context $context  , CustomerRegisterEvent $event):void
    {
        $this->customerRepository->upsert([[
            'id' => $event->getCustomerId(),
            'customerExtension' => [
                'customerLoyaltyPoint' => 50
            ]
        ]] , $context);
    }

    public function completeOrder(string $orderId , Context $context):void
    {
        $order = $this->orderRepository->search(new Criteria([$orderId])
        , $context)->first();

        $customerId= $order->get("orderCustomer")->getCustomerId();
        $this->getPointsCustomer($customerId , $context);
    }



    private function getPointsCustomer(string $customerId , Context $context):void 
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter("customerId" , $customerId));

        $customerExtension = $this->customerExtensionRepository->search($criteria,
                                                                $context)->first();
                                                                
        $this->customerExtensionRepository->update([[
            "id" => $customerExtension->getId(),
            "customerLoyaltyPoint" => $customerExtension->getCustomerLoyaltyPoint() + 100
        ]], $context);
    }
}