<?php declare(strict_types=1);

namespace LearnerPlugin\Extension\Content\Customer;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class CustomerExtensionEntity extends Entity
{
    use EntityIdTrait;

    protected ?string $customerId;

    protected ?int $customerLoyaltyPoint;

    public function getCustomerId():?string
    {
        return $this->customerId;
    }

    public function setCustomerId(?string $customerId):void
    {
        $this->customerId = $customerId;
    }

    public function getCustomerLoyaltyPoint():?int
    {
        return $this->customerLoyaltyPoint;
    }

    public function setCustomerLoyaltyPoint(?int $customerLoyaltyPoint):void
    {
        $this->customerLoyaltyPoint = $customerLoyaltyPoint;
    }

}