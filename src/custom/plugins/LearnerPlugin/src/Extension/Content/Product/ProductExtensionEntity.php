<?php

namespace LearnerPlugin\Extension\Content\Product;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ProductExtensionEntity extends Entity
{
    use EntityIdTrait;

    protected ?string $productId;

    protected ?string $impression;

    public function getProductId():?string
    {
        return $this->productId;
    }

    public function setProductId(?string $productId):void
    {
        $this->productId = $productId;
    }

    public function getImpression():?string
    {
        return $this->impression;
    }

    public function setImpression(?string $impression):void
    {
        $this->impression = $impression;
    }

}