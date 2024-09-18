<?php

class TaskRepository
{
    function create($title, $completed) {
        // ...
    }

    function find($id) {
        // ...
    }

    function update(Task $task) {
        // ...
    }

    function destroy($id) {
        // ...
    }
}


class Job
{
    function process()
    {
        $this->input();
        $this->count++;
        $this->output();
    }
}
