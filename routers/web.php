<?php

$routes = [
    'home' => ['HomeController', 'index'],
    
    // PMOC
    'pmoc' => ['PmocController', 'index'],            // lista PMOCs
    'pmoc_create' => ['PmocController', 'createPmoc'],    // formulário (GET)
    'pmoc_store' => ['PmocController', 'storePmoc'], // salvar (POST)
    'pmoc_detail' => ['PmocController', 'pmocDetails'],  // detalhes de um PMOC
    'pmoc_update' => ['PmocController', 'updatePmocDetails'], // atualizar PMOC e Cliente
    'pmoc_delete' => ['PmocController', 'deletePmoc'], // excluir PMOC

    // Client
    'client_create' => ['ClientController', 'create'],
    'client_store' => ['ClientController', 'store'],

    // AirConditioner
    'airconditioner_create' => ['PmocController', 'createAirconditioner'], // formulário (POST)
    'airconditioner_update' => ['PmocController', 'updateAirconditionerDetails'],
    'airconditioner_delete' => ['PmocController', 'deleteAirconditioner'],

    // Authentication
    'login' => ['AuthController', 'login'],
    'logout' => ['AuthController', 'logout'],
    'signup' => ['AuthController', 'signup'],

    // Profile
    'profile' => ['ProfileController', 'addTechnician'],
    
    // Tasks
    'tasks' => ['TaskController', 'index'],
    'task_create' => ['TaskController', 'create'],
    'task_store' => ['TaskController', 'store'],

    // Default ou erro
    '404' => ['ErrorController', 'notFound'],
];
