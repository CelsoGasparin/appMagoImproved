<?php


class Arma{
    private $descricao;
    private $maxDano;
    private $dadoAdd;
    private $poder;
    private $tipoStat;

    
    //construct
    public function __construct($des,$mD,$daA,$pod,$tpSt){
        $this->descricao = $des;
        $this->maxDano = $mD;
        $this->dadoAdd = $daA;
        $this->poder = $pod;
        $this->tipoStat = $tpSt;

    }


    //methods
    public function getExplicacao(){
        return $this->poder == null? $this->descricao."- Não nenhuma Possui Habilidade" : $this->descricao."- Possui a Habilidade ".$this->poder->getDescricao();
    }



    /**
     * Get the value of maxDano
     */
    public function getMaxDano()
    {
        return $this->maxDano;
    }

    /**
     * Set the value of maxDano
     */
    public function setMaxDano($maxDano): self
    {
        $this->maxDano = $maxDano;

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
     */
    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    

    

    /**
     * Get the value of poder
     */
    public function getPoder()
    {
        return $this->poder;
    }

    /**
     * Set the value of poder
     */
    public function setPoder($poder): self
    {
        $this->poder = $poder;

        return $this;
    }

    /**
     * Get the value of dadoAdd
     */
    public function getDadoAdd()
    {
        return $this->dadoAdd;
    }

    /**
     * Set the value of dadoAdd
     */
    public function setDadoAdd($dadoAdd): self
    {
        $this->dadoAdd = $dadoAdd;

        return $this;
    }

    /**
     * Get the value of tipoStat
     */
    public function getTipoStat()
    {
        return $this->tipoStat;
    }

    /**
     * Set the value of tipoStat
     */
    public function setTipoStat($tipoStat): self
    {
        $this->tipoStat = $tipoStat;

        return $this;
    }
}