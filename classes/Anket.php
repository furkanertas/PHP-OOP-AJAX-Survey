<?php
class Anket extends Veritabani {
    private $secim;
    private $gs;
    private $bjk;
    private $fb;
    public $conn;
    public function __construct () {
        $this->conn=parent::__construct();
    }
    public function setPost ($pr) {
        $this->secim=$_POST[$pr];
    }
    public function getPost () {
        return $this->secim;
    }
    public function kaydet() {
        switch ($this->secim) { // Formdan gelen değeri veritabına aktardık.
            case "0":
                $this->conn -> query("UPDATE veriler SET gs=gs+1");
                break;
            case "1":
                $this->conn -> query("UPDATE veriler SET bjk=bjk+1");
                break;
            case "2":
                $this->conn -> query("UPDATE veriler SET fb=fb+1");
                break;
        }
    }
    public function getOranlar () {
        $sql=$this->conn-> query("select * from veriler");
        $sql=$sql->fetch(PDO::FETCH_NUM);
        $tp=$sql[0]+$sql[1]+$sql[2];
        $this->gs = round($sql[0] * 100 / $tp, 1);
        $this->bjk = round($sql[1] * 100 / $tp, 1);
        $this->fb = round($sql[2] * 100 / $tp, 1);
    }
    public function getGs () {
        return $this->gs;
    }
    public function getBjk () {
        return $this->bjk;
    }
    public function getFb () {
        return $this->fb;
    }
} 