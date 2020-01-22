<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration;

use CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Formatter\FormatterTypeEnum;
use CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser\FormatterSimpleFactory;
use CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser\ParserSimpleFactory;
use CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Parser\ParserTypeEnum;
use CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Requester\RequesterSimpleFactory;
use CurrencyFair\IntegrationBrazillianBank\Integration\Factory\Requester\RequesterTypeEnum;

/**
 * Class Client (This class is following the Facade pattern).
 * @package CurrencyFair\IntegrationBrazillianBank\Integration
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class Client
{
    /** @var FormatterSimpleFactory $formatterFactory Factory for formatters. */
    private $formatterFactory;

    /** @var ParserSimpleFactory $parserFactory Factory for parsers. */
    private $parserFactory;

    /** @var RequesterSimpleFactory $requesterFactory Factory for requesters. */
    private $requesterFactory;

    /**
     * Client constructor.
     * @param FormatterSimpleFactory|null $formatterFactory
     * @param ParserSimpleFactory|null $parserFactory
     * @param RequesterSimpleFactory|null $requesterFactory
     */
    public function __construct(
        FormatterSimpleFactory $formatterFactory = null,
        ParserSimpleFactory $parserFactory = null,
        RequesterSimpleFactory $requesterFactory = null
    )
    {
        $this->formatterFactory = $formatterFactory ?? (new FormatterSimpleFactory);
        $this->parserFactory = $parserFactory ?? (new ParserSimpleFactory);
        $this->requesterFactory = $requesterFactory ?? (new RequesterSimpleFactory);
    }

    /**
     * Method responsible for make a transaction.
     *
     * @param TransferEntity $transferEntity Entity with the transfer data.
     * @return mixed
     * @throws \Exception
     */
    public function makeTransaction(TransferEntity $transferEntity)
    {
        $formatter = $this->formatterFactory->make(FormatterTypeEnum::FORMATTER_TRANSACTION());
        $parser = $this->parserFactory->make(ParserTypeEnum::PARSER_TRANSACTION());
        $requester = $this->requesterFactory->make(RequesterTypeEnum::REQUESTER_MAKE_TRANSACTION());

        $formattedData = $formatter->format($transferEntity);
        $rawResponse = $requester->makeTransaction($formattedData);
        $response = $parser->parse($rawResponse);

        return $response;
    }

    /**
     * Another example method.
     * TODO: Implement it in the future.
     */
    public function getTransfers()
    {
        // Method created as an example.
    }

    /**
     * Another example method.
     * TODO: Implement it in the future.
     *
     * @param int $transferIdentifier
     */
    public function getTransfer(int $transferIdentifier)
    {
        // Method created as an example.
    }
}