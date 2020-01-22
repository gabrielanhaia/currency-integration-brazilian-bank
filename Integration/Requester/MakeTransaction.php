<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Requester;

use CurrencyFair\IntegrationBrazillianBank\Integration\TransferEntity;

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
     * @return array
     * @throws \Exception
     */
    public function makeTransaction(array $transferData)
    {
        // TODO: Here it's made a request to an API
        //$this->guzzleClient->request(....)

        return [
            'numero_confirmacao' => rand(23231, 323123232),
            'data_processamento' => (new \DateTime)->format('Y-m-d')
        ];
    }
}