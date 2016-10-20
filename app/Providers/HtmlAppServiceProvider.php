<?php

namespace App\Providers;

use Collective\Html\HtmlServiceProvider;
use App\Components\HtmlComponent;


class HtmlAppServiceProvider extends HtmlServiceProvider {

	    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder()
    {
        $this->app->singleton('html', function ($app) {
            return new HtmlComponent($app['url'], $app['view']);
        });
    }


}