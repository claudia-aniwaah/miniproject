<?php


class Users extends Controller
{

    use Validation;

    private Model $userModel;

    public function __construct()
    {
        $this->userModel = $this->model("UserModel");
    }

//if (password_verify($password, $loginData['password'])) {
//$_SESSION['empID'] = $empID;
//return true;
//}

    public function login(): void
    {
        if (isset($_POST['submit'])) {
            //VALIDATION
            $users = $this->userModel->getSingle(id: $_POST['employee_id']);


            if ($this->userModel->rowCount()) {
                if (password_verify($_POST['password'], $users->password)) {
                    $_SESSION['logged_in_user'] = $users->staff_id;
                    header('location:' . URL_ROOT . '/pages/dashboard');
                } else {
                    $data = [
                        'title' => 'Login',
                        'login_error' => 'Incorrect ID or password',
                    ];
                    $this->view("pages/login", $data);
                }
            } else {
                $data = [
                    'title' => 'Login',
                    'login_error' => 'Employee does not exist',
                ];
                $this->view("pages/login", $data);
            }
        } else {
            $data = [
                'title' => 'Login',
                'login_error' => '',
            ];
            $this->view("pages/login", $data);
        }
    }
}
