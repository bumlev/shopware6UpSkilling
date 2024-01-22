<?php

namespace EssayPlugin\Service;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;

class OrderService
{
    private EntityRepository $orderRepository;

    public function __construct
    (
        EntityRepository $orderRepository
    ){
        $this->orderRepository = $orderRepository;
    }

    public function customerOrders(string $channelId , Context $context):EntitySearchResult
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter("salesChannelId" , $channelId));
        return $this->orderRepository->search($criteria , $context);
    }
}