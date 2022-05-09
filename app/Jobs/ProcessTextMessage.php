<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessTextMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $recipient;
    protected $message;

    public function __construct($message, $recipient )
    {
        $this->recipient = $recipient;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $api_key = "qR3upRhX8kxIOjOwUJBf4A34MZSw17drYgWn8ekgySYnc";
        $url = env('MNOTIFY_URL')  . "$api_key";
        $data = [
            'recipient' => array($this->recipient),
            'message' => $this->message,
            'sender' => env('SENDER_ID'),
            'is_schedule' => false,
            'schedule_date' => "",
        ];

        $send_sms = Http::post($url, $data);
        $response = $send_sms->json();

        print_r($response);

        if ($response['code'] == "2000") {
            Log::info("\n SMS Sent Successfully");
        } else {
            Log::info("\n SMS Sending Error");
        }
    }
}
