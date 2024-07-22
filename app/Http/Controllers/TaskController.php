<?php

namespace App\Http\Controllers;

use App\Services\RandomTaskGenerator;
use App\Services\TaskAssignmentService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskAssignmentService;

    public function __construct(TaskAssignmentService $taskAssignmentService)
    {
        $this->taskAssignmentService = $taskAssignmentService;

    }

    public function index()
    {
        $result = $this->taskAssignmentService->assignTasks();
        return view('tasks.index', [
            'schedule' => $result['schedule'],
            'weeks' => $result['weeks']
        ]);
    }

}
