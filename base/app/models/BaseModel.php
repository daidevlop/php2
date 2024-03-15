<?php
namespace App\Models;

use PDO;

class BaseModel
{
    public $pdo = null;
    public $sta = null;
    public $sql = '';

    public function __construct()
    {
        $this->pdo =  new PDO("mysql:host=" . DBHOST
            . ";dbname=" . DBNAME
            . ";charset=" . DBCHARSET,
            DBUSER,
            DBPASS
        );
    }
    function setQuery($sql) {
        return $this->sql = $sql;
    }
     function execute($options=array()) {
        // $pdo = getConnect();
        $this->sta = $this->pdo->prepare($this->sql);
        if($options) {  //If have $options then system will be tranmission parameters
            for($i=0;$i<count($options);$i++) {
                $this->sta->bindParam($i+1,$options[$i]);
            }
        }
        $this->sta->execute();
        return $this->sta;
    }
    function loadAllRows($options=array()) {
        if(!$options) {
            if(!$result = $this->execute($options))
                return false;
        }
        else {
            if(!$result = $this->execute($options))
                return false;
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
     function loadRow($option=array()) {
        if(!$option) {
            if(!$result = $this->execute($option))
                return false;
        }
        else {
            if(!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_OBJ);
    }
}