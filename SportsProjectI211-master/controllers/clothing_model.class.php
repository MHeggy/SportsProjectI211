<?php
/**
 * Author: Miles Hegeduis
 * Date: 11/7/2023
 * File Name: clothing_model.class.php
 * Description: File defining the ClothingModel Class.
 */

class ClothingModel {// start of ClothingModel class.
    //private attributes
    private $db, $dbConnection, $tblProduct;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
        $this->tblProduct = $this->db->getProductTable();
    }

    //function to make sure only one ClothingModel
    public static function getClothingModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new ClothingModel();
        }
        return self::$_instance;
    }

    //this retrieves all clothes in database, returns them in array if successful, false if failed
    public function listClothes() {
        $sql = "SELECT * FROM " . $this->tblProduct;

        //execute sql
        $query = $this->dbConnection->query($sql);

        //return false if query failed
        if (!$query) {
            return false;
        }

        //create array to store clothes that are returned from query
        $clothes = array();

        //loop through results
        while ($obj = $query->fetch_object()) {
            $clothes = new Clothing(stripslashes($obj->sport), stripslashes($obj->name),stripslashes($obj->price),stripslashes($obj->stock),stripslashes($obj->description),stripslashes($obj->image)) ;

            //set id for movie
            $clothes->setId($obj->id);

            //add to clothes array
            $clothes[] = $clothes;
        }
        return $clothes;
    }
}// end of ClothingModel class.