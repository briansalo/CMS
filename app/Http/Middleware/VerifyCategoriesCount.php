<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            // make sure g declare nimo ang category sa taas aron basahon
        if(Category::all()->count() == 0){
            session()->flash('error','Create a category first');
            return redirect('/posts');
        }
             return $next($request);
        
       
    }
}
