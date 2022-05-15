<?php

namespace AbdulsalamIshaq\Sendbox\Commands;

use Illuminate\Console\Command;

class SendboxCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    public $signature = 'sendbox:install';

    /**
     * The console command description.
     *
     * @var string
     */
    public $description = 'Install Sendbox assets';

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
        $this->line("<info>Setting up Sendbox</info>");
        $this->line("");
        sleep(2);

        $this->call('vendor:publish', [
            '--tag' => 'sendbox.config'
        ]);

        $this->line("");
        sleep(2);
        $this->line("<info> Sendbox installed sucessfully!!</info>");
    }
}
