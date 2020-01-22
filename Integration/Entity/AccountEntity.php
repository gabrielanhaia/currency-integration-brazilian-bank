<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Entity;

/**
 * Class AccountEntity
 * @package CurrencyFair\IntegrationBrazillianBank\Integration
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class AccountEntity
{
    /** @var string $name Name of the owner/company. */
    protected $name;

    /** @var string $accountNumber Account number. */
    protected $accountNumber;

    /** @var string $agencyNumber Number of the agency (very common in Brazil) */
    protected $agencyNumber;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AccountEntity
     */
    public function setName(string $name): AccountEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     * @return AccountEntity
     */
    public function setAccountNumber(string $accountNumber): AccountEntity
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getAgencyNumber(): string
    {
        return $this->agencyNumber;
    }

    /**
     * @param string $agencyNumber
     * @return AccountEntity
     */
    public function setAgencyNumber(string $agencyNumber): AccountEntity
    {
        $this->agencyNumber = $agencyNumber;
        return $this;
    }
}