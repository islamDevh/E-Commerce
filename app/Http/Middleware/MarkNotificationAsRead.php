<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class MarkNotificationAsRead
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $notificationId = $request->query('notification_id');

        if ($notificationId) {
            $user = auth()->user();
            if ($user) {
                $notification = $user->notifications()->find($notificationId);
                if ($notification) {
                    $notification->markAsRead();
                }
            }
        }

        return $next($request);
    }

}
