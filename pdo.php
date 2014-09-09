<?php
class SimplePDO {
  private static $_instance = null;
  private $stmt;

  public function __construct(){
    try {
      $this->dbhost = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USERNAME, PASSWORD);
    } catch(PDOException $e){
      $this->error = $e->getMessage();
    }
  }

  public static function getInstance() {
    if(!isset(self::$_instance)) {
      self::$_instance = new SimplePDO();
    }
    return self::$_instance;
  }

  public function query($query) {
    $this->stmt = $this->dbhost->prepare($query);
  }

  public function bind($param, $value, $type = null) {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
        $type = PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute() {
    return $this->stmt->execute();
  }

  public function resultset() {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function rowCount() {
    return $this->stmt->rowCount();
  }
}