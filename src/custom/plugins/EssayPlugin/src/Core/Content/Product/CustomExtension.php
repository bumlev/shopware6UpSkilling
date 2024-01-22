<?php

namespace EssayPlugin\Core\Content\Product;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class CustomExtension extends EntityExtension
{

    /**
     * @inheritDoc
     */
    public function getDefinitionClass(): string
    {
        // TODO: Implement getDefinitionClass() method.
        return ProductDefinition::class;
    }

    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToOneAssociationField("productExtension" ,
                "id" , "product_id" ,
                ProductExtensionDefinition::class ,true)
        );
    }
}