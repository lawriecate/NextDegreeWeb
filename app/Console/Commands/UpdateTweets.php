<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Twitter;
use Illuminate\Support\Facades\Storage;

class UpdateTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatetwitter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load latest tweets from our Twidder';

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
        $tweets = Twitter::getUserTimeline(['screen_name' => 'next_degree', 'count' => 10, 'format' => 'array']);
            Storage::put('twitter_cache.txt', serialize($tweets));

    }
}
