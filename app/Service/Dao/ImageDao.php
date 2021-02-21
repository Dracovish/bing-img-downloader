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
namespace App\Service\Dao;

use App\Model\Image;
use HyperfX\Utils\Service;

class ImageDao extends Service
{
    public function create(string $title, string $url, string $cdn, string $copyright)
    {
        $model = new Image();
        $model->title = $title;
        $model->url = $url;
        $model->cdn = $cdn;
        $model->copyright = $copyright;
        return $model->save();
    }
}
