<?php





interface iPersonagem{

    public function usarPoder(string $skill,Personagem $target,bool $defesaBool);
    public function getAllPoderes();

}