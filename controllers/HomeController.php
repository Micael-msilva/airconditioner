<?php
// controllers/HomeController.php

class HomeController {
    public function index() {
        $actions = [
            ['label' => 'View Tasks', 'href' => 'index.php?route=tasks'],
            ['label' => 'Create Task', 'href' => 'index.php?route=create_task'],
            ['label' => 'Update Profile', 'href' => 'index.php?route=profile'],
            ['label' => 'Create a PMOC', 'href' => 'index.php?route=pmoc'],
        ];

        // Deixa o array disponível para a view
        include __DIR__ . '/../views/home.php';
    }
}
