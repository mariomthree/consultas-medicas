<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'administrador' => [
            'usuarios' => 'c,l,e,r',
            'pacientes' => 'c,l,e,r',
            'medicos' => 'c,l,e,r',
            'consultas' => 'c,r,l,r',
            'perfil' => 'e',
        ],
        'chefe_posto' => [
            'pacientes' => 'r,l,r',
            'medicos' => 'r,l,r',
            'consultas' => 'c,r,l,r',
            'perfil' => 'e',
        ],
        'recepcionista' => [
            'pacientes' => 'c',
            'medicos' => 'c',
            'perfil' => 'e',
        ]
    ],

    'permissions_map' => [
        'c' => 'criar',
        'l' => 'listar',
        'e' => 'editar',
        'r' => 'remover'
    ]
];
