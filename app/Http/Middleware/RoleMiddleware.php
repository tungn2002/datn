<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role=null): Response
    {
        //da dang nhap
       if(!Auth::check()){
             return redirect()->route('login')->with('message2', 'Bạn phải đăng nhập');    
        }
       if( Auth::user()->id_role != $role){
            return redirect()->back();
       }
        return $next($request);

    } 
}
