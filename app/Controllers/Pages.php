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
            $product_name = $_POST['product_name'];
            $category_id = $_POST['category_id'];
            $supplier_id = $_POST['supplier_id'];
            $brand_name = $_POST['brand_name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $status = $_POST['status'];

            $products = $this->productModel->insert(array($product_name, $category_id, $supplier_id, $brand_name, $price, $quantity, $status));
            if ($products) {
                echo "Data saved successfully";
            }

        }

        $data = [
            'title' => 'ADD PRODUCTS',
        ];
        $this->view("pages/add_product", $data);
    }

    public function add_supplier(): void
    {
        if (isset($_POST['add-supplier'])) {
            $supplier_name = $_POST['supplier_name'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone'];
            $email = $_POST['email'];
            $supplier_desc = $_POST['supplier_desc'];
            $fax = $_POST['fax'];

            $supplier = $this->supplierModel->insert(array($supplier_name, $address, $phone_number, $email, $supplier_desc, $fax));
            if ($supplier) {
                echo "Data saved successfully";
            }
        }


        $data = [
            'title' => 'ADD SUPPLIER',
        ];
        $this->view("pages/add_supplier", $data);
    }


}
