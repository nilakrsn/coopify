<?php

include_once('DB.php');

class expend_item extends DB
{
    public function index()
    {
        $sql = "SELECT stock_item_expend.id, stock_item_expend.date_expend, stock_item_expend.total, stock_item_expend.list_item_id, list_items.name FROM stock_item_expend LEFT JOIN list_items ON stock_item_expend.list_item_id = list_items.id";
        $data = $this->db->query($sql);
        $result = $data->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function show($id)
    {
        $sql = "SELECT * FROM stock_item_expend LEFT JOIN list_items ON stock_item_expend.list_item_id = list_items.id WHERE stock_item_expend.id = '$id' ";
        $data = $this->db->query($sql);
        $result = $data->fetch_assoc();

        return $result;
    }



    public function store()
    {
        $date_expend = $_POST['date_expend'];
        $total = $_POST['total'];
        $items = $_POST['list_item_id'];

        $sql = "INSERT INTO stock_item_expend(date_expend, total, list_item_id) VALUE ('$date_expend', '$total', '$items')";

        $result = $this->db->query($sql);
        if ($result) {
            echo "<script>
            alert('Successfullly create data'); 
            document.location='../screen/index_expend.php';</script>";
        }else{
            echo "<script>alert('Unsuccessfullly create data'); 
            document.location='../screen/index_expend.php';</script>";
        }
        
        exit;
    }
    public function destroy()
    {
        $id = $_POST['id'];

        $sql = "DELETE FROM stock_item_expend WHERE id = '$id'";

        $result = $this->db->query($sql);
        if ($result) {
            echo "<script>
            alert('Successfullly delete data'); 
            document.location='../screen/index_expend.php';</script>";
         }else{
             echo "<script>alert('Unsuccessfullly delete data'); 
             document.location='../screen/index_expend.php';</script>";
         }
         
         exit;
    }
    public function update()
    {
        $id = $_POST['id'];
        $date_expend = $_POST['date_expend'];
        $total = $_POST['total'];
        $items = $_POST['list_item_id'];

        $sql = "UPDATE stock_item_expend SET date_expend = '$date_expend', total = '$total', list_item_id = '$items' WHERE id = '$id'";

        $result = $this->db->query($sql);
        if ($result) {
            echo "<script>
            alert('Successfullly update data'); 
            document.location='../screen/index_expend.php';</script>";
         }else{
             echo "<script>alert('Unsuccessfullly update data'); 
             document.location='../screen/index_expend.php';</script>";
         }
         
         exit;
    }
}
