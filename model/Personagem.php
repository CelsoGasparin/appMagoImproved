<?php

require_once "Classe.php";
require_once "Subclasse.php";
require_once "Arma.php";
require_once "Poder.php";
require_once "iPersonagem.php";


class Personagem implements iPersonagem{

    private $STR;
    private $CON;
    private $DEX;
    private $MAG;
    private $nome;
    private Subclasse $Classe;
    private array $poderes;
    private $ArmaEquipada;
    private $HP;
    private $maxHP;

    

    //construct
    public function __construct($st,$co,$de,$ma,$nom,$cl,array $pods,$aEq){
        $this->STR = $st;
        $this->CON = $co;
        $this->DEX = $de;
        $this->MAG = $ma;
        $this->nome = $nom;
        $this->Classe = $cl;
        $this->ArmaEquipada = $aEq;
        $this->ArmaEquipada != null ? 
        $melee["Golpe com ".$this->ArmaEquipada->getDescricao()] = new Poder("Golpe com ".$this->ArmaEquipada->getDescricao(),$this->ArmaEquipada->getMaxDano(),'Atacar','STR') : 
        $melee["Golpe com Punho"] = new Poder("Golpe com Punho",15,'Atacar','STR');
        $this->poderes = array_merge($pods,$melee);
        $this->maxHP = 0;
        for($i=0;$i < $this->CON;$i++){ 
            $dado = rand(200,400);
            if($dado > $this->maxHP){
                $this->maxHP = $dado;
            }            
        }
        $this->HP = $this->maxHP;

    }

    //toString
    public function __toString(){

        $result = "[Nome]- ".$this->nome.
        "\n[STR]- ".$this->STR.
        "\n[CON]- ".$this->CON.
        "\n[DEX]- ".$this->DEX.
        "\n[MAG]- ".$this->MAG.
        "\n[Classe]- ".$this->Classe->getDescricao().
        "\n[SubClasse]- ".$this->Classe->getNome();

        foreach($this->poderes as $key=>$pod){
            $result .= "\n[Poder]- ".$pod->getDescricao();
        }
        $this->ArmaEquipada == null ? 
        $result .= "\n[ArmaEquipada]- Nenhuma":
        ($this->ArmaEquipada->getPoder() == null? $result .= "\n[ArmaEquipada]- ".$this->ArmaEquipada->getDescricao()."\n[PoderDaArma]- Nenhum" :$result .= "\n[ArmaEquipada]- ".$this->ArmaEquipada->getDescricao()."\n[PoderDaArma]- ".$this->ArmaEquipada->getPoder()->getDescricao()); 
        $result .= "\n[VidaMáxima]- ".$this->maxHP;
        return $result;
    }

    //methods

    private function getDefense(){
        $defense = -999;
        for($i=0;$i < $this->DEX;$i++){ 
            $dado = rand(-30,20);
            if($dado > $defense){
                $defense = $dado;
            }
        }
        return $defense;
    }
    // public function PerdeuHp(bool $defesaBool,$dano){

    //     $defesaBool ? $defesa = $this->getDefense() : $defesa = 0; 

    //     $dano < $defesa ? null:$this->HP -= $dano - $defesa;;
        
        
    //     return $defesa;
        
    // }
    public function usarPoder(string $skill,Personagem $target,bool $defesaBool){
        
        foreach($this->getAllPoderes() as $key=>$poder) {
            if(strtolower($skill) == strtolower($poder->getDescricao())){
                // $poder == 'Curar' ? $this->Curar($target,$poder) : $this->Atacar($target,$poder);
                $skillUsada = $poder->getTipoSkill();
                return $this->$skillUsada($target,$poder,$defesaBool);
                
            }
        }




    }
    private function Curar(Personagem $target,Poder $skill,$idc){
        
        $statUsado = $skill->getTipoStat();
        $valorStat = $this->$statUsado;
        if($this->ArmaEquipada != null){
            $this->ArmaEquipada->getTipoStat() == $statUsado ? $valorStat += $this->ArmaEquipada->getDadoAdd():null;
        }
        $cura = 0;
        for($i=0; $i < $valorStat; $i++){ 
            $result = rand(1,$skill->getMaxForca());
            $cura < $result ? $cura = $result:null;
        }
        $target->HP+$cura >= $target->maxHP ? $target->HP = $target->maxHP : $target->HP += $cura;
        
        return $cura;

    }
    private function Atacar(Personagem $target,Poder $skill,bool $defesaBool){
        $defesaBool ? $defesa = $this->getDefense() : $defesa = 0; 
        $statUsado = $skill->getTipoStat();
        $valorStat = $this->$statUsado;
        if($this->ArmaEquipada != null){
            $this->ArmaEquipada->getTipoStat() == $statUsado ? $valorStat += $this->ArmaEquipada->getDadoAdd():null;
        }
        $attack = 0;
        for($i=0; $i < $valorStat; $i++){ 
            $result = rand(1,$skill->getMaxForca());
            $attack < $result ? $attack = $result:null;
        }
        $actualAttack = $attack - $defesa;
        $actualAttack < 0 ? $actualAttack = 0:null;
        $actualAttack >= $target->HP ? $target->HP = 0: $target->HP -= $actualAttack;

        return [$attack,$actualAttack];
    }
    public function getAllPoderes(){
        if($this->ArmaEquipada == null){
            return $this->poderes;
        }elseif($this->ArmaEquipada->getPoder() != null){
            return array_merge($this->poderes,[$this->ArmaEquipada->getPoder()]);
        }else{
            return $this->poderes;
        }
        
        
    }









    /**
     * Get the value of STR
     */
    public function getSTR()
    {
        return $this->STR;
    }

    /**
     * Set the value of STR
     */
    public function setSTR($STR): self
    {
        $this->STR = $STR;

        return $this;
    }

    /**
     * Get the value of CON
     */
    public function getCON()
    {
        return $this->CON;
    }

    /**
     * Set the value of CON
     */
    public function setCON($CON): self
    {
        $this->CON = $CON;

        return $this;
    }

    /**
     * Get the value of DEX
     */
    public function getDEX()
    {
        return $this->DEX;
    }

    /**
     * Set the value of DEX
     */
    public function setDEX($DEX): self
    {
        $this->DEX = $DEX;

        return $this;
    }

    /**
     * Get the value of MAG
     */
    public function getMAG()
    {
        return $this->MAG;
    }

    /**
     * Set the value of MAG
     */
    public function setMAG($MAG): self
    {
        $this->MAG = $MAG;

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
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of Classe
     */
    public function getClasse()
    {
        return $this->Classe;
    }

    /**
     * Set the value of Classe
     */
    public function setClasse($Classe): self
    {
        $this->Classe = $Classe;

        return $this;
    }

    /**
     * Get the value of poderes
     */
    public function getPoderes(): array
    {
        return $this->poderes;
    }

    /**
     * Set the value of poderes
     */
    public function setPoderes(array $poderes): self
    {
        $this->poderes = $poderes;

        return $this;
    }

    /**
     * Get the value of ArmaEquipada
     */
    public function getArmaEquipada()
    {
        return $this->ArmaEquipada;
    }

    /**
     * Set the value of ArmaEquipada
     */
    public function setArmaEquipada($ArmaEquipada): self
    {
        $poderes = [];
        foreach($this->poderes as $key=>$poder){
            if($poder->getDescricao() != "Golpe com ".$this->ArmaEquipada->getDescricao() and $poder->getDescricao() != "Golpe com Punho"){
                $poderes[$key] = $poder;
            }
        }
        $ArmaEquipada != null ? 
        $melee["Golpe com ".$ArmaEquipada->getDescricao()] = new Poder("Golpe com ".$ArmaEquipada->getDescricao(),$ArmaEquipada->getMaxDano(),'Atacar','STR') : 
        $melee["Golpe com Punho"] = new Poder("Golpe com Punho",15,'Atacar','STR');
        $this->poderes = array_merge($poderes,$melee);
        $this->ArmaEquipada = $ArmaEquipada;

        return $this;
    }

    /**
     * Get the value of HP
     */
    public function getHP()
    {
        return $this->HP;
    }

    /**
     * Set the value of HP
     */
    public function setHP($HP): self
    {
        $this->HP = $HP;

        return $this;
    }

    /**
     * Get the value of maxHP
     */
    public function getMaxHP()
    {
        return $this->maxHP;
    }

    /**
     * Set the value of maxHP
     */
    public function setMaxHP($maxHP): self
    {
        $this->maxHP = $maxHP;

        return $this;
    }
}