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
namespace App\Command;

use App\Service\ImageService;
use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Input\InputOption;

/**
 * @Command
 */
class DownloadCommand extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('img:download');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Download image from bing.');
        $this->addOption('save', 'S', InputOption::VALUE_NONE, '是否保存数据');
    }

    public function handle()
    {
        $syncMysql = $this->input->getOption('save');

        di()->get(ImageService::class)->download($syncMysql);
    }
}
