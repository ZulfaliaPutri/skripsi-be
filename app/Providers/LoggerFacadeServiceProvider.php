<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Console\Output\ConsoleOutput;

class LoggerFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // melakuakn registrasi terhadap Logger class facade agar
        // dapat ditemui di facade
        App::bind('logger', function () {
            return new ConsoleOutput(ConsoleOutput::VERBOSITY_NORMAL);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
