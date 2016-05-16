<?php
    namespace Controller;

    use Models\Authors;
    use Models\Books;
    use Models\Editors;

    class AuthorsController {
        private $authors_model = null;

        public function __construct() {
            $this->authors_model = new Authors();
        }

        public function index() {
            $authors = $this->authors_model->all();
            $view = 'indexAuthors.php';

            return [
                'authors' => $authors,
                'view' => $view,
                'page_title' => 'Biblio - Tous les auteurs'
            ];
        }

        public function show() {
            if(!isset($_GET['id'])) {
                die('Il manque l’identifiant de votre livre');
            }
            $id = intval($_GET['id']);
            $author = $this->authors_model->find($id);
            $books = null;
            $editors = null;

            if(isset($_GET['with'])) {
                $with = explode(',', $_GET['with']);
                if(in_array('books', $with)) {
                    $books_model = new Books();
                    $books = $books_model->getBooksByAuthorId($author->id);
                }

                if(isset($_GET['with'])) {
                    $with = explode(',', $_GET['with']);
                    if(in_array('editors', $with)) {
                        $editors_model = new Editors();
                        $editors = $editors_model->getEditorsByAuthorId($author->id);
                    }
                }
            }

            $view = 'showAuthors.php';
            return [
                'author' = $author,
                'view' => $view,
                'page_title' => 'Biblio - La fiche de '.$author->name,
                'books' => $books,
                'editors' => $editors
            ];
        }
    }
