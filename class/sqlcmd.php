<?php
class SqlCmd extends PDO{ //CRC - Class Responsabily Colaboration
    //atributos
    private $conn;
    //metodos construtores(new Usuario("Jose","123456");)
    public function __construct(){
         $this->conn = new PDO("mysql:host=127.0.0.1;dbname=bd_cadastro","root",""); // substitiu o arquivo conecta.php
    }
    //metodos da classe()cofparametros,cofparametro,insert,update ???
    // atribui parametros para uma query(script sql)... get/set
    public function setParametros ($comando,$parametros = array()){
        foreach ($parametros as $key => $value) {
            $this->setParametro($comando, $key , $value);
        }
    }
    public function setParametro($cmd, $key , $value){
        $cmd->bindParam($key, $value);
    }
    public function querySql($comandoSql, $parametros = array()){
        $cmd = $this->conn->prepare($comandoSql);
        $this->setParametros($cmd, $parametros);
        $cmd->execute(); //executa o comando sql no bd
        return $cmd;
    }
    public function selectSql($comandoSql, $parametros = array()){
        $cmdRetornado = $this->querySql($comandoSql, $parametros);
        return $cmdRetornado->fetchAll(PDO::FETCH_ASSOC);
    }
}

//Sobrecarga de metodos (pesquise...)



?>
