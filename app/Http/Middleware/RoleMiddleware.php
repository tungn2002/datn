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
            if(Auth::user()->id_role==1){
                return redirect()->route('admin1');
            }
            if(Auth::user()->id_role==2){
                return redirect()->route('trangchu');
            }
            if(Auth::user()->id_role==3){
                return redirect()->route('doctor');
            }
            if(Auth::user()->id_role==4){
                return redirect()->route('empl');
            }
            return redirect()->route('trangchu');
       }
        return $next($request);

    } 
}
