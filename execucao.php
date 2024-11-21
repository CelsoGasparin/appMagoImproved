<?php

require_once "model/Personagem.php";
require_once "model/Classe.php";
require_once "model/Subclasse.php";
require_once "model/Poder.php";
require_once "model/Arma.php";
require_once "model/fun/menuFun.php";
require_once "model/fun/texto.php";



$classes = [new Classe("Mago"),
            new Classe("Lutador"),
            new Classe("Assasino")];
$classes = OrganizeObjectArray($classes,"getDescricao");
// print_r($classes);
$subclasses = [new Subclasse($classes['Mago'],'Healer'),
               new Subclasse($classes['Mago'],'Mago de Fogo'),
               new Subclasse($classes['Mago'],'Necromante'),
               new Subclasse($classes['Lutador'],"Cavaleiro"),
               new Subclasse($classes['Lutador'],'Martial Artist'),
               new Subclasse($classes['Lutador'],'Besta'),
               new Subclasse($classes['Assasino'],'Mercenário'),
               new Subclasse($classes['Assasino'],'Arqueiro')];

$subclasses = OrganizeObjectArray($subclasses,'getNome');
// print_r($subclasses);
$poderesMago = [new Poder('Golpe Normal',30,'Atacar','MAG'),
                new Poder('Golpe Especial',45,'Atacar','MAG')];
$poderesMago = OrganizeObjectArray($poderesMago,'getDescricao');
$poderesLutador = [new Poder('Soco Normal',30,'Atacar','STR'),
                   new Poder('Soco Especial',45,'Atacar','STR')];
$poderesLutador = OrganizeObjectArray($poderesLutador,'getDescricao');
$poderesAssasino = [new Poder('Corte Rápido',30,'Atacar','DEX'),
                    new Poder('Corte Profundo',45,'Atacar','DEX')];
$poderesAssasino = OrganizeObjectArray($poderesAssasino,'getDescricao');
// print_r($poderesMago);
// print_r($poderesLutador);
// print_r($poderesMago);
$poderesHealer = [new Poder('Cura Normal',35,'Curar','MAG'),
                  new Poder('Cura Especial',75,'Curar','MAG')];
$poderesMago_de_Fogo = [new Poder('Bola de Fogo',115,'Atacar','MAG'),
                        new Poder('Flecha de Fogo',90,'Atacar','MAG')];
$poderesNecromante = [new Poder('Summonar Mortos',60,'Atacar','NAG'),
                      new Poder('Magia Negra',150,'Atacar','MAG')];
$poderesHealer = OrganizeObjectArray($poderesHealer,'getDescricao');
$poderesMago_de_Fogo = OrganizeObjectArray($poderesMago_de_Fogo,'getDescricao');
$poderesNecromante = OrganizeObjectArray($poderesNecromante,'getDescricao');
// print_r($poderesHealer);
// print_r($poderesMago_de_Fogo);
// print_r($poderesNecromante);
$poderesCavaleiro = [new Poder('Tratar Feridas',30,'Curar','DEX'),
                     new Poder('Corte Profundo',60,'Atacar','STR')];
$poderesMartial_Artist = [new Poder('Chute Rápido',100,'Atacar','DEX'),
                          new Poder('Chute Pesado',120,'Atacar','STR')];
$poderesBesta = [new Poder('Corte com Garras',100,'Atacar','STR'),
                 new Poder('Mordida',160,'Atacar','STR')];
$poderesCavaleiro = OrganizeObjectArray($poderesCavaleiro,'getDescricao');
$poderesMartial_Artist = OrganizeObjectArray($poderesMartial_Artist,'getDescricao');
$poderesBesta = OrganizeObjectArray($poderesBesta,'getDescricao');
// print_r($poderesCavaleiro);
// print_r($poderesMartial_Artist);
// print_r($poderesBesta);
$poderesMercenario = [new Poder('Tratar Feridas',45,'Curar','DEX'),
                      new Poder('Atacar pelas Sombras',120,'Atacar','DEX')];
$poderesArqueiro = [new Poder('Flecha Normal',65,'Atacar','DEX'),
                    new Poder('Flecha com Veneno',140,'Atacar','DEX')];
$poderesMercenario = OrganizeObjectArray($poderesMercenario,'getDescricao');
$poderesArqueiro = OrganizeObjectArray($poderesArqueiro,'getDescricao');
// print_r($poderesMercenario);
// print_r($poderesArqueiro);
$armas = [new Arma('Espada Comum',65,0,null,'STR'),
          new Arma('Espada Pesada',80,1,$poderesCavaleiro['Corte Profundo'],'STR'),
          new Arma('Excalibur',200,3,new Poder('Corte Sagrado',400,'Atacar','STR'),'STR'),
          new Arma('Cajado Simples',25,0,null,'MAG'),
          new Arma('Cajado de Fogo',25,1,$poderesMago_de_Fogo['Bola de Fogo'],'MAG'),
          new Arma('Cajado de Gelo',25,1,new Poder('Tempestade de Neve',120,'Atacar','MAG'),'MAG'),
          new Arma('Cajado do Poder',25,3,new Poder('Chuva de Meteoros',350,'Atacar','MAG'),'MAG'),
          new Arma('Faca Simples',65,0,null,'DEX'),
          new Arma('Faca Mágica',65,2,new Poder('Corte Mágico',130,'Atacar','MAG'),'DEX'),
          new Arma('Arco Simples',15,0,$poderesArqueiro['Flecha Normal'],'DEX'),
          new Arma('Arco Mágico',15,1,new Poder('Flecha de Mana',135,'Atacar','MAG'),'DEX'),
          new Arma('Arco de Fogo',15,2,$poderesMago_de_Fogo['Flecha de Fogo'],'DEX'),
          new Arma('Arco Amaldiçoado',15,2,new Poder('Flecha Amaldiçoada',150,'Atacar','DEX'),'DEX'),
          new Arma('Arco do Dragão',15,4,new Poder('Flecha Dracônica',500,'Atacar','MAG'),'DEX'),
          new Arma('PISTOLA',45,8,new Poder('Bala',1000,'Atacar','DEX'),'STR'),
          new Arma('Relíquia de Morte',160,10,new Poder('Espiral Descendente',413,'Atacar','STR'),'STR')];
$armas = OrganizeObjectArray($armas,'getDescricao');
// print_r($armas);


// $Boneco_de_Treino = new Personagem(2,2,2,2,'Boneco_de_Treino',$subclasses['Martial Artist'],[$poderesLutador['Soco Normal'],$poderesCavaleiro['Tratar Feridas']],$armas['Excalibur']);
// $Boneco_de_Treino2 = new Personagem(2,2,2,2,'Boneco_de_Treino',$subclasses['Martial Artist'],[$poderesLutador['Soco Normal'],$poderesCavaleiro['Tratar Feridas']],$armas['Faca Simples']);
// print_r($Boneco_de_Treino);
// batalhar($Boneco_de_Treino,$Boneco_de_Treino2);



// print $Boneco_de_Treino->usarPoder('Tratar Feridas',$Boneco_de_Treino);


// die;
$personagemAtual = null;
$personagens = null;

while(true){
    system('clear');
    montarMenu(true,'Cadastrar Personagem','Remover Personagem','Listar Personagens','Escolher Personagem','Tutorial','Batalhar');
    $opValue = readline();
    switch(strtolower($opValue)){
        case 'cadastrar personagem':
        case 1:
            system('clear');
            $nome = readline("Qual o nome do seu Personagem?");

            while(true){
                system('clear');
                arrayMenu(false,returnArrayMethod($subclasses,'getExplicacao'));
                print "AVISO!Você precisa escrever o nome da SubClasse!(não é case-sensitive)\n";
                $opValue = readline();
                foreach($subclasses as $key=>$subclass){
                    if(strtolower(clearString($opValue)) == strtolower(clearString($key))){
                        $subclasse = $key;
                        $statsMax = ($subclasses[$key]->getDescricao() == 'Lutador' ? 6: 4);
                        $statsLim = ($subclasses[$key]->getDescricao() == 'Lutador' ? 4: 3);
                        break 2;
                    }
                }
                
            }

            $statPrintado = 'STR';
            $STR = 1;
            $CON = 1;
            $DEX = 1;
            $MAG = 1;
            while(true){
                system('clear');
                print "+++Determine os atributos do seu Personagem+++\n";
                montarMenu(false,'STR- '.$STR,'CON- '.$CON,'DEX- '.$DEX,'MAG- '.$MAG);
                print "A Quantidade de Pontos que você tem para gastar é ".$statsMax;
                print "\nO Máximo de pontos que um Status pode ter é ".$statsLim."\n".$statPrintado."- ";
                do{
                    $$statPrintado = readline();
                }while(($$statPrintado < 1 or $$statPrintado > $statsLim) or $statsMax-$$statPrintado+1 < 0);
                $statsMax-$$statPrintado+1 >= 0 ? $statsMax -= $$statPrintado-1 : null;
                
                mudarStat($statPrintado);
                if($statPrintado == null and $statsMax >0){
                    while(true){
                        system('clear');
                        montarMenu(true);
                        print "AVISO!Você não definiu os status corretamente,por favor use todos os seu pontos.\n";
                        $opValue = readline();
                        if($opValue == 0){
                            $statPrintado = 'STR';
                            $STR = 1;
                            $CON = 1;
                            $DEX = 1;
                            $MAG = 1;
                            $statsMax = ($subclasses[$key]->getDescricao() == 'Lutador' ? 6 : 4);
                            break;
                        }
                    }    
                }elseif($statPrintado == null and $statsMax <= 0){
                    break;
                }
            }

            system('clear');
            do{
                print"Você quer que seu Personagem tenha uma Arma?\n1-SIM\n2-NÃO\n";
                $opValue = readline();
                if($opValue == 1){
                    while(true){
                        system('clear');
                        arrayMenu(false,returnArrayMethod($armas,'getExplicacao'));
                        print "AVISO!Você precisa escrever o nome da arma!(não é case-sensitive)\n";
                        $opValue = readline();
                        foreach($armas as $key=>$arma){
                            if(strtolower(clearString($opValue)) == strtolower(clearString($arma->getDescricao()))){
                                $armaEQ = $arma;
                                break 3;
                            }
                        }
                    }
                }else{
                    $armaEQ = null;
                }
            }while($opValue != 2);


            // $personagem = new Personagem($STR,$CON,$DEX,$MAG,$nome,$subclasses[$subclasse],[],$armaEQ);
            // $listaPoderesDispo = $personagem->getAllPoderesDispo();
            $podsSubSkills = $subclasses[$subclasse]->getAllSubSkills();
            $podsSkills = $subclasses[$subclasse]->getAllSkills();
            $DispoSkills = array_merge($$podsSubSkills,$$podsSkills);
            $listaDispoSkills = returnArrayMethod($DispoSkills,'getDescricao');
            $pods = [];
            do{
                system('clear');
                print"+++ESCOLHA TRÊS HABILIDADES+++\n";
                arrayMenu(false,$listaDispoSkills);
                print"AVISO!Você precisa escrever o nome da Habilidade.(não é case-sensitive)\n";
                $opValue = readline();
                foreach($DispoSkills as $key=>$skillDispo){
                    if(strtolower(clearString($opValue)) == strtolower(clearString($skillDispo->getDescricao()))){
                        $pods[] = $skillDispo;
                    }
                }
            }while(count($pods) < 3);
            
            $pods = OrganizeObjectArray($pods,'getDescricao');
            is_array($personagens) ?
            $personagens[] = new Personagem($STR,$CON,$DEX,$MAG,$nome,$subclasses[$subclasse],$pods,$armaEQ) :
            $personagens[1] = new Personagem($STR,$CON,$DEX,$MAG,$nome,$subclasses[$subclasse],$pods,$armaEQ)
            ; 
            
        break;
        

        case'remover personagem':
        case 2:
            do{
                system('clear');
                montarMenu(true);
                if(is_array($personagens)){
                    foreach($personagens as $key=>$perso){
                        print "[ID]- ".$key;
                        print"\n".$perso."\n---------\n";
                    }
                }
                $opValue = readline();
                if(is_array($personagens)){
                    if($opValue > 0 and $opValue <= count($personagens)){
                        array_splice($personagens,$opValue-1,1);
                        $personagemAtual = null;
                        $personagens = noZeroIndex($personagens);
                    }
                }
                if(!is_array($personagens)){
                    $personagemAtual = null;
                }
              }while($opValue != 0);    
        break;


        case 'listar personagens':
        case 3:
              do{
                system('clear');
                montarMenu(true);
                if(is_array($personagens)){
                    foreach($personagens as $key=>$perso){
                        print "[ID]- ".$key;
                        print"\n".$perso."\n---------\n";
                    }
                }
                $opValue = readline();
              }while($opValue != 0);  
        break;


        case 'escolher personagem':
        case 4:
            do{
                system('clear');
                montarMenu(true);
                if(is_array($personagens)){
                    foreach($personagens as $key=>$perso){
                        print "[ID]- ".$key;
                        print"\n".$perso."\n---------\n";
                    }
                }
                print "Personagem Usado no Momento: ".$personagemAtual."\n";
                $opValue = readline();
                if(is_array($personagens)){
                    if($opValue > 0 and $opValue <= count($personagens)){
                        $personagemAtual = $opValue;
                    }
                }
              }while($opValue != 0);  
        break;

        
        case 'tutorial':
        case 5:
            system('clear');
            if(!is_array($personagens) or $personagemAtual == null){
                montarMenu(false,"Você precisa ter um personagem escolhido para fazer o tutorial!");
                sleep(3);
                break;
            }
            montarMenu(false,"Bem Vindo ao tutorial!Aqui é onde irei explicar como o seu personagem funciona!");
            readline();
            system('clear');
            montarMenu(false,"Irei Começar explicando seus stats!");
            readline();
            system('clear');
            montarMenu(false,"Essa é sua constituição!A sua constituição aumenta as suas CHANCES de ter um HP alto!(não é garantido)");
            print"[CON]- ".$personagens[$personagemAtual]->getCON()."\n[Pontos de Vida Máximos]- ".$personagens[$personagemAtual]->getMaxHP()."\n";
            readline();
            system('clear');
            montarMenu(false,"Essa é sua destreza!A sua destreza aumenta as chances de você se conseguir de defender de um Ataque!");
            print"[DEX]- ".$personagens[$personagemAtual]->getDEX();
            readline();
            system('clear');
            montarMenu(false,"Esses status são os stats que suas habilidades usam!Isso significa que quanto maior um desses stats, mais potente a habilidade que usa ele será!");
            print"[STR]- ".$personagens[$personagemAtual]->getSTR().
            "\n[DEX]- ".$personagens[$personagemAtual]->getDEX()."\n[MAG]- ".$personagens[$personagemAtual]->getMAG();
            readline();
            system('clear');
            montarMenu(false,"Esse é um Poder! Os seus poderes tem nomes,Força máxima, um Stat e uma função.");
            print array_values($personagens[$personagemAtual]->getPoderes())[1]->getDescricao()." ~ " //array__values retorna o array com os indices normais(0,1,2,3...)
            .array_values($personagens[$personagemAtual]->getPoderes())[1]->getMaxForca()." de Força máxima ~ "
            .array_values($personagens[$personagemAtual]->getPoderes())[1]->getTipoStat()." é o Stat dessa habilidade ~ "
            .array_values($personagens[$personagemAtual]->getPoderes())[1]->getTipoSkill()." é oque essa habilidade faz.";
            readline();
            system('clear');
            montarMenu(false,"Uma arma que seu Personagem utilizar pode ter seu próprio Poder!Um exemplo seria um Cajado de Fogo que tem um Poder de Bola de Fogo!");
            readline();
            system('clear');
            montarMenu(false,"O seu Personagem tem Classes e SubClasses, e essas duas ".'"coisas"'." são oque definem quais habilidades estão disponiveis para você escolher!");
            print "[SubClasse]- ".$personagens[$personagemAtual]->getClasse()->getNome()
            ."\n[Classe]- ".$personagens[$personagemAtual]->getClasse()->getDescricao()."\n";
            readline();
            system('clear');
            print'Cabou ◉‿◉';
            readline();
        break;

        case 'batalhar':
        case 6:
            if(!is_array($personagens) or $personagemAtual == null){
                system('clear');
                montarMenu(false,"Você precisa ter um personagem escolhido para fazer uma Batalha!");
                sleep(3);
                break;  
            }
            do{
                system('clear');
                montarMenu(true);
                foreach($personagens as $key=>$perso){
                    if($key != $personagemAtual){
                        print "[ID]- ".$key;
                        print"\n".$perso."\n---------\n";
                    }
                }
                print "Escolha o ID do personagem que você quer lutar contra!\n";
                $opValue = readline();
                if($opValue != $personagemAtual){
                    foreach($personagens as $key => $pers){
                        if($opValue == $key){
                            batalhar($personagens[$personagemAtual],$pers);
                            
                            break 2;
                        }
                    }
                }
            }while($opValue != 0);
        break;


        case 'sair':
        case 0:  
        break 2;
        
        default:
            
        break;
    }
}















function mudarStat(string &$string){//retorna os stats na ordem correta
    $string == 'STR'? $string = 'CON':($string == 'CON'? $string = 'DEX':($string == 'DEX'? $string = 'MAG':$string = null));
}
function OrganizeObjectArray(array $array,string $metodo){//organiza os indices com os resultado de um método
    $actualArray = [];
    foreach($array as $key => $value) {
        $actualArray[$value->$metodo()] = $value;
    }
    return $actualArray;
}
function returnArrayMethod(array $array,string $metodo){//retorno um array com os resultados de um método compartilhado por objetos em um array
    $actualArray = [];
    foreach($array as $key => $value){
        $actualArray[] = $value->$metodo();
    }
    return $actualArray;
}
function noZeroIndex(array $array){//não deixa um array ter indice 0
    $actualArray = null;
    foreach($array as $key => $value){
        $actualArray[$key+1] = $value;
    }
    return $actualArray;
}
function batalhar(Personagem $perPlayer,Personagem $perEnemy){//nome auto-descritivo
    while($perPlayer->getHP() > 0 and $perEnemy->getHP() > 0){
        system('clear');
        montarMenu(false,'Habilidades','Analisar Inimigo','Analisar a si mesmo');
        print"+++INIMIGO+++\n"
        ."[Nome]- ".$perEnemy->getNome()
        ."\n[VIDA]- ".$perEnemy->getHP()."/".$perEnemy->getMaxHP()
        ."\n+++++++++++++\n+++JOGADOR+++\n"
        ."[Nome]- ".$perPlayer->getNome()
        ."\n[VIDA]- ".$perPlayer->getHP()."/".$perPlayer->getMaxHP()."\n+++++++++++++\n";
        $opValue = readline();
        switch(strtolower($opValue)){
            case 'habilidades':
            case 1:
                while($perPlayer->getHP() > 0 and $perEnemy->getHP() > 0){
                    
                    system('clear');
                    arrayMenu(true,returnArrayMethod($perPlayer->getAllPoderes(),'getExplicacao'));
                    print"AVISO!Você precisa escrever o nome da habilidade!(não é case-sensitive)\n";
                    $opValue = readline();
                    $opValue = strtolower(clearString($opValue));
                    switch($opValue){
                        case 'sair':
                        case 0:
                        break 2;
                        
                        default:
                            foreach($perPlayer->getAllPoderes() as $key=>$poder){
                                if($opValue == strtolower(clearString($poder->getDescricao()))){
                                    system('clear');
                                    print"Você vai usar a habilidade ".$poder->getDescricao()." em quem?\n1-Jogador\n2-Inimigo\n";
                                    do{
                                        $opValue = readline();
                                    }while($opValue != 1 and $opValue != 2);
                                    $targetSkill = ($opValue == 1 ? $perPlayer : $perEnemy);
                                    $skillChosen = $poder->getDescricao();
                                    $defesaBool = rand(0,1);
                                    $forcaPoder = $perPlayer->usarPoder($skillChosen,$targetSkill,$defesaBool);
                                    system('clear');
                                    if($poder->getTipoSkill() == 'Curar'){
                                        print"Você utilizou a Habilidade ".$poder->getDescricao()." no alvo ".$targetSkill->getNome()." e curou ".$forcaPoder." Pontos de vida!";
                                    }else{
                                        $defesaBool == 1 ? 
                                        print"Você utilizou a Habilidade ".$poder->getDescricao()." no alvo ".$targetSkill->getNome().
                                        " e ele perdeu ".$forcaPoder[1]." Pontos de vida!\n"
                                        ."[DanoReal]- ".$forcaPoder[0]."|[DanoComDefesa]- ".$forcaPoder[1]:
                                        print"Você utilizou a Habilidade ".$poder->getDescricao()." no alvo ".$targetSkill->getNome()." e ele perdeu ".$forcaPoder[0]." Pontos de vida!";
                                    }

                                    
                                    readline();
                                    if($targetSkill->getHP() <= 0){
                                        break 2;
                                    }
                                    system('clear');
                                    print"+++TURNO DO INIMIGO+++";
                                    sleep(2);
                                    system('clear');
                                    $lastPoderEnemy = count($perEnemy->getAllPoderes());
                                    $podsEnemy = array_values($perEnemy->getAllPoderes());
                                    $chosenPoderEnemy = $podsEnemy[rand(0,$lastPoderEnemy-1)];
                                    
                                    if($chosenPoderEnemy->getTipoSkill() == 'Atacar'){//AVISO!o ataque tá dento dos print kkkk
                                        do{
                                            print"Você quer tentar se defender do ataque do Inimigo?\n1-SIM\n2-NÃO\n";
                                            $opValue = readline();
                                            $defesaBool = $opValue == 1;
                                        }while($opValue != 1 and $opValue != 2);
                                        system('clear');
                                        if($defesaBool){
                                            $enAtt = $perEnemy->usarPoder($chosenPoderEnemy->getDescricao(),$perPlayer,$defesaBool);
                                            print "O Inimigo utilizou a Habilidade ".$chosenPoderEnemy->getDescricao()." no alvo ".$perPlayer->getNome().
                                            " e ele perdeu ".$enAtt[1]." Pontos de Vida!\n"
                                            ."[DanoReal]- ".$enAtt[0]."|[DanoComDefesa]- ".$enAtt[1];
                                        }else{
                                            print "O Inimigo utilizou a Habilidade ".$chosenPoderEnemy->getDescricao()." no alvo ".$perPlayer->getNome().
                                            " e ele perdeu ".$perEnemy->usarPoder($chosenPoderEnemy->getDescricao(),$perPlayer,$defesaBool)[0]." Pontos de Vida!";
                                        }   
                                    }else{
                                        $defesaBool = false;
                                        print "O Inimigo utilizou a Habilidade ".$chosenPoderEnemy->getDescricao()." no alvo ".$perEnemy->getNome().
                                        " e curou ".$perEnemy->usarPoder($chosenPoderEnemy->getDescricao(),$perEnemy,$defesaBool)." Pontos de Vida!";
                                    }
                                    readline();
                                    break 3;
                                }
                            }    
                        
                    }
                }

            break;
            

            case 'analisar inimigo':
            case 2:
                do{
                    system('clear');
                    montarMenu(true);
                    print $perEnemy."\n----------\n";
                }while(readline() != 0);
            break;


            case 'analisar a si mesmo':
            case 3:
                do{
                    system('clear');
                    montarMenu(true);
                    print $perPlayer."\n----------\n";
                    
                }while(readline() != 0);
            break;


            default:    
            break;
        }

    }
    system('clear');
    if($perEnemy->getHP() <= 0){
        print"PARABÉNS!Você ganhou a luta contra ".$perEnemy->getNome()."!";
    }elseif($perPlayer->getHP() <= 0){
        print"Não foi hoje...Você perdeu a luta contra ".$perEnemy->getNome().".";
    }
    readline();
    $perPlayer->setHP($perPlayer->getMaxHP());
    $perEnemy->setHP($perEnemy->getMaxHP());



}




