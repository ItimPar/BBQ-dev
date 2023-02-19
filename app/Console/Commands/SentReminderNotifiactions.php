<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use App\Notifications\QueueNotification;
use App\Models\Queue;
use App\Models\User;
use Carbon\Carbon;

class SentReminderNotifiactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sent a notification to users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get all queue


        $reminders = Queue::where('status','รอ')->get();

        // Group notifications
        $data = [];
        foreach ( $reminders as $reminder) {
            if (Carbon::now('Asia/Bangkok')->diffInMinutes($reminder->start) > 10 && Carbon::now('Asia/Bangkok')->diffInMinutes($reminder->start) < 70) {
                $data[$reminder->user_id][] = $reminder->toArray();
            }
        }
        // dd($data);

        foreach ($data as $userId => $reminders) {
            $user = User::find($userId);
            $message = "กรุณาเตรียมตัวอีก 10 นาทีจะถึงคิวของคุณ".$user->firstname." ".$user->lastname;
            Notification::send($user, new QueueNotification($message,$userId));
            $sent = sendLineNotify($message);
        }

        // Send notification
    }
    function sendLineNotify($message) {
        $LINE_API = "https://notify-api.line.me/api/notify";
        $LINE_TOKEN = "ybfVFJcQcx24vcYSmtArDdJSmefLiRtrZdp8fIjid6k";
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData,'','&');
        $headerOptions = array(
            'http'=>array(
                'method'=>'POST',
                'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                        ."Authorization: Bearer ".$LINE_TOKEN."\r\n"
                        ."Content-Length: ".strlen($queryData)."\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($LINE_API,FALSE,$context);
        $res = json_decode($result);
        return $res;
    }
}
