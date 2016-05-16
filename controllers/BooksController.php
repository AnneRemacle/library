<?php
    namespace Controller;

    use Model\Books;
    use Model\Authors;
    use Model\Editors;
    use Model\Libraries;

    class BooksController {
        private $books_model = null;

        public function __construct() {
            $this -> books_model = new Books();
        }

        public function index() {
            $books = $this->books_model->all();
            $view = 'indexBooks.php';

            return ['books' => $books, 'view' => $view, 'page_title' => 'Biblio - Les livres'];
        }

        public function fourBooks() {
            $books = $this->books_model->four();
            $view = 'home.php';

            return ['books' => $books,
                    'view' => $view
                ]
        }

        public function show() {
            if( !isset( $_GET[ 'id' ] ) ) {
                die( 'Il manque l’id' );
            }
            $id = intval($_GET['id']);
            $book = $this->books_model->find($id);
            $authors = null;
            $editors = null;


            if( isset( $_GET[ 'with' ]) ) {
                $with = explode( ',', $_GET[ 'with' ] );
                if( in_array( 'authors', $with ) ){
                    $authors_model = new Authors();
                    $authors = $authors_model -> getAuthorsByBookId( $book -> id );
                }
                if( in_array( 'editors', $with ) ) {
                    $editors_model = new Editors();
                    $editors = $editors_model -> getEditorsByBookId( $book -> id );
                }
                if( in_array( 'libraries', $with ) ) {
                    $libraries_model = new Libraries();
                    $libraries = $libraries_model -> getLibrariesByBookId( $book -> id );
                }
            }

            return ['book' => $book,
                    'view' => 'showBooks.php',
                    'page_title' => 'Biblio - '.$book->title,
                    'authors' => $authors,
                    'editors' => $editors,
                    'libraries' => $libraries
                ];
        }

    }
