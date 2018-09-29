<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\ProjectManagemnet;

class NewTask extends Notification
{
    use Queueable;
    public $template;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->template = $type;
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
        // $projects = ProjectManagement::all();
        // if($this->template == $projects->name){
        //     return (new MailMessage)
        //                     ->subject('New File Upload')
        //                     ->line('New File has been uploaded by your Manager.')
        //                     ->line('Please Upload the File before the deadline.')
        //                     ->action('Get File', url('/user/file/business'))
        //                     ->line('Thank you for using our application!');
        // }

        if($this->template === 'business'){
            return (new MailMessage)
                            ->subject('New File Upload')
                            ->line('New File has been uploaded by your Manager.')
                            ->line('Please Upload the File before the deadline.')
                            ->action('Get File', url('/user/file/business'))
                            ->line('Thank you for using our application!');
        }
        elseif($this->template == 'milestone'){
            return (new MailMessage)
                            ->subject('New File Upload')
                            ->line('New File has been uploaded by your Manager.')
                            ->line('Please Upload the File before the deadline.')
                            ->action('Get File', url('/user/file/milestone'))
                            ->line('Thank you for using our application!');
        }
        elseif($this->template === 'pilot-project'){
            return (new MailMessage)
                            ->subject('New File Upload')
                            ->line('New File has been uploaded by your Manager.')
                            ->line('Please Upload the File before the deadline.')
                            ->action('Get File', url('/user/file/pilotproject'))
                            ->line('Thank you for using our application!');
        }
        elseif($this->template === 'for-admin'){
            return (new MailMessage)
                            ->line('New File has been uploaded by your one of your start-up.')
                            ->line('')
                            ->action('Get File', url('/admin/file/show'))
                            ->line('Thank you for using our application!');
        }
        else{
            return (new MailMessage)
                            ->line('New File has been uploaded by your one of your start-up.')
                            ->line('')
                            ->action('Get File', url('/admin/startups'))
                            ->line('Thank you for using our application!');
        }
    }

    public function toDatabase(){
        return [
            'newTask' => 'New File Uploaded'
        ];
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
            'data' => 'New File has been uploaded'
        ];
    }
}
