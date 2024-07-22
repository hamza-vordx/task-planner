<?php

namespace App\Services;

use App\Models\Task;
use App\Models\Developer;

class TaskAssignmentService
{
    public function assignTasks()
    {
        $developers = Developer::all();
        $tasks = Task::all()->sortByDesc('difficulty');

        $schedule = [];
        $weekCount = 1;

        foreach ($tasks as $task) {
            $assigned = false;

            foreach ($developers as $developer) {
                if (!isset($schedule[$developer->name])) {
                    $schedule[$developer->name] = ['hours' => 0, 'tasks' => []];
                }

                $hoursRequired = $task->duration / $developer->work_size;

                if ($schedule[$developer->name]['hours'] + $hoursRequired <= $developer->weekly_hours) {
                    $schedule[$developer->name]['tasks'][] = $task;
                    $schedule[$developer->name]['hours'] += $hoursRequired;
                    $assigned = true;
                    break;
                }
            }

            if (!$assigned) {
                $weekCount++;
                foreach ($schedule as $key => $dev) {
                    $schedule[$key]['hours'] = 0;
                    $schedule[$key]['tasks'] = [];
                }
                $schedule[$developers->first()->name]['tasks'][] = $task;
                $schedule[$developers->first()->name]['hours'] = $task->duration / $developers->first()->work_size;
            }
        }

        return ['schedule' => $schedule, 'weeks' => $weekCount];
    }
}
