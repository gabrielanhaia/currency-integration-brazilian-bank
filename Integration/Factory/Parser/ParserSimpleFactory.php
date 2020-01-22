<?php

namespace CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser;

use CurrencyFair\IntegrationBrazillianBank\Integration\Parser\TransactionParser;

/**
 * Class ParserFactory
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ParserSimpleFactory
{
    public function make(ParserTypeEnum $parserTypeEnum)
    {
        switch ($parserTypeEnum->value()) {
            case ParserTypeEnum::PARSER_TRANSACTION:
                return new TransactionParser;
                break;
            default:
                throw new \Exception('Type of parser not implemented.');
        }
    }
}