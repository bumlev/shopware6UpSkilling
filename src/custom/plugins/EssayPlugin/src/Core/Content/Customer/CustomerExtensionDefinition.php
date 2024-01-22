<?php declare(strict_types=1);
namespace EssayPlugin\Core\Content\Customer;

use Shopware\Core\Checkout\Customer\CustomerDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IntField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;


class CustomerExtensionDefinition extends EntityDefinition
{
    public const ENTITY_NAME = "customer_extension";

    public function getEntityName():string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass():string
    {
        return CustomerExtensionEntity::class;
    }


    public function defineFields():FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            new FkField('customer_id', 'customerId' , CustomerDefinition::class),
            (new IntField("customer_loyalty_point" , "customerLoyaltyPoint")),
            new OneToOneAssociationField('customer', 'customer_id', 'id', CustomerDefinition::class, false)
        ]);
    }
}