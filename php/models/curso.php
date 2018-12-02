<?php
class Curso{
    private $id;
    private $nome;
    private $departamento;
    private $area;
    private $vagas;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of departamento
     */ 
    public function getDepartamento():Departamento
    {
        return $this->departamento;
    }

    /**
     * Set the value of departamento
     *
     * @return  self
     */ 
    public function setDepartamento(Departamento $departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get the value of area
     */ 
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the value of area
     *
     * @return  self
     */ 
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get the value of vagas
     */ 
    public function getVagas()
    {
        return $this->vagas;
    }

    /**
     * Set the value of vagas
     *
     * @return  self
     */ 
    public function setVagas($vagas)
    {
        $this->vagas = $vagas;

        return $this;
    }
}
?>