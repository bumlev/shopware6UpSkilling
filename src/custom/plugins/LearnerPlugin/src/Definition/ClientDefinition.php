<?php

namespace LearnerPlugin\Definition;

use LearnerPlugin\Entity\ClientEntity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IntField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class ClientDefinition extends EntityDefinition
{

    public const ENTITY_NAME = "client";

    public function getEntityName(): string
    {
        // TODO: Implement getEntityName() method.
        return self::ENTITY_NAME;
    }

    public function getEntityClass():string 
    {
        return ClientEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        // TODO: Implement defineFields() method.
        return new FieldCollection([

            (new IdField("id" , "id"))->addFlags(new Required() , new PrimaryKey()),
            (new StringField("first_name" , "firstName")),
            (new StringField("last_name" , "lastName")),
            (new BoolField("address" , "address")),
            (new IntField("phone" , "phone")),
        ]);
    }
}