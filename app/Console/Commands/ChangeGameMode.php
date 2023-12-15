<?php

namespace App\Console\Commands;

use App\GameMode;
use Illuminate\Console\Command;

class ChangeGameMode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game-mode:change {--level=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Allows you to change the game mode';

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
        $level = $this->option('level');
        if ((int) $level < 0 || $level > 4) {
            return;
        }

        GameMode::where('active', 1)->update([
            'active' => 0
        ]);

        GameMode::where('level', $level)->update([
            'active' => 1
        ]);
        
        return 0;
    }
}
