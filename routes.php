<?php
$routes = [
    'default' => 'GET/home/page',
    'index_books' => 'GET/index/books',
    'index_authors' => 'GET/index/authors',
    'index_editors' => 'GET/index/editors',
    'index/libraries' => 'GET/index/libraries',
    'show_books' => 'GET/show/books',
    'show_authors' => 'GET/show/authors',
    'show_editors' => 'GET/show/editors',
    'show_libraries' => 'GET/show/libraries', 
    'admin_page' => 'GET/admin/page',
    'get_register' => 'GET/getRegister/auth', // obtient le formulaire d'enregistrement
    'post_register' => 'POST/postRegister/auth', // on a soumis le formulaire d'enregistrement d'un utilisateur
    'get_login' => 'GET/getLogin/auth', // obtient le formulaire de login
    'post_login' => 'POST/postLogin/auth', // exécute le login
    'get_logout' => 'GET/getLogout/auth' // déconnecte l'utilisateur
];
