<?php


namespace CurrencyFair\IntegrationBrazillianBank\Integration\Requester;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class AbstractRequester
 * @package CurrencyFair\IntegrationBrazillianBank\Integration\Requester
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
abstract class AbstractRequester
{
    /** @var GuzzleClient $guzzleClient */
    protected $guzzleClient;

    /**
     * ListArticlesByTag constructor.
     * @param GuzzleClient $guzzleClient
     */
    public function __construct(GuzzleClient $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }
}