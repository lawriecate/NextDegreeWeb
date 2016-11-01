<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       /* if (!\App::environment('local')) {
          \URL::forceSchema('https');
        }*/

        Blade::directive('humanTimestamp', function($expression){
            $dt= strtotime($expression);
             return "<?php echo date(\"c\",$dt) ?>";
            return '<?php $dt = strtotime("'.$expression.'"); $iso = date("c",strtotime($dt)); echo "<time class=\"htr\" datetime=\"{$iso}\" title=\"{$iso}\">{$iso}</time>"; ?>';

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
