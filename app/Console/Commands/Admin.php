<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install laravel-admin';

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
        $name = $this->ask('What is your name?');
        $this->info($name);
        $bar = $this->output->createProgressBar(10000);
        for ($i=0;$i<10000;$i++) {
            $bar->advance();
        }

        $bar->finish();

    }
}
