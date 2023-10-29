<?php 

require_once('config/connect.php');
require_once('Models/DataModel.php');

class DataController {
    public function index()
    {
        $users = DataModel::getAllData();
        include('resources/views/index.php');
    }

    public function show($id)
    {
        $user = DataModel::getDataById($id);
        include('resources/views/show.php');
    }
    
    public function create()
    {
        include('resources/views/create.php');
    }

    public function store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $nim = $_POST['nim'];
        $address = $_POST['address'];

        DataModel::createData($name, $nim, $email, $address);
        header('Location: index.php');
    }

    public function edit($id) 
    {
        $user = DataModel::getDataById($id);
        include('resources/views/edit.php');
    }

    public function update($id)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $nim = $_POST['nim'];
        $address = $_POST['address'];

        DataModel::updateData($id, $name, $nim, $email, $address);
        header('Location: index.php');
    }
    
    public function delete($id)
    {
        DataModel::deleteData($id);
        header('Location: index.php');
    }
}