<?php
require_once 'texto.php';








function arrayMenu(bool $sair = true,array $itens){
    array_unshift($itens,"Sair");
    $sizeTab = strlen($itens[0]);
    foreach($itens as $item){
        $aSize =strlen($item);
        if($sizeTab < $aSize){
            $sizeTab = $aSize;
        }
    }
    $sizeTab += 3; 
    $sizeInte = $sizeTab+3;
    print str_repeat("=",$sizeInte)."\n";
    
    $qtdItens = count($itens);
    for($i = 1;$i < $qtdItens;$i++){
        print "[$i-".$itens[$i].str_repeat(" ",$sizeTab - (strlen($itens[$i])+strlen($i))).str_repeat(" ",contemAcento($itens[$i]))."]\n";
        print str_repeat("=",$sizeInte)."\n";
    }
    if($sair){
        print "[0-".$itens[0].str_repeat(" ",$sizeTab - strlen($itens[0])-1)."]\n";
        print str_repeat("=",$sizeInte)."\n";
    }
}
function montarMenu(bool $sair = true,...$itens){

    array_unshift($itens,"Sair");
    $sizeTab = strlen($itens[0]);

    foreach($itens as $item){
        $aSize =strlen($item);
        if($sizeTab < $aSize){
            $sizeTab = $aSize;
        }
    }

    $sizeTab += 3; 
    $sizeInte = $sizeTab+3;
    print str_repeat("=",$sizeInte)."\n";
    
    $qtdItens = count($itens);
    for($i = 1;$i < $qtdItens;$i++){
        

        print "[$i-".$itens[$i].str_repeat(" ",$sizeTab - (strlen($itens[$i])+strlen($i))).str_repeat(" ",contemAcento($itens[$i]))."]\n";
        print str_repeat("=",$sizeInte)."\n";
        
    }
    if($sair){        
        print "[0-".$itens[0].str_repeat(" ",$sizeTab - strlen($itens[0])-1)."]\n";
        print str_repeat("=",$sizeInte)."\n";
    }

}