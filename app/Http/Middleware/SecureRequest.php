<?php

namespace App\Http\Middleware;

use Closure;

class SecureRequest
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
        $input = $request->all();

        array_walk_recursive($input, function(&$input)
        {
            $input = htmlspecialchars(strip_tags($input));
        });

        $request->merge($input);

        foreach ($request->all() as $key => $value) {

            if (is_array($value))
            {
                foreach ($value as $k => $v)
                {
                    if (preg_match("#union|select|group|benchmark|information_schema|column_name|table_name|load_file|concat#i", $v))
                    {
                        return redirect()->back()->with('flash_message_hacking', 'Hacking');
                    }
                }
            } else {
                
                if (preg_match("#union|select|benchmark|information_schema|column_name|table_name|load_file|concat#i", $value))
                {
                    return redirect()->back()->with('flash_message_hacking', 'Hacking');
                }
            }
        }

        return $next($request);
    }
}
