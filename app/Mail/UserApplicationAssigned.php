<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserApplicationAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $course;
    public $application;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $course, $application)
    {
        $this->user = $user;
        $this->course = $course;
        $this->application = json_decode($application);
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Course Application')
                    ->view('emails.user_application_assigned')
                    ->with([
                        'userName' => $this->user->name,
                        'courseName' => $this->course->title,
                        'applicationName' => $this->application->name ?? 'N/A',
                        'applicationEmail' => $this->application->email ?? 'N/A',
                        'applicationMessage' => $this->application->message ?? 'N/A',
                    ]);
    }
}
