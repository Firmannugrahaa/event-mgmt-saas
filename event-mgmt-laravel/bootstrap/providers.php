<?php

use Illuminate\Support\ServiceProvider;
use App\Providers\AppServiceProvider;
use App\Providers\TenantServiceProvider;

return ServiceProvider::defaultProviders()->merge([
    AppServiceProvider::class,
    TenantServiceProvider::class,
])->toArray();
