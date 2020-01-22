<?php

namespace CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser;

use CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Formatter\FormatterTypeEnum;
use CurrencyFair\IntegrationBrazillianBank\Integration\Formatter\TransactionFormatter;
use CurrencyFair\IntegrationBrazillianBank\Integration\Parser\TransactionParser;

/**
 * Class FormatterFactory
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Formatter
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class FormatterFactory
{
    public function make(FormatterTypeEnum $parserTypeEnum)
    {
        switch ($parserTypeEnum->value()) {
            case FormatterTypeEnum::FORMATTER_TRANSACTION:
                return new TransactionFormatter;
                break;
            default:
                throw new \Exception('Type of formatter not implemented.');
        }
    }
}