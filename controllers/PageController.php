<?php

namespace Controllers;

use Models\Books;
use Models\Authors;
use Models\User;
use Models\Comments;

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
            $user = json_decode($_SESSION['user']);
            if( isset( $_GET[ 'with' ]) ) {
                $with = explode( ',', $_GET[ 'with' ] );
                if( in_array( 'books', $with ) ){
                    $books_model = new Books();
                    $users_model = new User();
                    $comments_model = new Comments();
                    $books_count = $users_model->getCountBooksByUserId ( $user -> id );
                    $books = $books_model->getBooksByUserId ( $user -> id );
                    $comments_count = $users_model->getCountCommentsByUserId( $user->id );
                    $comments = $comments_model->getCommentsByUserId( $user->id );
                }

            }

            return ['view' => 'admin.php',
                    'resource_title' => 'Accueil - Admin',
                    'books_count' => $books_count,
                    'books' => $books,
                    'comments_count' => $comments_count,
                    'comments' => $comments
                ];
        }
    }
