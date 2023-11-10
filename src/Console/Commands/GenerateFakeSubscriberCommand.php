<?php

namespace Adminetic\Newsletter\Console\Commands;

use Adminetic\Newsletter\Models\Admin\Subscriber\Subscriber;
use Faker\Factory as Faker;
use Illuminate\Console\Command;

class GenerateFakeSubscriberCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fake:subscriber {subscribers}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to generate fake subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating Fake Subscriber');

        $bar = $this->output->createProgressBar($this->argument('subscribers'));
        $bar->start();
        $faker = Faker::create();
        Subscriber::whereNull('id')->delete();
        $i = 0;
        while ($i <= $this->argument('subscribers')) {
            Subscriber::create([
                'email' => $faker->email,
            ]);
            $i++;
            $bar->advance();
        }

        $bar->finish();
    }
}
