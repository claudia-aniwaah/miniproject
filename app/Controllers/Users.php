<?php


class Users extends Controller
{

    use Validation;

    private Model $userModel;

    public function __construct()
    {
        $this->userModel = $this->model("UserModel");
    }


    public function login(): void
    {
        if (isset($_POST['submit'])){
            echo "Hello world";
        }

        $users = $this->userModel->getAll();
        $data = [
            'title' => 'Login',
            'username_error' => '',
            'password_error' => '',
            'users' => $users
        ];
        $this->view("pages/login", $data);
    }


}