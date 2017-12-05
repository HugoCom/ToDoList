<?php
class ListTask
{
    public $listTask;
    public $name;
    public $date;

    public function __construct($name)
    {
        $this->listTask = array();
        $this->name = $name;
        $this->date = date('Y-m-d');
    }

    public function addlist(Task $task){
        $this->listTask[] = $task;
    }
}