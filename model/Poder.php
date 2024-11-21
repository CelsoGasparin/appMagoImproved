<?php



class Poder{
    private $descricao;
    private $maxForca;
    private $tipoSkill;
    private $tipoStat;

    //construct
    public function __construct($des,$mF,$tpK,$tpSt){
        $this->descricao = $des;
        $this->maxForca = $mF;
        $this->tipoSkill = $tpK;
        $this->tipoStat = $tpSt;
    }


    //methods
    public function getExplicacao(){
        return $this->descricao." ~ ".$this->maxForca." de Força máxima ~ ".$this->tipoSkill." é oque essa Habilidade faz ~ Stat: ".$this->tipoStat;
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
     * Get the value of maxForca
     */
    public function getMaxForca()
    {
        return $this->maxForca;
    }

    /**
     * Set the value of maxForca
     */
    public function setMaxForca($maxForca): self
    {
        $this->maxForca = $maxForca;

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

    /**
     * Get the value of tipoSkill
     */
    public function getTipoSkill()
    {
        return $this->tipoSkill;
    }

    /**
     * Set the value of tipoSkill
     */
    public function setTipoSkill($tipoSkill): self
    {
        $this->tipoSkill = $tipoSkill;

        return $this;
    }
}