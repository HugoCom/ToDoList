<?php
class ListTask
{
    public $listTask;
    public $name;
    public $date;

    public function __construct($name,$date,$listTask)
    {
        $this->listTask = $listTask;
        $this->name = $name;
        $this->date = $date;
    }

    public function getListTask()
    {
        return $this->listTask;
    }
}