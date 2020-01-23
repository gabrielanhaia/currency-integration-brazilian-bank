<?php


namespace Tests\Unit\Requester;

use CurrencyFair\IntegrationBrazillianBank\Integration\Requester\MakeTransaction;
use GuzzleHttp\Client;
use Tests\TestCase;

/**
 * Class MakeTransactionTest responsible for the tests on the requester (MakeTransaction).
 * @package Tests\Unit\Requester
 *
 * @author Gabriel Anhaia <gabriel@gmail.com>
 */
class MakeTransactionTest extends TestCase
{
    /**
     * Test error when there is no base url (API) defined.
     * @throws \Exception
     */
    public function testErrorBaseUrlNotDefine()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Base url api must be on the .ENV (API_BRAZILIAN_BANK_BASE_URL)');

        putenv('API_BRAZILIAN_BANK_BASE_URL=');
        $makeTransactionRequester = new MakeTransaction(new Client);
        $makeTransactionRequester->makeTransaction(['DATA_TO_BE_SENT']);
    }

    /**
     * Test request error or server error trying to make a transaction.
     */
    public function testErrorRequestMakingTransaction()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Error making transaction (Brazilian bank).');

        $postData = ['POST_DATA' => 'TEST'];
        $configBaseUrl = 'BASE_URL_TEST';
        putenv("API_BRAZILIAN_BANK_BASE_URL={$configBaseUrl}");

        $expectedEndpoint = "{$configBaseUrl}/brazilian-bank/make-transfer";
        $guzzleHttpClientMock = \Mockery::mock(Client::class);
        $guzzleHttpClientMock->expects('post')
            ->once()
            ->with($expectedEndpoint, [
                'form_params' => $postData
            ])
            ->andReturnSelf();

        $guzzleHttpClientMock->expects('getStatusCode')
            ->once()
            ->withNoArgs()
            ->andReturn(402);

        $makeTransactionRequester = new MakeTransaction($guzzleHttpClientMock);
        $makeTransactionRequester->makeTransaction($postData);
    }

    /**
     * Test success making transactions on the Brazilian bank.
     */
    public function testSuccessMakingTransaction()
    {
        $postData = ['POST_DATA' => 'TEST'];
        $configBaseUrl = 'BASE_URL_TEST';
        putenv("API_BRAZILIAN_BANK_BASE_URL={$configBaseUrl}");

        $expectedEndpoint = "{$configBaseUrl}/brazilian-bank/make-transfer";
        $guzzleHttpClientMock = \Mockery::mock(Client::class);
        $guzzleHttpClientMock->expects('post')
            ->once()
            ->with($expectedEndpoint, [
                'form_params' => $postData
            ])
            ->andReturnSelf();

        $guzzleHttpClientMock->expects('getStatusCode')
            ->once()
            ->withNoArgs()
            ->andReturn(202);

        $guzzleHttpClientMock->expects('getBody')
            ->once()
            ->withNoArgs()
            ->andReturnSelf();

        $expectedResponse = '{"numero_confirmacao": 232331232, "data_processamento": "2019-01-02"}';

        $guzzleHttpClientMock->expects('getContents')
            ->once()
            ->withNoArgs()
            ->andReturn($expectedResponse);

        $makeTransactionRequester = new MakeTransaction($guzzleHttpClientMock);
        $response = $makeTransactionRequester->makeTransaction($postData);

        $this->assertEquals($expectedResponse, $response);
    }
}