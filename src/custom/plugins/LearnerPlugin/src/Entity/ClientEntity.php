<?php

namespace LearnerPlugin\Entity;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ClientEntity extends Entity
{
    use EntityIdTrait;

    protected string $firstName;

    protected string $lastName;

    protected ?string $address;

    protected string $phone;


    public function getFirstName():string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName):void
    {
        $this->firstName = $firstName;
    }

    public function getLastName():string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName):void
    {
        $this->lastName = $lastName;
    }

    public function getAddress():?string
    {
        return $this->address;
    }

    public function setAddress(?string $address):void
    {
        $this->address = $address;
    }

    public function getPhone():string
    {
        return $this->phone;
    }

    public function setPhone(string $phone):void
    {
        $this->phone = $phone;
    }
}