<?php

/**
 * @property UserModel userModel
 */



class Pages extends Controller
{
    public function __construct()
    {
        // $this->userModel = $this->model("UserModel");
    }


    public function dashboard(): void
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->view("pages/dashboard", $data);
    }


    public function suppliers(): void
    {
        $data = [
            'title' => 'SUPPLIERS'
        ];
        $this->view("pages/suppliers", $data);
    }



    public function products(): void
    {
        $data = [
            'title' => 'PRODUCTS'
        ];
        $this->view("pages/products", $data);
    }
}
