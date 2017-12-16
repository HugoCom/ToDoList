<?php
class Task
{
    public $name;
    public $description;
    public $complete;
    public $list;

    public function __construct($name, $description, $complete, $list)
    {
        $this->name = $name;
        $this->description = $description;
        $this->complete = false;
        $this->list = $list;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function isComplete()
    {
        return $this->complete;
    }
}