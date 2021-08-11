<?php


class Pages extends Controller
{

    private Model $productModel;
    private Model $supplierModel;


    public function __construct()
    {
        $this->productModel = $this->model("ProductsModel");
        $this->supplierModel = $this->model("SuppliersModel");
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
        $suppliers = $this->supplierModel->getAll();

        $data = [
            'title' => 'Suppliers',
            'suppliers' => $suppliers
        ];
        $this->view("pages/suppliers", $data);
    }


    public function products(): void
    {
        $products = $this->productModel->getAll();

        $data = [
            'title' => 'PRODUCTS',
            'products' => $products
        ];
        $this->view("pages/products", $data);
    }


    public function add_product(): void
    {
        if (isset($_POST['add-product'])) {
            var_dump($_POST);
        }

        $data = [
            'title' => 'ADD PRODUCTS',
        ];
        $this->view("pages/add_product", $data);
    }

    public function add_supplier(): void
    {
        $data = [
            'title' => 'ADD SUPPLIER',
        ];
        $this->view("pages/add_supplier", $data);
    }


}
