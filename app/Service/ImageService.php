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

use Hyperf\Di\Annotation\Inject;
use Hyperf\Utils\Codec\Json;
use HyperfX\Utils\Service;

class ImageService extends Service
{
    /**
     * @Inject
     * @var Client
     */
    protected $factory;

    public function download()
    {
        $client = $this->factory->get('https://cn.bing.com');

        $response = $client->get('/HPImageArchive.aspx?format=js&idx=0&n=1');

        if ($response->getStatusCode() == 200) {
            $ret = Json::decode((string) $response->getBody());
            dump($ret);
        }
    }
}
