<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $template;
    protected $mailInfo;
    
    /***
     * SendEmail constructor.
     *
     * @param array  $mailInfo
     * @param string $template
     * @return void
     */
    public function __construct(array $mailInfo, string $template = 'emails.blank')
    {
        $this->mailInfo = $mailInfo;
        $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send($this->template, array('content' => $this->mailInfo['content']), function ($message) {
            $message->to($this->mailInfo['recipient'], $this->mailInfo['recipient_name'] ?? $this->mailInfo['recipient'])
                    ->subject($this->mailInfo['subject']);
            if (isset($this->mailInfo['from'])) {
                $message->from($this->mailInfo['from'], $this->mailInfo['from_name'] ?? $this->mailInfo['from']);
            }
            if (isset($this->mailInfo['cc'])) {
                $message->cc($this->mailInfo['cc']);
            }
            if (isset($this->mailInfo['bcc'])) {
                $message->bcc($this->mailInfo['bcc']);
            }
            if (isset($this->mailInfo['attach'])) {
                $message->attach($this->mailInfo['attach']);
            }
        });
    }
}
