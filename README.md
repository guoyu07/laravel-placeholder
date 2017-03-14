# Laravel Placeholder [![Build Status](https://api.travis-ci.org/sqrtqiezi/laravel-placeholder.svg?branch=master)](https://travis-ci.org/sqrtqiezi/laravel-placeholder)

利用 unsplash.it 和 placeimg.com 的接口生成高质量的占位图。

## 示例代码

```php
app('placeholder')->url(640, 360)
//outputs:https://unsplash.it/640/360?random

app('placeholder')->tag(640, 360)
// outputs:<img src="https://unsplash.it/640/360?random" />

app('placeholder')->tag(640, 360, $tagClass = 'img-responsive')
//outputs:<img src="https://unsplash.it/640/360?random" class="img-responsive" />         
```

可以通过修改配置文件 `config/placeholder.php` :
```php
//图片服务类别，目前支持：unplash 和 placeimg
'service' => 'placeimg'
```

切换调用的服务接口：
```php
app('placeholder')->tag(640, 360)
// outputs:<img src="https://placeimg.com/640/360/any" />

app('placeholder')->tag(640, 360, $tagClass = 'img-responsive')
//outputs:<img src="https://placeimg.com/640/360/any" class="img-responsive" /> 
```


## 安装与配置

1. 使用 composer 安装包

    ```shell
    $ composer require "sqrtqiezi/laravel-placeholder:~1.0"
    ```

2. 添加下面一行到 `config/app.php` 中 `providers` 部分

    ```php
    Sqrtqiezi\LaravelPlaceholder\LaravelPlaceholderProvider::class,
    ```

3. 发布配置文件

    ```php
    $ php artisan vendor:publish --class="Sqrtqiezi\LaravelPlaceholder\LaravelPlaceholderProvider"
    ```
  