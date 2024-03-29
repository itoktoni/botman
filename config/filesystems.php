<?php
use App\Helpers\Helper;
$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);
$path   = str_replace('/index.php', '', rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));
$path   = str_replace('/file-manager', '', $path);


if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    $protocol = 'http://';
} else {
    $protocol = 'https://';
}

$baseurl = $protocol . $host . $path . "/";

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

                'local' => [
                        'driver' => 'local',
                        'root' => storage_path('app'),
                ],
                'system' => [
                        'driver' => 'local',
                        'root' => base_path(),
                ],
                'model' => [
                        'driver' => 'local',
                        'root' => app_path(''),
                ],
                'view' => [
                        'driver' => 'local',
                        'root' => resource_path(),
                ],
                'controller' => [
                        'driver' => 'local',
                        'root' => app_path('Http/Controllers/'),
                ],
                'middleware' => [
                        'driver' => 'local',
                        'root' => app_path('Http/Middleware/'),
                ],
                'config' => [
                        'driver' => 'local',
                        'root' => config_path(),
                ],
                'database' => [
                        'driver' => 'local',
                        'root' => database_path(),
                ],
                'public' => [
                        'driver' => 'local',
                        'root' => public_path('files'),
                        'url' => $baseurl.'public/files/',
                        'visibility' => 'public',
                        'driver' => 'local',
                ],
                's3' => [
                        'driver' => 's3',
                        'key' => 'your-key',
                        'secret' => 'your-secret',
                        'region' => 'your-region',
                        'bucket' => 'your-bucket',
                ],
                'ftp' => [
                        'driver' => 'ftp',
                        'host' => '103.53.0.154',
                        'username' => 'administrator',
                        'password' => '4RADrDtd',
                        'port' => 2121,
                        // 'root'     => '',
                        'passive' => true,
                // 'ssl'      => true,
                // 'timeout'  => 30,
                ],
    ],

];
