<?php

/**
 * @category   OAuth
 * @package    Tests
 * @author     David Desberg <david@daviddesberg.com>
 * @copyright  Copyright (c) 2012 The authors
 * @license    https://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace OAuth\Unit\Common\Storage;

use OAuth\Common\Storage\Redis;
use Predis\Client as Predis;
use OAuth\OAuth2\Token\StdOAuth2Token;

class RedisTest extends \PHPUnit_Framework_TestCase
{
    protected $storage;

    public function setUp()
    {
        // connect to a redis daemon
        $predis = new Predis(array(
            'host' => $_ENV['redis_host'],
            'port' => $_ENV['redis_port'],
        ));

        // set it
        $this->storage = new Redis($predis, 'test_user_token', 'test_user_state');

        try {
            $predis->connect();
        } catch (\Predis\Connection\ConnectionException $e) {
            $this->markTestSkipped('No redis instance available: ' . $e->getMessage());
        }
    }

    public function tearDown()
    {
        // delete
        $this->storage->clearAllTokens();

        // close connection
        $this->storage->getRedis()->quit();
    }

    /**
     * Check that the token gets properly stored.
     */
    public function testStorage()
    {
        // arrange
        $service_1 = 'Facebook';
        $service_2 = 'Foursquare';

        $token_1 = new StdOAuth2Token('access_1', 'refresh_1', StdOAuth2Token::EOL_NEVER_EXPIRES, array('extra' => 'param'));
        $token_2 = new StdOAuth2Token('access_2', 'refresh_2', StdOAuth2Token::EOL_NEVER_EXPIRES, array('extra' => 'param'));

        // act
        $this->storage->storeAccessToken($service_1, $token_1);
        $this->storage->storeAccessToken($service_2, $token_2);

        // assert
        $extraParams = $this->storage->retrieveAccessToken($service_1)->getExtraParams();
        $this->assertEquals('param', $extraParams['extra']);
        $this->assertEquals($token_1, $this->storage->retrieveAccessToken($service_1));
        $this->assertEquals($token_2, $this->storage->retrieveAccessToken($service_2));
    }

    /**
     * Test hasAccessToken.
     */
    public function testHasAccessToken()
    {
        // arrange
        $service = 'Facebook';
        $this->storage->clearToken($service);

        // act
        // assert
        $this->assertFalse($this->storage->hasAccessToken($service));
    }

    /**
     * Check that the token gets properly deleted.
     */
    public function testStorageClears()
    {
        // arrange
        $service = 'Facebook';
        $token = new StdOAuth2Token('access', 'refresh', StdOAuth2Token::EOL_NEVER_EXPIRES, array('extra' => 'param'));

        // act
        $this->storage->storeAccessToken($service, $token);
        $this->storage->clearToken($service);

        // assert
        $this->setExpectedException('OAuth\Common\Storage\Exception\TokenNotFoundException');
        $this->storage->retrieveAccessToken($service);
    }
}
