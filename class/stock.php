<?php

include_once('DB.php');

class stock extends DB
{
    public function getItemSummary()
    {
        $sql = "SELECT list_items.name, 
        COALESCE(SUM(stock_item_income.total_income), 0) AS total_income, 
        COALESCE(SUM(stock_item_expend.total), 0) AS total_expenditure
        FROM list_items
        LEFT JOIN stock_item_income ON list_items.id = stock_item_income.list_item_id
        LEFT JOIN stock_item_expend ON list_items.id = stock_item_expend.list_item_id
        GROUP BY list_items.name";
        $data = $this->db->query($sql);
        $result = $data->fetch_all(MYSQLI_ASSOC);

        return $result;
    }
}
