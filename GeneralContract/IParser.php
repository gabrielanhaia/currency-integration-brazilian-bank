<?php


namespace CurrencyFair\IntegrationBrazillianBank\GeneralContract;

/**
 * Interface IParser
 * @package CurrencyFair\IntegrationBrazillianBank\GeneralContract
 *
 * Default contract for all parsers.
 */
interface IParser
{
    /**
     * Parse raw data.
     *
     * @param mixed $rawData
     * @return mixed
     */
    public function parse($rawData);
}