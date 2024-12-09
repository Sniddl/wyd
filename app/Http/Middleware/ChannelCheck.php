<?php

namespace App\Http\Middleware;

use App\Models\Channel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class ChannelCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->route('channel')) {
            if (! $request->route('guild')) {
                $channel = $request->route('channel')->loadMissing('threads');
                // $channel = Channel::with('threads')->firstWhere('identifier', $request->route('channel'));

                if ($channel->type == 'category') {
                    abort_if($channel->threads->count() <= 0, 404);

                    return redirect()->route('guild', [
                        'guild' => $request->route('guild'),
                        'channel' => $request->route('channel'),
                        'thread' => $channel->threads->first(),
                    ]);
                }
            }
        }
        return $next($request);
    }
}
