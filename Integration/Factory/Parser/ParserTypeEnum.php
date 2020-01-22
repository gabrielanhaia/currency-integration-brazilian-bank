<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Class ParserTypeEnum
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ParserTypeEnum extends AbstractEnumeration
{
    /** @var string PARSER_TRANSACTION Type of parser for transactions response from the API. */
    const PARSER_TRANSACTION = 'PARSER_TRANSACTION';
}