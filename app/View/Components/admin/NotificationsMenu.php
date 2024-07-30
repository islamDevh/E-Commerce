<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class NotificationsMenu extends Component
{
    public $notifications;
    public $newCount;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($count = 10)
    {
        $user = Auth::user();
        $this->notifications = $user->notifications()->take($count)->get();
        $this->newCount      = $user->unreadNotifications()->count();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.notifications-menu', ['notifications' => $this->notifications]);
    }
}
