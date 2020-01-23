<?php


namespace Tests\Unit\Parser;

use CurrencyFair\IntegrationBrazillianBank\Integration\Entity\ReceiptTransferEntity;
use CurrencyFair\IntegrationBrazillianBank\Integration\Parser\TransactionParser;
use Tests\TestCase;

/**
 * Class TransactionParserTest with the tests related to the parser of transactions.
 * @package Tests\Unit\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransactionParserTest extends TestCase
{
    /**
     * Test error trying parse the response of transactions and returning an invalid confirmation number.
     *
     * @dataProvider dataProviderTestErrorConfirmationNumberInvalid
     *
     * @param string $dataToBeParsed
     * @throws \Exception
     */
    public function testErrorConfirmationNumberInvalid(string $dataToBeParsed)
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Confirmation number invalid.');

        $parser = new TransactionParser;
        $parser->parse($dataToBeParsed);
    }

    /**
     * Data provider for the test {@see testErrorConfirmationNumberInvalid}
     *
     * @return array
     */
    public function dataProviderTestErrorConfirmationNumberInvalid()
    {
        return [
            [
                '{"numero_confirmacao": "", "data_processamento": "2019-01-02"}'
            ],
            [
                '{"data_processamento": "2019-01-02"}'
            ]
        ];
    }

    /**
     * Method responsible for testing the success parsing a transaction returned from the API.
     */
    public function testSuccessParseTransaction()
    {
        $dataToBeParsed = '{"numero_confirmacao": 1323221, "data_processamento": "2019-01-02"}';
        $expectedResult = new ReceiptTransferEntity;
        $expectedResult->setConfirmationNumber('CN:1323221')
            ->setDateConfirmation(\DateTime::createFromFormat('Y-m-d', '2019-01-02'));

        $parser = new TransactionParser;
        $result = $parser->parse($dataToBeParsed);

        $this->assertEquals($expectedResult, $result);
    }
}