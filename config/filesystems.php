<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | This option specifies the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        // Disk configuration for storing files locally
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'), // Root directory for the local disk
        ],

        // Public disk configuration for publicly accessible files
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'), // Root directory for publicly accessible files
            'url' => env('APP_URL').'/storage', // Public URL for accessing files
            'visibility' => 'public', // Visibility setting for public files
        ],

        // Disk configuration for downloadable videos
        'downloadable_videos' => [
            'driver' => 'local',
            'root' => storage_path('app/downloadable_videos'), // Root directory for downloadable videos
            // Additional configurations specific to downloadable videos can be added here
        ],

        // Disk configuration for streamable videos
        'streamable_videos' => [
            'driver' => 'local',
            'root' => storage_path('app/streamable_videos'), // Root directory for streamable videos
            // Additional configurations specific to streamable videos can be added here
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];