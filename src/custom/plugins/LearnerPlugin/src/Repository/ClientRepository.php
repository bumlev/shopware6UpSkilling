<?php
namespace LearnerPlugin\Repository;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;

class ClientRepository
{
    private EntityRepository $clientRepository;

    public function __construct(EntityRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function createClient(array $data , Context $context):void
    {
        $this->clientRepository->create([$data] , $context);
    }
}