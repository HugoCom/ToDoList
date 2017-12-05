<?php
class Task
{
    public $name;
    public $description;
    public $complete;
    public $list;

    public function __construct(string $name, string $description, string $complete, string $list)
    {
        $this->name = $name;
        $this->description = $description;
        $this->complete = false;
        $this->list = $list;
    }
}