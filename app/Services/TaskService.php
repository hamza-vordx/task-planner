<?php
namespace App\Services;

use App\Models\Task;
use App\Services\Providers\ProviderInterface;
use Illuminate\Support\Facades\Http;

class TaskService implements ProviderInterface
{

    public function fetchTasks(): array
    {
        $tasks = Task::all()->sortByDesc('difficulty');
        return $tasks->json();
    }
}
