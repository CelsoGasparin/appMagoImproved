<?php

require_once "Classe.php";
require_once "fun/texto.php";
// require_once "TextoFun.php";

// $textoFun = new TextoFun();

class Subclasse extends Classe{
    private $nome;


    //construct
    public function __construct(Classe $classe,$no){
        $this->descricao = $classe->getDescricao();
        // $this->tipoForca = $classe->getTipoForca();
        $this->nome = $no; 
    }


    //methods
    public function getAllSubSkills(){
        $skills = 'poderes'.clearString($this->nome);
        return $skills;
        
    }
    public function getExplicacao(){
        return $this->nome."~Tipo: ".$this->descricao;
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
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }
}