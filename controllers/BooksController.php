<?php
    namespace Controllers;

    use Models\Books;
    use Models\Authors;
    use Models\Editors;
    use Models\Libraries;
    use Models\Nationalities;
    use Models\Comments;

    class BooksController {
        private $books_model = null;

        public function __construct() {
            $this -> books_model = new Books();
        }

        public function index() {
            $books = $this->books_model->all();
            $view = 'indexBooks.php';

            return ['books' => $books, 'view' => $view, 'resource_title' => 'Biblio - Les livres'];
        }

        public function fourBooks() {
            $books = $this->books_model->four();
            $view = 'home.php';

            return ['books' => $books,
                    'view' => $view
                ];
        }

        public function show() {
            if( !isset( $_GET[ 'id' ] ) ) {
                die( 'Il manque l’id' );
            }
            $id = intval($_GET['id']);
            $book = $this->books_model->find($id);
            $authors = null;
            $editors = null;
            $libraries = null;
            $books = null;


            if( isset( $_GET[ 'with' ]) ) {
                $with = explode( ',', $_GET[ 'with' ] );
                if( in_array( 'authors', $with ) ){
                    $authors_model = new Authors();
                    $authors = $authors_model -> getAuthorsByBookId( $book -> id );

                    $books_model = new Books();
                    $books = $books_model -> getBooksByAuthorId ( $authors[0] -> id );
                }
                if( in_array( 'editors', $with ) ) {
                    $editors_model = new Editors();
                    $editors = $editors_model -> getEditorsByBookId( $book -> id );
                }
                if( in_array( 'libraries', $with ) ) {
                    $libraries_model = new Libraries();
                    $libraries = $libraries_model -> getLibrariesByBookId( $book -> id );
                }
                if(in_array('comments', $with ) ) {
                    $comments_model = new Comments();
                    $comments = $comments_model -> getCommentsByBookId($book->id);
                }
            }

            return ['book' => $book,
                    'view' => 'showBooks.php',
                    'resource_title' => 'Biblio - '.$book->title,
                    'authors' => $authors,
                    'editors' => $editors,
                    'libraries' => $libraries,
                    'books' => $books,
                    'comments' => $comments
                ];
        }

        public function add(){
            if( isset( $_GET[ 'with' ]) ) {
                $with = explode( ',', $_GET[ 'with' ] );
                if( in_array( 'authors', $with ) ){
                    $authors_model = new Authors();
                    $authors = $authors_model -> all();
                }
                if( in_array( 'editors', $with ) ) {
                    $editors_model = new Editors();
                    $editors = $editors_model -> all( );
                }
                if( in_array( 'nationalities', $with ) ) {
                    $nationalities_model = new Nationalities();
                    $nationalities = $nationalities_model->all();
                }
            }

            return [
                'view' => 'addBooks.php', 
                'resource_title' => 'Biblio - Ajouter un livre',
                'authors' => $authors,
                'nationalities' => $nationalities,
                'editors' => $editors
                ];
        }

        public function postBook() {
            $errors = [];

            //Les champs en rapport direct avec le livre
            if(empty($_POST['title'])) {
                $errors['title'] = 'Veuillez entrer un titre à votre livre';
            } 

            if(empty($_POST['summary'])) {
                $errors['summary'] = 'Veuillez entrer un résumé pour le livre';
            }

            if(empty($_POST['isbn'])) {
                $errors['isbn'] = 'Veuillez entrer un numéro ISBN';
            } elseif(!strlen($_POST['isbn'])==14) {
                $errors['isbn'] = "Veuillez entrer un numéro ISBN valide (13 chiffres et un tiret)";
            }

           $cover = empty($_POST['cover']) ? NULL : $_POST['cover'];

            //Les champs en rapport avec l'auteur du livre

            if(empty($_POST['author_name'])) {
                $author_id = $_POST['author_id'];
            }else{
                $birth_date = empty($_POST['birth_date']) ? NULL : $_POST['birth_date'];
                $death_date = empty($_POST['death_date']) ? NULL : $_POST['death_date'];
                $photo = empty($_POST['photo_url']) ? NULL : $_POST['photo_url'];
              
                if(empty($_POST['nationality'])){
                    $nationality_id = $_POST['nationality_id'];
                }else{
                    $nationality_model = new Nationalities();
                    $nationality_id = $nationality_model->save([
                        'nationality' => $_POST['nationality']
                     ]);
                }

                $author_model = new Authors();
                $author_id = $author_model->save([
                    'name' => $_POST['author_name'],
                    'birth_date' => $birth_date,
                    'death_date' => $death_date,
                    'nationality_id' => $nationality_id,
                    'photo' => $photo
                ]);
            }

            if(empty($_POST['editor_name'])) {
                $editor_id = $_POST['editor_id'];
            } else {
                $editor_model = new Editors();
                $editor_id = $editor_model->save([
                    'name' => $_POST['editor_name']
                    ]);
            }

            if(count($errors)){
                $_SESSION['errors'] = $errors;
                $_SESSION['old_datas'] = $_POST;
                header('Location: index.php?a=add&r=books&with=authors,nationalities,editors');
            }else{
                $book_id = $this->books_model->save([
                    'title' => $_POST['title'],
                    'summary' => $_POST['summary'],
                    'isbn' => $_POST['isbn'],
                    'cover' => $_POST['cover'],
                    'editor_id' => $editor_id
                ]);

                $user = json_decode($_SESSION['user']);
                $user_id = $user->id;
                $this->books_model->attachUser($book_id, $user_id);
                $this->books_model->attachAuthor($book_id, $author_id);
                $_SESSION['errors'] = '';
                $_SESSION['old_datas'] = '';

                header('Location: index.php?a=admin&r=page&with=books,comments');
            }

            return ['view' => 'index.php?a=add&r=books&with=authors,nationalities,editors', 'resource_title' => 'Ajoutez un livre'];
        }

    }
