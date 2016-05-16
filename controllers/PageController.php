<?php

namespace Controllers;

use Models\Books;
use Models\Authors;

class PageController extends Controller {

        public function home() {
            $books = new Books();
            $authors = new Authors();

            return [
                'view' => 'home.php',
                'resource_title' => 'Biblio - Accueil',
                'books' => $books->four(),
                'authors' => $authors->all()
            ];
        }

        public function admin() {
            // cette vérification permet de protéger les routes
            if(!isset($_SESSION['user'])) {
                // header('Location: ?a=hetLogin&r=auth')
                header('Location: ?a=getLogin&r=auth');
            }

            return ['view' => 'admin.php', 'resource_title' => 'Accueil - Admin'];
        }
    }
