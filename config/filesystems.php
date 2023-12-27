<?php
return [

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'downloadable_videos' => [
            'driver' => 'local',
            'root' => storage_path('app/downloadable_videos'), // Adjust the path as needed
            // Other configurations specific to downloadable videos
        ],

        'streamable_videos' => [
            'driver' => 'local',
            'root' => storage_path('app/streamable_videos'), // Adjust the path as needed
            // Other configurations specific to streamable videos
        ],
    ],

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],
];