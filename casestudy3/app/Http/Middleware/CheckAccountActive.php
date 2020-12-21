<?php

namespace App\Http\Middleware;

use App\Models\StatusConstant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckAccountActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $accountLogin = Auth::user();
        if($accountLogin->status == StatusConstant::DISABLE){
            Session::flash('login-error','Account Status Disable');
            return redirect()->route('login');
        }
        return $next($request);
    }
}
