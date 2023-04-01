<?php


namespace App\Providers;


use Dropbox\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Dropbox\DropboxAdapter;
use Nette\Utils\FileSystem;

class DropboxFilesystemServiceProvider extends ServiceProvider
{
    public function register()
    {
       //
    }

    public function boot()
    {
        Storage::extend('dropbox', function($app, $config) {
            $client = new Client($config['accessToken'], $config['clientIdentifier']);
            return new FileSystem(new DropboxAdapter($client));
        });
    }

}
