<?php

namespace App;

class Properties{

    protected static $db;
    protected static $columnsDB = ['id', 'title', 'price', 'cover', 'description', 'rooms', 'wc', 'parking', 'seller_id', 'created_at', 'updated_at'];

    public $id;
    public $title;
    public $price;
    public $cover;
    public $description;
    public $rooms;
    public $wc; 
    public $parking;
    public $seller_id;
    public $created_at;    
    public $updated_at;    

    public function __construct($args = []){

        $this->id           = $args['id'] ?? null;
        $this->title        = $args['title'] ?? '';
        $this->price        = $args['price'] ?? '';
        $this->cover        = $args['cover'] ?? '';
        $this->description  = $args['description'] ?? '';
        $this->rooms        = $args['rooms'] ?? '';
        $this->wc           = $args['wc'] ?? '';
        $this->parking      = $args['parking'] ?? '';
        $this->seller_id    = $args['seller_id'] ?? '';
        $this->created_at   = date('Y-m-d H:i:s');
        $this->updated_at   = date('Y-m-d H:i:s');

    }

    public function save(){

        $data = $this->sanitize();

        $query = "INSERT INTO properties ( ". join(', ', array_keys($data)) . " ) VALUES ( '" . join("', '", array_values($data)) . "') ";
        $result = self::$db->query($query);
        debugg($result);    
        
    }

    static function setDB($database){
        self::$db = $database;
    }

    public function attributes(){
        $attributes = [];
        foreach(self::$columnsDB as $columns){
            if($columns === 'id') continue;
            $attributes[$columns] = $this->$columns;
        }
        return $attributes;
    }

    public function sanitize(){
        $attributes = $this->attributes();
        $sanitizedData = [];
        foreach($attributes as $key => $value){
            $sanitizedData[$key] = self::$db->real_escape_string($value);
        }
        return $sanitizedData;
    }
    

}