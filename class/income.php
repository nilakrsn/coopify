<?php

include_once('DB.php');

class income_item extends DB
{
    public function index()
    {
        $sql = "SELECT stock_item_income.id, stock_item_income.date_income, stock_item_income.total_income, stock_item_income.list_item_id, list_items.name FROM stock_item_income LEFT JOIN list_items ON stock_item_income.list_item_id = list_items.id";
        $data = $this->db->query($sql);
        $result = $data->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function show($id)
    {
        $sql = "SELECT * FROM stock_item_income LEFT JOIN list_items ON stock_item_income.list_item_id = list_items.id WHERE stock_item_income.id = '$id' ";
        $data = $this->db->query($sql);
        $result = $data->fetch_assoc();

        return $result;
    }

   

    public function store()
    {
        $date_income = $_POST['date_income'];
        $total_income = $_POST['total_income'];
        $items = $_POST['list_item_id'];

        $sql = "INSERT INTO stock_item_income(date_income, total_income, list_item_id) VALUE ('$date_income', '$total_income', '$items')";

        $result = $this->db->query($sql);
        if ($result) {
            echo "<script>
            alert('Successfullly create data'); 
            document.location='../screen/index_income.php';</script>";
        }else{
            echo "<script>alert('Unsuccessfullly create data'); 
            document.location='../screen/index_income.php';</script>";
        }
        
        exit;
      
    }
    public function destroy()
    {
        $id = $_POST['id'];

        $sql = "DELETE FROM stock_item_income WHERE id = '$id'";

        $result = $this->db->query($sql);
        if ($result) {
            echo "<script>
            alert('Successfullly delete data'); 
            document.location='../screen/index_income.php';</script>";
         }else{
             echo "<script>alert('Unsuccessfullly delete data'); 
             document.location='../screen/index_income.php';</script>";
         }
         
         exit;
    }
    public function update()
    {
        $id = $_POST['id'];
        $date_income = $_POST['date_income'];
        $total_income = $_POST['total_income'];
        $items = $_POST['list_item_id'];

        $sql = "UPDATE stock_item_income SET date_income = '$date_income', total_income = '$total_income', list_item_id = '$items' WHERE id = '$id'";
        $result = $this->db->query($sql);
        if ($result) {
            echo "<script>
            alert('Successfullly update data'); 
            document.location='../screen/index_income.php';</script>";
         }else{
             echo "<script>alert('Unsuccessfullly update data'); 
             document.location='../screen/index_income.php';</script>";
         }
         
         exit;
    }
}
