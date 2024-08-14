<?php

declare(strict_types=1);

namespace past projects\online store\classes;
interface hasVATNumber
{
    public function getVATNumber(): string;
}
class Customer
{
    protected string $firstName;
    protected string $lastName;
    protected string $addressStreet;
    protected string $postCode;
    protected string $emailAddress;

    public function __construct(string $firstName, string $lastName, string $addressStreet, string $postCode, string $emailAddress)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->addressStreet = $addressStreet;
        $this->postCode = $postCode;
        $this->emailAddress = $emailAddress;
    }


    public function getFullAddress(): string
    {
        return "
        <h2>Customer Profile:</h2>
        <p>
            $this->firstName, $this->lastName<br />
            $this->addressStreet, $this->postCode
        </p>
        ";
    }
}

class BusinessCustomer extends \Customer implements \hasVATNumber
{
    private string $businessName;
    private string $vatNumber;

    public function __construct(string $firstName, string $lastName, string $addressStreet, string $postCode, string $emailAddress, string $businessName, string $vatNumber)
    {
        parent::__construct($firstName, $lastName, $addressStreet, $postCode, $emailAddress);
        $this->businessName = $businessName;
        $this->vatNumber = $vatNumber;
    }

    public function getVATNumber(): string
    {
        return $this->vatNumber;
    }

    public function getFullAddress(): string
    {
        return "
        <h2>Business Profile:</h2>
        <p>
            $this->firstName, $this->lastName<br />
            $this->businessName<br />
            $this->addressStreet, $this->postCode
        </p>
        ";
    }

}