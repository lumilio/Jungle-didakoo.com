<?php

namespace App\Jobs;

use App\Game;
use App\GuestGame;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteOldGames implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Game::where('created_at', '<=', now()->subHours(12))->delete();
        } catch (\Exception $e) {
            logger()->error('Error while deleting old games');
            logger()->error($e->getMessage());
            return;
        }

        try {
            GuestGame::where('created_at', '<=', now()->subHours(12))->delete();
        } catch (\Exception $e) {
            logger()->error('Error while deleting old guest games');
            logger()->error($e->getMessage());
            return;
        }

        logger()->info('Old games deleted successfully');
    }
}
