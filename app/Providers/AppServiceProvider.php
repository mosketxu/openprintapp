<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\URL;

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
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });
        Builder::macro('orSearch', function ($field, $string) {
            return $string ? $this->orWhere($field, 'like', '%'.$string.'%') : $this;
        });
        Builder::macro('searchYear',function($field,$string){
            return $string ? $this->whereYear($field, 'like', '%'.$string.'%'): $this;
        });
        Builder::macro('searchMes',function($field,$string){
            return $string ? $this->whereMonth($field, 'like', '%'.$string.'%'): $this;
        });
    }
}
