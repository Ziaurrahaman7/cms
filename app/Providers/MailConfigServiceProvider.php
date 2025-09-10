<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class MailConfigServiceProvider extends ServiceProvider
{
    public function boot()
    {
        try {
            // Get mail settings from database
            $mailSettings = [
                'mailer' => SiteSetting::get('mail_mailer', 'log'),
                'host' => SiteSetting::get('mail_host', '127.0.0.1'),
                'port' => SiteSetting::get('mail_port', '2525'),
                'username' => SiteSetting::get('mail_username'),
                'password' => SiteSetting::get('mail_password'),
                'encryption' => SiteSetting::get('mail_encryption', 'tls'),
                'from_address' => SiteSetting::get('mail_from_address', 'hello@example.com'),
                'from_name' => SiteSetting::get('mail_from_name', config('app.name')),
            ];

            // Update mail configuration
            Config::set('mail.default', $mailSettings['mailer']);
            Config::set('mail.mailers.smtp.host', $mailSettings['host']);
            Config::set('mail.mailers.smtp.port', $mailSettings['port']);
            Config::set('mail.mailers.smtp.username', $mailSettings['username']);
            Config::set('mail.mailers.smtp.password', $mailSettings['password']);
            Config::set('mail.mailers.smtp.encryption', $mailSettings['encryption']);
            Config::set('mail.from.address', $mailSettings['from_address']);
            Config::set('mail.from.name', $mailSettings['from_name']);
            
        } catch (\Exception $e) {
            // If database is not available or settings table doesn't exist, use default config
        }
    }
}