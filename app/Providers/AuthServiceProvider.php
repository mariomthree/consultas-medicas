<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::before(function ($user, $ability) {
        //     if ($user->hasRole('administrador'))
        //         return true;
        // });

        Gate::define('medicos-criar', function ($user) {
            if ($user->isAbleTo('medicos-criar'))
                return true;
            return false;
        });

        Gate::define('medicos-listar', function ($user) {
            if ($user->isAbleTo('medicos-listar'))
                return true;
            return false;
        });

        Gate::define('medicos-remover', function ($user) {
            if ($user->isAbleTo('medicos-remover'))
                return true;
            return false;
        });

        Gate::define('medicos-editar', function ($user) {
            if ($user->isAbleTo('medicos-editar'))
                return true;
            return false;
        });

        Gate::define('pacientes-criar', function ($user) {
            if ($user->isAbleTo('pacientes-criar'))
                return true;
            return false;
        });

        Gate::define('pacientes-listar', function ($user) {
            if ($user->isAbleTo('pacientes-listar'))
                return true;
            return false;
        });

        Gate::define('pacientes-remover', function ($user) {
            if ($user->isAbleTo('pacientes-remover'))
                return true;
            return false;
        });

        Gate::define('pacientes-editar', function ($user) {
            if ($user->isAbleTo('pacientes-editar'))
                return true;
            return false;
        });

        Gate::define('consultas-criar', function ($user) {
            if ($user->isAbleTo('consultas-criar'))
                return true;
            return false;
        });

        Gate::define('consultas-listar', function ($user) {
            if ($user->isAbleTo('consultas-listar'))
                return true;
            return false;
        });

        Gate::define('consultas-remover', function ($user) {
            if ($user->isAbleTo('consultas-remover'))
                return true;
            return false;
        });

        Gate::define('consultas-editar', function ($user) {
            if ($user->isAbleTo('consultas-editar'))
                return true;
            return false;
        });

        Gate::define('usuarios-criar', function ($user) {
            if ($user->isAbleTo('usuarios-criar'))
                return true;
            return false;
        });

        Gate::define('usuarios-listar', function ($user) {
            if ($user->isAbleTo('usuarios-listar'))
                return true;
            return false;
        });

        Gate::define('usuarios-remover', function ($user) {
            if ($user->isAbleTo('usuarios-remover'))
                return true;
            return false;
        });

        Gate::define('usuarios-editar', function ($user) {
            if ($user->isAbleTo('usuarios-editar'))
                return true;
            return false;
        });


        Gate::define('perfil-editar', function ($user) {
            if ($user->isAbleTo('perfil-editar'))
                return true;
            return false;
        });
    }
}
