<?php


namespace CurrencyFair\IntegrationBrazillianBank\GeneralContract;

/**
 * Interface IFormattter
 * @package CurrencyFair\IntegrationBrazillianBank\GeneralContract
 *
 * Default contract for all parsers.
 */
interface IFormattter
{
    /**
     * Parse raw data.
     *
     * @param mixed $rawData
     * @return mixed
     */
    public function format($rawData);
}