<?php
class Disciplina{
    private $id;
    private $nome;
    private $descricao;
    private $cargahoraria;
    private $curso;
    private $horario;
    private $sala;
    private $professor;

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
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of cargahoraria
     */ 
    public function getCargahoraria()
    {
        return $this->cargahoraria;
    }

    /**
     * Set the value of cargahoraria
     *
     * @return  self
     */ 
    public function setCargahoraria($cargahoraria)
    {
        $this->cargahoraria = $cargahoraria;

        return $this;
    }

    /**
     * Get the value of curso
     */ 
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set the value of curso
     *
     * @return  self
     */ 
    public function setCurso($curso)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get the value of horario
     */ 
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set the value of horario
     *
     * @return  self
     */ 
    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get the value of sala
     */ 
    public function getSala()
    {
        return $this->sala;
    }

    /**
     * Set the value of sala
     *
     * @return  self
     */ 
    public function setSala($sala)
    {
        $this->sala = $sala;

        return $this;
    }

    /**
     * Get the value of professor
     */ 
    public function getProfessor()
    {
        return $this->professor;
    }

    /**
     * Set the value of professor
     *
     * @return  self
     */ 
    public function setProfessor(Professor $professor)
    {
        $this->professor = $professor;

        return $this;
    }
}

?>