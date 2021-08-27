<?php


class Users extends Controller
{

    use Validation;

    private Model $userModel;
    private Model $genderModel;
    private Model $positionsModel;
    private Model $maritalStatusModel;


    public function __construct()
    {
        $this->userModel = $this->model("UserModel");
        $this->genderModel = $this->model("GenderModel");
        $this->positionsModel = $this->model("PositionsModel");
        $this->maritalStatusModel = $this->model("MaritalStatusModel");
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

        if (isset($_POST['add-employee'])) {
//            var_dump($_POST);

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $other_name = $_POST['other_name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $position = $_POST['position_id'];
            $marital_status = $_POST['marital_status_id'];
            $gender = $_POST['gender_id'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone'];

            $hash_password = password_hash($password, PASSWORD_DEFAULT);

            $add_staff = $this->userModel->insert(array($position, $gender, $marital_status, $first_name, $last_name, $other_name, $address, $phone_number, $email, $hash_password));
            if ($add_staff) {
                header("location:" . URL_ROOT . "/user/staff");
            }

        }

        $data = [
            'title' => 'Edit Profile',
            'gender' => $this->genderModel->getAll(),
            'position' => $this->positionsModel->getAll(),
            'marital_status' => $this->maritalStatusModel->getAll(),
        ];
        $this->view("pages/add_employee", $data);
    }


    public function update_user(): void
    {
        if (isset($_POST['update-employee'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $other_name = $_POST['other_name'];
            $email = $_POST['email'];
            $position = $_POST['position_id'];
            $marital_status = $_POST['marital_status_id'];
            $gender = $_POST['gender_id'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone'];

            $update_staff = $this->userModel->update(array($position, $gender, $marital_status, $first_name, $last_name, $other_name, $address, $phone_number, $email, $_SESSION['logged_in_user']), $_SESSION['logged_in_user']);
            if ($update_staff) {
                header("location:" . URL_ROOT . "/user/staff");
            }
        }


        $data = [
            'title' => 'Edit Profile',
            'gender' => $this->genderModel->getAll(),
            'position' => $this->positionsModel->getAll(),
            'marital_status' => $this->maritalStatusModel->getAll(),
            'user' => $this->userModel->getSingle($_SESSION['logged_in_user'])
        ];
        $this->view("pages/edit_profile", $data);
    }


    public function staff(): void
    {

        $data = [
            'title' => 'Staff',
            'staff' => $this->userModel->getAll()
        ];
        $this->view("pages/employees", $data);
    }


    public function sign_out(): void
    {
        unset($_SESSION['logged_in_user']);
        $data = [
            'title' => 'Login',
            'login_error' => '',
        ];
        $this->view("pages/login", $data);
    }
}


