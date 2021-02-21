<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Service;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\HandlerStack;
use Hyperf\Guzzle\CoroutineHandler;
use HyperfX\Utils\Service;

class Client extends Service
{
    protected $handler;

    public function get(string $uri = 'https://cn.bing.com')
    {
        return new GuzzleHttpClient([
            'handler' => $this->stack(),
            'base_uri' => $uri,
        ]);
    }

    public function stack(): HandlerStack
    {
        if ($this->handler instanceof HandlerStack) {
            return $this->handler;
        }
        return $this->handler = HandlerStack::create(new CoroutineHandler());
    }
}
