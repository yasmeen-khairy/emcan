<?php
namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserApplicationAssigned;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailJob implements ShouldQueue
{
    use Queueable;

    protected $user;
    protected $course;
    protected $application;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $course, $application)
    {
        $this->user = $user;
        $this->course = $course;
        $this->application = $application;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to(env('ADMIN_EMAIL', 'yasmeenkhairy41@gmail.com'))
            ->send(new UserApplicationAssigned($this->user, $this->course, $this->application));
    }
}
