<?php

class Usuario
{
    private $idUsuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($value){
        $this->idUsuario = $value;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }
    public function setDeslogin($value){
        $this->deslogin = $value;
    }
    public function getDessenha(){
        return $this->dessenha;
    }
    public function setDessenha($value){
        $this->dessenha = $value;
    }

    public function getDtCadastro(){
        return $this->dtcadastro;
    }
    public function setDtCadastro($value){
        $this->dtcadastro = $value;
    }

    /**
     * @throws Exception
     */
    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select('SELECT * FROM tb_usuarios WHERE  idusuario = :ID', array(
           ":ID"=>$id
        ));
        var_dump($id);
        if (count($results) > 0){
            $row = $results[0];

            $this->setIdUsuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtCadastro(new DateTime($row['dtcadastro']));

        }
    }

    public function __toString(){
        return json_encode(array(
            'idusuario'  => $this->getIdUsuario(),
            'deslogin'   => $this->getDeslogin(),
            'dessenha'   => $this->getDessenha(),
            'dtcadastro' => $this->getDtCadastro()->format('d/m/Y H:i:s'),
        ));
    }

}