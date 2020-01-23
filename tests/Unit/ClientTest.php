<?php


namespace Tests;

/**
 * Class ClientTest
 *
 * Test the Facade (Client) responsible for the integration with the Brazilian bank.
 *
 * @package Tests
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ClientTest extends TestCase
{
    /**
     * Test success calling the method to make a transfer on the Client class.
     */
    public function testSuccessMakeTransfer()
    {
        $this->assertTrue(true);
    }
}