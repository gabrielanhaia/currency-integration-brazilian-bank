<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Formatter;

use CurrencyFair\IntegrationBrazillianBank\Integration\Contract\IFormattter;
use CurrencyFair\IntegrationBrazillianBank\Integration\Entity\TransferEntity;

/**
 * Class TransferFormatter
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Formatter
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class TransferFormatter implements IFormattter
{
    /**
     * Parse raw data.
     *
     * @param TransferEntity $rawData
     * @return mixed
     */
    public function format($rawData)
    {
        $formattedData = [
            'total_reais' => $rawData->getTotal(),
            'usuario_origem_nome' => $rawData->getAccountOrigin()->getName(),
            'usuario_origem_agencia' => $rawData->getAccountOrigin()->getAgencyNumber(),
            'usuario_origem_conta' => $rawData->getAccountOrigin()->getAccountNumber(),
            'usuario_destino_nome' => $rawData->getAccountDestination()->getName(),
            'usuario_destino_agencia' => $rawData->getAccountDestination()->getAgencyNumber(),
            'usuario_destino_conta' => $rawData->getAccountDestination()->getAccountNumber(),
        ];

        return $formattedData;
    }
}