<?php
class ProductController{
    public function index(){
        $data= new product();
        $data = $data->getAllProducts();
        echo"<pre>";
        //print_r($data);
       View::load('product/index',['products' => $data]);
    }
    public function add()
    {
        View::load('product/add');
    }

    public function store()
    {
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $conn = new Product();
            $dataInsert = Array ( "name" => $name ,
                            "description" => $description ,
                            "price" => $price 
                            );

            if($conn->insertProducts($dataInsert))
            {
                View::load('product/add',["success"=> "Data Added Successfully"]);
            }
            else 
            {
                View::load('product/add',["success"=> "Data failed Successfully"]);
            }
        }
        else{
        View::load('product/add',["success"=> "Data failed Successfully"]);
        }

    }




    public function edit($id)
    {
        $conn=new product();
        $data=$conn->getRow($id);
        if($data)
        View::load("product/edit",["row"=>$data]);
        else
        echo"error";
    }

    public function update()
    {
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $id = $_POST['id'];

            $conn = new Product();
            $dataInsert = Array ( "name" => $name ,
                            "description" => $description ,
                            "price" => $price
                            );
            // data of product
            

            if($conn->updateProduct($id,$dataInsert))
            {
                 $data=$conn->getRow($id);
                View::load('product/edit',["success"=> "Data updated Successfully","row"=>$data]);
            }
            else 
            {
                $data=$conn->getRow($id);
               View::load('product/edit',["success"=> "Data failed Successfully","row"=>$data]);
            }
        }
        redirect('home/index');
    }



    
    public function delete($id)
    {
        $conn=new product();
        if($conn->deleteProduct($id))
        {
            View::load('product/delete');
        }
        else 
        {
            echo"error";
        }
    }
}