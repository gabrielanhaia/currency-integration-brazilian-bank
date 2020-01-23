<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Requester;

use CurrencyFair\IntegrationBrazillianBank\Integration\TransferEntity;
use Exception;

/**
 * Class MakeTransaction responsible for make transaction at the Brazilian bank.
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Requester
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class MakeTransaction extends AbstractRequester
{
    /**
     * Method responsible for making a transaction.
     *
     * @param array $transferData Data to be sent to the API.
     * @return string
     * @throws Exception
     */
    public function makeTransaction(array $transferData): string
    {
        if (empty($this->baseUrlApi)) {
            throw new \Exception('Base url api must be on the .ENV (API_BRAZILIAN_BANK_BASE_URL)');
        }

        $urlApi = "{$this->baseUrlApi}/brazilian-bank/make-transfer";

        $response = $this->guzzleClient->post($urlApi, [
            'form_params' => $transferData
        ]);

        // TODO: Create enum for the HTTP status codes.
        if ($response->getStatusCode() !== 202) {
            throw new \Exception('Error making transaction (Brazilian bank).');
        }

        return $response->getBody()
            ->getContents();
    }
}