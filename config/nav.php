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
    'title' => 'Categories', 
    'icon' => 'far fa-circle nav-icon',
    'route' => 'categories.index',
    'badge'=> 'New',
    'ability' => 'categories.view',
    ]
];
?> 