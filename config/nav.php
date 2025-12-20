<?php 
return [
    [
    'title' => 'Dashboard', 
    'icon' => 'far fa-circle nav-icon', 
    'route' => 'dashboard',
        // 'badge'=> ' New',
        'ability' => 'dashboard.view',

    ],
    [
    'title' => 'Roles', 
    'icon' => 'far fa-circle nav-icon',
    'route' => 'roles.index',
    'badge'=> 'New',
    'ability' => 'roles.view',
    ]
];
?> 