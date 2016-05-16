<?php
    namespace Controller;

    use Models\Editors;
    use Models\Books;
    use Models\Authors;
    use Models\Libraries;

    class LibrariesController {
        private $libraries_model = null;

        public function __construct() {
            $this->libraries_model = new Libraries();
        }

        public function index() {
            $libraries = $this->libraries_model->all();
            $view = 'indexLibraries.php';

            return [
                'libraries' => $libraries,
                'view' => $view,
                'page_title' => 'Biblio - Les Bibliothèques'
            ];
        }

        public function show() {
            if(!isset($_GET['id'])) {
                die('Il manque l’identifiant de la bibliothèque');
            }
            $id = intval($_GET['id']);
            $library = $this->libraries_model->find($id);
            $books = null;
            $authors = null;

            if(isset($_GET['with'])) {
                $with = explode(',', $_GET['with']);
                if(in_array('books', $with)) {
                    $books_model = new Books();
                    $book = $books_model->getBooksByLibraryId($library->id);
                }
            }

            if(isset($_GET['with'])) {
                $with = explode(',', $_GET['with']);
                if(in_array('authors', $with)) {
                    $authors_model = new Authors();
                    $author = $authors_model->getAuthorsByLibraryId($library->id);
                }
            }

            $view = 'showLibraries.php';

            return [
                'library' => $library,
                'view' => $view,
                'page_title' => 'Biblio - '.$library->name,
                'books' => $book,
                'authors' => $author
            ];
        }
    }
