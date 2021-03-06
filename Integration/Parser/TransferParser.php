<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Parser;


use CurrencyFair\IntegrationBrazillianBank\Integration\Contract\IParser;
use CurrencyFair\IntegrationBrazillianBank\Integration\Entity\ReceiptTransferEntity;
use CurrencyFair\IntegrationBrazillianBank\Integration\Exception\InvalidDataFormatterException;

/**
 * Class TransferParser
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransferParser implements IParser
{
    /**
     * Parse raw data.
     *
     * @param mixed $rawData
     * @return mixed
     * @throws \Exception
     */
    public function parse($rawData)
    {
        $arrayRawData = json_decode($rawData, true);

        // I put these rules for different unit tests (scenarios).
        if (empty($arrayRawData['numero_confirmacao'])) {
            throw new InvalidDataFormatterException('Confirmation number invalid.');
        }

        $confirmationNumber = 'CN:' . $arrayRawData['numero_confirmacao'];
        // ----------------

        $receiptTransfer = new ReceiptTransferEntity;
        $receiptTransfer->setConfirmationNumber($confirmationNumber)
            ->setDateConfirmation(\DateTime::createFromFormat('Y-m-d', $arrayRawData['data_processamento']));

        return $receiptTransfer;
    }
}