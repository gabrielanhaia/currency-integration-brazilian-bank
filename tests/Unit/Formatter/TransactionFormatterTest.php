<?php


namespace Tests\Unit\Formatter;

use CurrencyFair\IntegrationBrazillianBank\Integration\Entity\AccountEntity;
use CurrencyFair\IntegrationBrazillianBank\Integration\Entity\TransferEntity;
use CurrencyFair\IntegrationBrazillianBank\Integration\Formatter\TransactionFormatter;
use Tests\TestCase;

/**
 * Class TransactionFormatterTest responsible for the tests related to the transaction formatter.
 * @package Tests\Unit\Formatter
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransactionFormatterTest extends TestCase
{
    /**
     * Test success formatting a transaction which will be sent to the API.
     */
    public function testSuccessFormattingATransaction()
    {
        $accountOrigin = new AccountEntity;
        $accountOrigin->setName('MAIN BANK BRAZIL')
            ->setAccountNumber(12312421)
            ->setAgencyNumber(123);

        $accountDestination = new AccountEntity;
        $accountDestination->setName('PEOPLE RECEIVE')
            ->setAccountNumber(12312421)
            ->setAgencyNumber(123);

        $transferEntityToBeFormatted = new TransferEntity;
        $transferEntityToBeFormatted->setAccountOrigin($accountOrigin)
            ->setAccountDestination($accountDestination)
            ->setTotal(1000);

        $expectedResponse = [
            'total_reais' => $transferEntityToBeFormatted->getTotal(),
            'usuario_origem_nome' => $transferEntityToBeFormatted->getAccountOrigin()->getName(),
            'usuario_origem_agencia' => $transferEntityToBeFormatted->getAccountOrigin()->getAgencyNumber(),
            'usuario_origem_conta' => $transferEntityToBeFormatted->getAccountOrigin()->getAccountNumber(),
            'usuario_destino_nome' => $transferEntityToBeFormatted->getAccountDestination()->getName(),
            'usuario_destino_agencia' => $transferEntityToBeFormatted->getAccountDestination()->getAgencyNumber(),
            'usuario_destino_conta' => $transferEntityToBeFormatted->getAccountDestination()->getAccountNumber(),
        ];

        $transferFormatter = new TransactionFormatter;
        $response = $transferFormatter->format($transferEntityToBeFormatted);

        $this->assertEquals($expectedResponse, $response);
    }
}