<?php

/**
 * @property UserModel userModel
 */

class Pages extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model("UserModel");
    }


    public function dashboard(): void
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->view("pages/dashboard", $data);
    }
}