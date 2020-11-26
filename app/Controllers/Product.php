<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_Model;

class Product extends Controller
{
    public function __construct()
    {
        $this->model = new Product_Model();
    }
    public function index()
    {
        echo view('product_view');
    }
    public function getProduct()
    {
        $data = $this->model->findAll();
        return json_encode($data);
    }
    public function save()
    {
        $json = $this->request->getJSON();
        $data = [
            'product_name' => $json->product_name,
            'product_price' => $json->product_price
        ];
        // var_dump($data);
        // die;
        $this->model->insert($data);
    }
    public function update($id = null)
    {
        $json = $this->request->getJSON();
        $data = [
            'product_name' => $json->product_name,
            'product_price' => $json->product_price
        ];
        $this->model->update($data);
    }
    public function delete($id = null)
    {
        $this->model->delete($id);
    }
}
