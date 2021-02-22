# Bing Img Downloader

[![Build](https://github.com/Dracovish/bing-img-downloader/actions/workflows/build.yml/badge.svg)](https://github.com/Dracovish/bing-img-downloader/actions/workflows/build.yml)

## Feature

Download image from `https://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1` daily.

## Used Components

- Hyperf Crontab
- Hyperf Filesystem
- Hyperf Database Migration
- Hyperf Phar

## How to use bing-img-downloader.phar

- PHP >= 7.4
- Swoole PHP extension >= 4.5，and Disabled `Short Name`
- OpenSSL PHP extension
- JSON PHP extension
- PDO PHP extension （If you need to use MySQL Client）

```shell
wget https://github.com/Dracovish/bing-img-downloader/releases/download/v0.1.3/bing-img-downloader.phar

php bing-img-downloader.phar img:download -D $PWD/bing
```
