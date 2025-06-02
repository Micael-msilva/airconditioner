<?php

$routes = [
    'home' => ['HomeController', 'index'],
    
    // PMOC
    'pmoc' => ['PmocController', 'index'],            // lista PMOCs
    'pmoc_create' => ['PmocController', 'createPmoc'],    // formulário (GET)
    'pmoc_store' => ['PmocController', 'storePmoc'], // salvar (POST)

    // Client
    'client_create' => ['ClientController', 'create'],
    'client_store' => ['ClientController', 'store'],

    // AirConditioner
    'airconditioner_create' => ['AirConditionerController', 'create'],
    'airconditioner_store' => ['AirConditionerController', 'store'],

    // Authentication
    'login' => ['AuthController', 'login'],
    'logout' => ['AuthController', 'logout'],
    'signup' => ['AuthController', 'signup'],

    // Profile
    'profile' => ['ProfileController', 'handleRequest'],
    
    // Tasks
    'tasks' => ['TaskController', 'index'],
    'task_create' => ['TaskController', 'create'],
    'task_store' => ['TaskController', 'store'],

    // Default ou erro
    '404' => ['ErrorController', 'notFound'],
];
