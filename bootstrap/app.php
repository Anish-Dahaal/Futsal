<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\SingleAdminMiddleware;
use App\Http\Middleware\ageCheck;
use App\Http\Middleware\AdminMiddleware; // Import the AdminMiddleware


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'age' => ageCheck::class,
            'frontUser' => AuthMiddleware::class,
            'admin' => AdminMiddleware::class, // Add the AdminMiddleware
            'singleAdmins' => SingleAdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();