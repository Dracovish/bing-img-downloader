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
namespace App\Crontab;

use App\Service\ImageService;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Crontab\Annotation\Crontab;
use Hyperf\Di\Annotation\Inject;
use Han\Utils\Service;

/**
 * @Crontab(name="DownloadCrontab", rule="0 1 * * *", callback="execute", memo="Download image from Bing daily.")
 */
class DownloadCrontab extends Service
{
    /**
     * @Inject
     * @var ImageService
     */
    protected $service;

    /**
     * @Inject
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function execute()
    {
        $this->service->download(true, true);

        $this->logger->info('当日必应壁纸下载完毕');
    }
}
