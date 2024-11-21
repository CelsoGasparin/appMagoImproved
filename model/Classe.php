<?php
require_once "fun/texto.php";
// require_once "TextoFun.php";

// $textoFun = new TextoFun();

class Classe {
    protected $descricao;
    // protected $tipoForca;
    

    //construct
    public function __construct($des){
        $this->descricao = $des;
        // $this->tipoForca = $tp;
    }


    //methods
    public function getAllSkills(){
        $skills = 'poderes'.clearString($this->descricao);
        return $skills;
        
        
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
     */
    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    // /**
    //  * Get the value of tipoForca
    //  */
    // public function getTipoForca()
    // {
    //     return $this->tipoForca;
    // }

    // /**
    //  * Set the value of tipoForca
    //  */
    // public function setTipoForca($tipoForca): self
    // {
    //     $this->tipoForca = $tipoForca;

    //     return $this;
    // }
}