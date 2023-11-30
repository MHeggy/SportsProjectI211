<?php
/**
 * Author: Miles Hegeduis
 * Date: 11/7/2023
 * File Name: clothing_model.class.php
 * Description: File defining the ClothingModel Class.
 */

require_once 'models/clothing.class.php';
class ClothingModel {// start of ClothingModel class.
    //private attributes
    private $db, $dbConnection, $tblProduct;
    static private $_instance = NULL;

    //constructor
    public function __construct() {
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
        //sql to pull products from table -->needs work<--
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
            $clothing = new Clothing(stripslashes($obj->product_id) ,stripslashes($obj->sport_name), stripslashes($obj->product_name),stripslashes($obj->price),stripslashes($obj->stock_quantity),stripslashes($obj->description),stripslashes($obj->image)) ;

            //set id for movie
            $clothing->setId($obj->product_id);

            //add to clothes array
            $clothes[] = $clothing;
        }
        return $clothes;
    }

    //search database for relevant items relating to search terms
    function searchClothes($terms) {
        $terms = explode(" ", $terms);
        //select statement for 'OR' search
        $sql = "SELECT * FROM " . $this->tblProduct . " WHERE" ;

        foreach ($terms as $term) {
            $sql .= " product_name LIKE '%" . $term . "%'";;
        }

        //execute query
        $query = $this->dbConnection->query($sql);

        //if search failed, throw exception
        //add code for exception

        //search succeeded, but no movie was found.
        if ($query->num_rows == 0) {
            return 0;
        }

        //if clothes were found, create a clothing array
        $clothes = array();

        //loop through all returned searches
        while ($obj = $query->fetch_object()) {
            $clothing = new Clothing(stripslashes($obj->product_id) ,stripslashes($obj->sport_name), stripslashes($obj->product_name),stripslashes($obj->price),stripslashes($obj->stock_quantity),stripslashes($obj->description),stripslashes($obj->image)) ;

            //set id for movie
            $clothing->setId($obj->product_id);

            //add to clothes array
            $clothes[] = $clothing;
        }
        return $clothes;
    }
}// end of ClothingModel class.