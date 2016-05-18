<?php
    namespace Controllers;

    use Models\Editors;
    use Models\Books;
    use Models\Authors;

    class EditorsController {
        private $editors_model = null;

        public function __construct() {
            $this -> editors_model = new Editors();
        }

        public function index() {

            $editors = $this->editors_model->all();
            $view = 'indexEditors.php';

            return ['editors' => $editors, 'view' => $view, 'resource_title' => 'Biblio - Les éditeurs'];
        }
        public function show() {
            if (!isset($_GET['id'])) {
                die('il manque un identifiant a votre livre');
            }
            $id = intval($_GET['id']);
            $editor = $this->editors_model->find($id);
            $nationality = $this->editors_model->getEditorNationality($id);
            $books = null;
            $authors = null;

            if( isset( $_GET[ 'with' ] ) ) {
                $with = explode( ',', $_GET[ 'with' ] );
                if( in_array( 'books', $with ) ) {
                    $books_model = new Books();
                    $book = $books_model -> getBooksByEditorId( $editor -> id );
                }
            }

            if( isset( $_GET[ 'with' ] ) ) {
                $with = explode( ',', $_GET[ 'with' ] );
                if( in_array( 'authors', $with ) ) {
                    $authors_model = new Authors();
                    $author = $authors_model -> getAuthorsByEditorId( $editor -> id );
                }
            }

            $view = 'showEditors.php';


            return ['editor' => $editor,
                    'nationality' => $nationality,
                    'view' => $view,
                    'resource_title' => 'Biblio - '.$editor->name,
                    'books' => $book,
                    'authors' => $author
                ];
        }
    }
