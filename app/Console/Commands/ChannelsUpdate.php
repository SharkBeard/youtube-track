<?php

namespace App\Console\Commands;

use App\Jobs\StatsUpdateJob;
use App\Models\Channel;
use Illuminate\Console\Command;

class ChannelsUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'channels:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Queues all channel update jobs';

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
      Channel::chunk(200, function ($channels) {
        foreach ($channels as $channel) {
          StatsUpdateJob::dispatch($channel->url);
        }
      });
    }
}
