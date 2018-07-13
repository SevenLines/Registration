<?php

namespace App\Console\Commands;

use App\Reminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $query = Reminder::query();
        $query = $query->where('is_sent', '=', 0)
            ->where('remind_date', '<=', new \DateTime())->get();

        foreach ($query as $r) {
            Mail::send('emails.reminder', ["reminder" => $r], function ($m) use ($r) {
                $m->from(config("mail.username"), 'мосрвп.рф');
                $m->to(config("mail.username"), "мосрвп.рф")->subject("Напоминалка от ".$r->remind_date." на сайте Мосрвп.рф");
            });
            $r->is_sent = true;
            $r->save();
        }
    }
}
