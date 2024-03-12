<?php

class Task {
    private $task_id;
    private $user_id;
    private $title;
    private $start_date;
    private $end_date;
    private $status;

    // Конструктор
    function __construct($task_id, $user_id, $title, $start_date, $end_date, $status){
        $this->task_id = $task_id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->status = $status;
    }

    // Конструктор, геттеры, сеттеры и другие методы по необходимости
}