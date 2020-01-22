<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Parser;


use CurrencyFair\IntegrationBrazillianBank\Integration\Contract\IParser;
use CurrencyFair\IntegrationBrazillianBank\Integration\Entity\ReceiptTransferEntity;

/**
 * Class TransactionParser
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransactionParser implements IParser
{
    /**
     * Parse raw data.
     *
     * @param mixed $rawData
     * @return mixed
     */
    public function parse($rawData)
    {
        $receiptTransfer = new ReceiptTransferEntity;
        $receiptTransfer->setConfirmationNumber($rawData['numero_confirmacao'])
            ->setDateConfirmation(\DateTime::createFromFormat('Y-m-d', $rawData['data_processamento']));

        return $receiptTransfer;
    }
}