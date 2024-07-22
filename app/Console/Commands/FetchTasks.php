<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Services\ProviderFactory\ProviderFactory;
use App\Services\TaskService;
use Illuminate\Console\Command;

class FetchTasks extends Command
{
    protected $taskService;
    public function __construct(TaskService $taskService) {
        parent::__construct();
        $this->taskService = $taskService;
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch tasks from service';

    /**
     * Execute the console command.
     */


    public function handle()
    {
        $providers = ['mock-one', 'mock-two'];

        foreach ($providers as $providerType) {
            $provider = ProviderFactory::createProvider($providerType);

            $tasks = $provider->fetchTasks();

            foreach ($tasks as $taskData) {

                Task::create([
                    'name' => $taskData['name'],
                    'duration' => $taskData['duration'],
                    'difficulty' => $taskData['difficulty'],
                    'service' => $providerType,
                ]);
            }
        }

        $this->info('Tasks fetched successfully.');
    }
}
