# Bing Img Downloader

## Feature

Download image from `https://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1` daily.

## Used Components

- Hyperf Crontab
- Hyperf Filesystem
- Hyperf Database Migration
- Hyperf Phar

## How to use

```shell
wget https://github.com/Dracovish/bing-img-downloader/releases/download/v0.1.0/bing-img-downloader.phar

php bing-img-downloader.phar img:download -D $PWD/bing
```
