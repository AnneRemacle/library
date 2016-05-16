<?php
$routes = [
    'default' => 'GET/home/page',
    'index_books' => 'GET/index/books',
    'index_authors' => 'GET/index/authors',
    'index_editors' => 'GET/index/editors',
    'index/libraries' => 'GET/index/libraries',
    'show_book' => 'GET/show/book',
    'show_author' => 'GET/show/author',
    'show_editor' => 'GET/show/editor',
    'show_library' => 'GET/show/library', 
    'admin_page' => 'GET/admin/page',
    'get_register' => 'GET/getRegister/auth', // obtient le formulaire d'enregistrement
    'post_register' => 'POST/postRegister/auth', // on a soumis le formulaire d'enregistrement d'un utilisateur
    'get_login' => 'GET/getLogin/auth', // obtient le formulaire de login
    'post_login' => 'POST/postLogin/auth', // exécute le login
    'get_logout' => 'GET/getLogout/auth' // déconnecte l'utilisateur
];
