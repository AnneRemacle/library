<?php 
	namespace Controllers;

	use Models\Books;
	    use Models\Authors;
	    use Models\Editors;
	    use Models\Libraries;
	    use Models\Nationalities;
	    use Models\Comments;

	class CommentsController extends Controller {
		private $comments_model = null;

	       	public function __construct() {
	           	$this -> comments_model = new Comments();
	        	}

		public function add(){
			$errors = [];

			if(empty($_POST['comment'])) {
				$errors['comments'] = "Veuillez entrer votre commentaire";
			}else{
				$comment = $_POST['comment'];
			}

			$user = json_decode($_SESSION['user']);

			 if(count($errors)){
                			$_SESSION['errors'] = $errors;
                			$_SESSION['old_datas'] = $_POST;
                			header('Location: index.php?a=show&r=books&id='.$_POST['book_id'].'&with=authors,libraries,editors,comments');
                		}else{
                			$this->comments_model->save([
                				'user_id' => $user->id,
                				'book_id' => $_POST['book_id'],
                				'comment' => $comment,
                				'author' => $user->pseudo
                			]);
                			$_SESSION['errors'] = '';
                			$_SESSION['old_datas'] = '';
                			header('Location: index.php?a=show&r=books&id='.$_POST['book_id'].'&with=authors,libraries,editors,comments');
                		}
		}
	}