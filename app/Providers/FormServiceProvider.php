<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.bs_text', ['name', 'value' => null, 'lang' => null, 'attributes' => []]);
        Form::component('bsEmail', 'components.form.bs_email', ['name', 'value' => null, 'lang' => null, 'attributes' => []]);
        Form::component('bsTextarea', 'components.form.bs_textarea', ['name', 'value' => null, 'lang' => null, 'attributes' => []]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
