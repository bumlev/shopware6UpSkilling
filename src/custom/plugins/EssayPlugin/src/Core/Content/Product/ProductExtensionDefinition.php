<?php declare(strict_types=1);

namespace EssayPlugin\Core\Content\Product;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ProductExtensionDefinition extends EntityDefinition
{
    public const ENTITY_NAME = "product_extension";

    public function getEntityName(): string
    {
        // TODO: Implement getEntityName() method.
        return self::ENTITY_NAME;
    }

    public function getEntityClass():string
    {
        return ProductExtensionEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        // TODO: Implement defineFields() method.
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new StringField('product_id', 'productId')),
            (new StringField("impression" , "impression")),
            new OneToOneAssociationField('product', 'product_id', 'id', ProductDefinition::class, false)
        ]);
    }
}