<?php

include_once('DB.php');

class list_item extends DB
{
    public function index()
    {
        // $amoutPerPage = 1;
        // $amout = count("SELECT * FROM list_items");
        // $numberOfPage = ceil($amout / $amoutPerPage);
        // $activePage = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);
        // $initialData = ($numberOfPage * $activePage) - $amoutPerPage;
        
        $sql = "SELECT * FROM list_items ";
        $data = $this->db->query($sql);
        $result = $data->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function show($id)
    {
        $sql = "SELECT * FROM list_items WHERE id = '$id' ";
        $data = $this->db->query($sql);
        $result = $data->fetch_assoc();

        return $result;
    }
   
    public function store()
    {
        $date_start = $_POST['date_start'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        $sql = "INSERT INTO list_items (date_start, name, price) VALUES ('$date_start', '$name', '$price')";

        $result = $this->db->query($sql);
        if ($result) {
           echo "<script>
           alert('Successfullly create data'); 
           document.location='../screen/index_list.php';</script>";
        }else{
            echo "<script>alert('Unsuccessfullly create data'); 
            document.location='../screen/index_list.php';</script>";
        }
        
        exit;
        
    }
    public function destroy()
    {
        $id = $_POST['id'];

        $sql = "DELETE FROM list_items WHERE id = '$id'";

        $result = $this->db->query($sql);
        if ($result) {
            echo "<script>
            alert('Successfullly delete data'); 
            document.location='../screen/index_list.php';</script>";
         }else{
             echo "<script>alert('Unsuccessfullly delete data'); 
             document.location='../screen/index_list.php';</script>";
         }
         
         exit;
    }
    public function update()
    {
        $id = $_POST['id'];
        $date_start = $_POST['date_start'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        $sql = "UPDATE list_items SET date_start = '$date_start', name = '$name', price = '$price' WHERE id = '$id'";

        $result = $this->db->query($sql);
        if ($result) {
            echo "<script>
            alert('Successfullly update data'); 
            document.location='../screen/index_list.php';</script>";
         }else{
             echo "<script>alert('Unsuccessfullly update data'); 
             document.location='../screen/index_list.php';</script>";
         }
         
         exit;
    }
}
