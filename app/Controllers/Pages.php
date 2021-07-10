<?php

/**
 * @property User userModel
 */

class Pages extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model("User");
    }

    public function index(): void
    {
        $users = $this->userModel->getAll();

        $data = [
            'title' => 'Login',
            'users' => $users
        ];
        $this->view("pages/index", $data);
    }

    public function dashboard(): void
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->view("pages/dashboard", $data);
    }
}