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
        $arrayRawData = json_decode($rawData, true);

        $receiptTransfer = new ReceiptTransferEntity;
        $receiptTransfer->setConfirmationNumber($arrayRawData['numero_confirmacao'])
            ->setDateConfirmation(\DateTime::createFromFormat('Y-m-d', $arrayRawData['data_processamento']));

        return $receiptTransfer;
    }
}