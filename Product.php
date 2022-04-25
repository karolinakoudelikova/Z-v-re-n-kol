<?php

class Product
{

    public function __construct (PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getProductsFromDatabase(){
        $query = $this->pdo->query('SELECT id, name, price FROM product');
        return $query->fetchAll();
    }
}