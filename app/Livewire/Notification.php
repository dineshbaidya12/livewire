<?php

namespace App\Livewire;

use App\Models\Notification as NotificationModel;
use Livewire\Component;
use Livewire\Attributes\On;

class Notification extends Component
{
    public $notificationcount = 0;
    public $notifications;

    public function mount(){
        $this->notifications = NotificationModel::get();
        $this->notificationcount = count($this->notifications);
    }

    #[On('updateNotification')]
    public function updateNotification(){
        $this->notifications = NotificationModel::orderBy('date', 'DESC')->get();
        $this->notificationcount = count($this->notifications);
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
