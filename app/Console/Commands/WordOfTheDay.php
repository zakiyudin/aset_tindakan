<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class WordOfTheDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a daily email to users';

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
     * @return int
     */
    public function handle()
    {
        $word = [
            'a' => 'lorem',
            'b' => 'ipsum',
            'c' => 'dolor',
            'd' => 'sit',
        ];

        $key = array_rand($word);
        $value = $word[$key];

        $users = User::all();
        foreach ($users as $user) {
            # code...
            \Mail::raw("{$value}", function($message) use ($user) {
                $message->from('tindakanaset@gmail.com');
                $message->to($user->email)->subject('Word of the day');
            });
        }

        $this->info('Email sent!');
    }
}
