<?php

namespace App\Providers;

use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Выдаст exception
        Model::preventLazyLoading(!app()->isProduction());
        // Если дополнили в модели список полей но забыли указать в fillable модели
        // то при обновлении или создание выдаст ошибку
        Model::preventSilentlyDiscardingAttributes(!app()->isProduction());

        // Если запрос более 500 милисекунд то будет выполнять функцию
        DB::whenQueryingForLongerThan(500, function (Connection $connection){
            // TODO: 3rd Lesson
        });
    }
}
