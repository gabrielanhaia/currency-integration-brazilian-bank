<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration;

/**
 * Class TransferEntity
 * @package CurrencyFair\IntegrationBrazillianBank\Integration
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransferEntity
{
    /** @var AccountEntity $accountOrigin Account origin of the money. */
    protected $accountOrigin;

    /** @var AccountEntity $accountDestination Account where the money will be transferred. */
    protected $accountDestination;

    /** @var float $total Total of money to be transferred. */
    protected $total;

    /** @var int $confirmationNumber Number of the confirmation after the money be accepted. */
    protected $confirmationNumber;

    /**
     * @return AccountEntity
     */
    public function getAccountOrigin(): AccountEntity
    {
        return $this->accountOrigin;
    }

    /**
     * @param AccountEntity $accountOrigin
     * @return TransferEntity
     */
    public function setAccountOrigin(AccountEntity $accountOrigin): TransferEntity
    {
        $this->accountOrigin = $accountOrigin;
        return $this;
    }

    /**
     * @return AccountEntity
     */
    public function getAccountDestination(): AccountEntity
    {
        return $this->accountDestination;
    }

    /**
     * @param AccountEntity $accountDestination
     * @return TransferEntity
     */
    public function setAccountDestination(AccountEntity $accountDestination): TransferEntity
    {
        $this->accountDestination = $accountDestination;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     * @return TransferEntity
     */
    public function setTotal(float $total): TransferEntity
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return int
     */
    public function getConfirmationNumber(): int
    {
        return $this->confirmationNumber;
    }

    /**
     * @param int $confirmationNumber
     * @return TransferEntity
     */
    public function setConfirmationNumber(int $confirmationNumber): TransferEntity
    {
        $this->confirmationNumber = $confirmationNumber;
        return $this;
    }
}