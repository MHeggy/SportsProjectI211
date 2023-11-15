<?php
/**
 * Author: Miles Hegeduis
 * Date: 11/7/2023
 * File Name: clothing.class.php
 * Description: File that defines the class titled 'Clothing'
 */

class Clothing {
    //private data members
    private $id, $sport, $name, $price, $stock, $description;

    //constructor
    public function __construct($id, $sport, $name, $price, $stock, $description, $image)
    {
        $this->id = $id;
        $this->sport = $sport;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->description = $description;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSport()
    {
        return $this->sport;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->description;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

}