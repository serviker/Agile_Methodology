<?php

class TaskManager {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function createTask(Task $task) {
        // Реализация создания задачи в базе данных
    }

    public function getTasksByUser(User $user) {
        // Реализация получения задач пользователя из базы данных
    }

    public function updateTask(Task $task) {
        // Реализация обновления задачи в базе данных
    }

    public function deleteTask(Task $task) {
        // Реализация удаления задачи из базы данных
    }

    public function getAllTasks() {
        // Реализация получения всех задач из базы данных (админская часть)
    }
}
