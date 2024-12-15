<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DAO\CiudadDAOInterface;
use App\DAO\CiudadDAO;
// Repite para los otros DAOs

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CiudadDAOInterface::class, CiudadDAO::class);
        // Repite para los otros DAOs
    }

    public function boot()
    {
        //
    }
}
