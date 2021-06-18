<?php
return [
    // 默认缓存驱动
    'default' => env('cache.driver', 'file'),

// 缓存连接方式配置
'stores'  => [
'file' => [
// 驱动方式
'type'       => 'File',
// 缓存保存目录
'path'       => app()->getRuntimePath() . 'cache' . DIRECTORY_SEPARATOR,
],
'redis'   =>  [
// 驱动方式
'type'   => 'redis',
// 服务器地址
'host' => env('cache.hostname', '{{$rhost}}'),
'port' => env('cache.port', '{{$rport}}'),
'password'   => env('cache.password', '{{$rpass}}'),
// 缓存保存目录
'path'       => app()->getRuntimePath() . 'cache' . DIRECTORY_SEPARATOR,
// 缓存有效期 0表示永久缓存
'expire' => 600,
'prefix' => env('cache.prefix', '{{$rpk}}')
],
// 更多的缓存连接
],
];