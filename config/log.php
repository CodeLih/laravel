<?php
return [
    'default' => env('log_target', 'file'),

    'file' => [
     'class' => App\Logs\LogFile::class
 ],
     'db' => [
         'class' => App\Logs\LogDb::class
     ]
];
