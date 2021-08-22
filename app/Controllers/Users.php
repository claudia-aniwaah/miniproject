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
        if (isset($_POST['submit'])) {
            //VALIDATION
            $users = $this->userModel->getSingle(id: $_POST['employee_id']);

            if ($this->userModel->rowCount()) {

                if (password_verify($_POST['employee_password'], $users->password)) {
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
            return;
        }

        $data = [
            'title' => 'Login',
            'login_error' => '',
        ];
        $this->view("pages/login", $data);
    }


    public function add_user(): void
    {

        $add_staff = $this->userModel->insert(array([]));
        if ($add_staff) {
            header("location:" . URL_ROOT . "/pages/staff");
        }

        $data = [
            'title' => 'PRODUCTS',
        ];
        $this->view("pages/add_user", $data);
    }


    public function update_user(): void
    {
        if ($_POST['update_staff']) {
            $update_staff = $this->userModel->update(array([]));
            if ($update_staff) {
                header("location:" . URL_ROOT . "/pages/staff");
            }
        }


        $data = [
            'title' => 'Edit Profile',
        ];
        $this->view("pages/edit_profile", $data);
    }


    public function staff(): void
    {
        $staff = $this->userModel->getAll();

        $data = [
            'title' => 'Staff',
            'staff' => $staff
        ];
        $this->view("pages/employees", $data);
    }
}
