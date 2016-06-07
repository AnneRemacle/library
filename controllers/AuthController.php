<?php
    namespace Controllers;

    use Models\User;

    class AuthController extends Controller {

        private $user_model = null;

        public function __construct(User $user) {
            $this->user_model = $user;
        }

        public function getLogin() {
            return ['view' => 'login.php', 'resource_title' => 'Connectez-vous'];
        }

        public function getRegister() {
            return ['view' => 'register.php', 'resource_title' => 'Enregistrez-vous'];
        }

        public function postLogin() {
            if ( $user = $this->user_model->check([
                    'email' => $_POST['email'],
                    'password' => sha1($_POST['password'])
                ]) ) {
                    $_SESSION['user'] = json_encode($user);
                    header('Location: ?a=admin&r=page&with=books');
                }
        }

        public function getLogout() {
            if(isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                session_destroy();
                setcookie(session_name(),'',time()-3600);
            }
            header('Location: index.php');
        }

        public function postRegister() {
            $errors = [];

            if(empty($_POST['email'])) {
                $errors['email'] = 'Veuillez entrer votre adresse email';
            } elseif(strpos($_POST['email'],'@')===false) {
                $errors['email'] = "Veuillez entrer une adresse email valide";
            }

            if(empty($_POST['password'])) {
                $errors['password'] = 'Veuillez entrer un mot de passe';
            } elseif(strlen($_POST['password']) < 6) {
                $errors['password'] = 'Veuillez entrer un mot de passe d’au moins 6 caractères';
            }

            if(empty($_POST['pseudo'])) {
                $errors['pseudo'] = 'Veuillez entrer un pseudo';
            }

            if(count($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old_datas'] = $_POST;
                header('Location: index.php?r=auth&a=getRegister');
                return;
            }

            if($this->user_model->save([
                'password' => sha1($_POST['password']),
                'email' => $_POST['email'],
                'pseudo' => $_POST['pseudo']
            ])) {
                return ['view' => 'login.php', 'resource_title' => 'Connectez-vous'];
            } else {
                $_SESSION['errors'] = ['error' => 'Impossible d’entrer ces données dans la base de données'];
                $_SESSION['old_datas'] = $_POST;
                header('Location: index.php?r=auth@a=getRegister');
            }

            return ['view' => 'login.php', 'resource_title' => 'Veuillez vous connecter'];
        }
    }
