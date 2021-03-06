<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckAuth {

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        return $next($request);
    }

    public static function check() {
        if (!Session::has('user')) {
            $url = route('login');
            header("Location: ".$url);
            exit;
        }
    }
    
    public static function checkTeacher(){
        if (!Session::has('teacher')) {
            $url = route('teacherLogin');
            header("Location: ".$url);
            exit;
        }
    }

}
