<?php

namespace App\Notifications;


use App\Models\RoomNum;
use App\Models\RoomAccessory;
use App\Models\AssignRoom;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApprovedNotification extends Notification
{
    use Queueable;

    private $approvedmessage;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($approvedmessage)
    {
        $this->approvedmessage = $approvedmessage;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->approvedmessage['greeting'])
                    ->line($this->approvedmessage['body'])
                    ->action($this->approvedmessage['actiontext'], $this->approvedmessage['actionurl'])
                    // ->line('Your Allocation has been Approved, use the above link to download your Allocation Letter!');
                    ->line($this->approvedmessage['endtext']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
