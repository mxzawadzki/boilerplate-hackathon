<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Tasks\RemoveOldQrsTask;


class RemoveOldQrs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qr:remove-old {--minutes=5 : How old must be qr to  be deleted}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes qrs older than 5 mins or speccified in --minutes';

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
        $minutes = $this->option("minutes");
        RemoveOldQrsTask::remove($minutes);
        $this->info("Old qrs got removed");
    }
}
