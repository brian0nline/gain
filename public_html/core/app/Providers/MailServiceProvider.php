<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config as ConfigAlias;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $config = array(
            'driver' => set('mail_mailer'),
            'host' => set('mail_host'),
            'port' => set('mail_port'),
            'username' => set('mail_username'),
            'password' => set('mail_password'),
            'encryption' => set('mail_encrypt'),
            'from' => array('address' => set('mail_email'), 'name' => set('mail_name')),
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false,
        );
        ConfigAlias::set('mail', $config);
    }
}
