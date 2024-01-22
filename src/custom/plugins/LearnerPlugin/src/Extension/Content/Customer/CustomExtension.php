<?php declare(strict_types=1);

namespace LearnerPlugin\Extension\Content\Customer;

use Shopware\Core\Checkout\Customer\CustomerDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class CustomExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToOneAssociationField("customerExtension" , "id" ,
                "customer_id" ,
                CustomerExtensionDefinition::class,true)
        );
    }

    public function getDefinitionClass(): string
    {
        return CustomerDefinition::class;
    }
}