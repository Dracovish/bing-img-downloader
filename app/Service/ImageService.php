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

use App\Service\Dao\ImageDao;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Utils\Arr;
use Hyperf\Utils\Codec\Json;
use HyperfX\Utils\Service;
use League\Flysystem\Filesystem;

class ImageService extends Service
{
    /**
     * @Inject
     * @var Client
     */
    protected $factory;

    /**
     * @Inject
     * @var ImageDao
     */
    protected $dao;

    /**
     * @Inject
     * @var Filesystem
     */
    protected $file;

    public function download()
    {
        $client = $this->factory->get();

        $response = $client->get('/HPImageArchive.aspx?format=js&idx=0&n=1');

        if ($response->getStatusCode() == 200) {
            $ret = Json::decode((string) $response->getBody());
            foreach ($ret['images'] ?? [] as $image) {
                $url = $image['url'];
                $copyright = $image['copyright'];
                $title = $image['title'];
                $cdn = $this->put($url);
            }
            // dump($ret);
        }
    }

    public function put(string $url): string
    {
        $cdn = $this->getCdn($url);

        $client = $this->factory->get();

        $client->get($url, [
            'sink' => $sink = BASE_PATH . '/runtime/' . $cdn,
        ]);

        if (! $this->file->has($cdn)) {
            $this->file->writeStream($cdn, fopen($sink, 'r+'));
        }

        return $cdn;
    }

    public function getCdn(string $url)
    {
        // /th?id=OHR.Porto_ZH-CN9117852684_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=hp
        $data = parse_url($url);
        $idStr = explode('&', $data['query'])[0];
        $extArr = explode('.', $idStr);
        $ext = Arr::last($extArr);

        return md5($idStr) . '.' . $ext;
    }
}
