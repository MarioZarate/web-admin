<?php

$users_active = config('app.users_menu');
$menu_array = [];

if ($users_active) {
    $menu_array =  [
            'type' => 'tree',
            'text' => 'Roles & Usuarios',
            'ico'  => 'user',
            'childs' => [
                    [
                      'text' => 'Roles',
                      'url' => 'roles.index',
                    ],

                    [
                      'text' => 'Usuarios',
                      'url' => 'users.index',
                    ],
                ]
        ];
}

return[

	'menu' => [

        $menu_array,        

        //======== UN NIVEL ===============
        [
            'type' => 'simple',
            'text' => 'Banners del Home',
            'url'  => 'banner-adm.index',
            'ico'  => 'picture'
        ],

        [
          'type' => 'simple',
          'text' => 'Home',
          'url'  => 'home-adm.index',
          'ico'  => 'home'
        ],

        //======== DOS NIVELES ===============
        // [
        //   'type' => 'tree',
        //   'text' => 'Huella Sostenible',
        //   'ico'  => 'leaf',
        //   'children' => [
        //          [
        //            'type' => 'one',
        //            'text' => 'Sostenible',
        //            'url' => 'sostenible-adm.index'
        //          ],

        //          [
        //           'type' => 'two',
        //           'text' => 'Huellas',
        //           'ico'  => 'book',
        //           'children' => [

        //             [
        //               'type' => 'one',
        //               'text' => 'Huellas',
        //               'url' => 'huella-adm.index'
        //             ],
  
        //             [
        //               'type' => 'one',
        //               'text' => 'Bloque Dos',
        //               'url' => 'huellab2-adm.index'
        //             ],

        //           ]
        //         ],
                
        //      ]
        // ],


        // [
        //  'type' => 'tree',
        //  'text' => 'Settings',
        //  'ico'  => 'cog',
        //  'children' => [
        //         [
        //           'type' => 'one',
        //           'text' => 'Seo',
        //           'url' => 'seo.index'
        //         ],

        //         [
        //           'type' => 'one',
        //           'text' => 'Redirecciones',
        //           'url' => 'redirecciones.index'
        //         ]
        //     ]
        // ],

	]
]
?>