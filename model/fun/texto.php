<?php










function contemAcento($string){
    $qtdAc = 0;
    $iLen = strlen($string);
    $acentos = [
        'á','à','ã','â','Á','À','Ã','Â',
        'é','è','ẽ','ê','É','È','Ẽ','Ê',
        'í','ì','ĩ','î','Í','Ì','Ĩ','Î',
        'ó','ò','õ','ô','Ó','Ò','Õ','Ô',
        'ú','ù','ũ','û','Ú','Ù','Ũ','Û',
        '´','`','~','^','ç'
    ];
    // print_r($acentos);
    for($i=0; $i < $iLen; $i++){ 
        $stringArray[] = substr($string,$i,2);
    }
    // print_r($stringArray);
    foreach($stringArray as $key => $stringV){
        foreach($acentos as $acento){
            if($stringV == $acento){
                $qtdAc++;
            }
        }
    }
    return $qtdAc;
}

function validCharac($string){
    $strLen = strlen($string);
    // print $strLen;
    $valid = 0;
    $string = strtolower($string);
    $texto = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'
             ,' ',',','.',':',';','?','<','>','!','$','#','*','(',')','¨','%','@','"',"'",'[',']','|','/','{','}','\\'
             ,'0','1','2','3','4','5','6','7','8','9','+','-','ç','_','='];
    foreach($texto as $key => $value) {
        if(str_contains($string,$value)){
            $valid += repeatCharac($string,$value);
        }
    }
    if($acentos = contemAcento($string)){
        $valid += $acentos*2;
    }
    // print "\n".$valid;
    if($valid == $strLen and $strLen > 0){
        return true;
    }else{
        return false;
    }
}

// print "\n".validCharac('´~');



function removerAcento(string $string){
    $iLen = strlen($string);
    $actualString = '';
    $acentos = [
        ['á','à','ã','â'],['Á','À','Ã','Â'],
        ['é','è','ẽ','ê'],['É','È','Ẽ','Ê'],
        ['í','ì','ĩ','î'],['Í','Ì','Ĩ','Î'],
        ['ó','ò','õ','ô'],['Ó','Ò','Õ','Ô'],
        ['ú','ù','ũ','û'],['Ú','Ù','Ũ','Û']
    ];
    $actualStringArray = [];
    for($i=0; $i < $iLen; $i++){ 
        $stringCharac = substr($string,$i,2);
        $stringArray[$i] = substr($string,$i,1);
        if(validCharac($stringArray[$i])){
            $actualStringArray[$i] = $stringArray[$i]; 
        }
        foreach($acentos as $key => $acentoGrupo){
            foreach($acentoGrupo as $acento){
                if($stringCharac == $acento){
                    $letraModificada = null;
                    switch($key){
                        case 0:
                            $letraModificada = 'a';
                        break;
                            
                        case 1:
                            $letraModificada = 'A';
                        break;
                                
                        case 2:
                            $letraModificada = 'e';
                        break;
                                    
                        case 3:
                            $letraModificada = 'E';
                        break;
                                        
                        case 4:
                            $letraModificada = 'i';
                        break;
                                            
                        case 5:
                            $letraModificada = 'I';
                        break;
                                                
                        case 6:
                            $letraModificada = 'o';
                        break;
                                                    
                        case 7:
                            $letraModificada = 'O';
                        break;
                                                        
                        case 8:
                            $letraModificada = 'u';
                        break;
                                                            
                        case 9:
                            $letraModificada = 'U';
                        break;
                                                                
                        default:
                        break;
                    }
                    $actualStringArray[$i] = $letraModificada;
                }
                                                        
            }
        }
        
        
    }
    
    foreach($actualStringArray as $key=>$digit){
        $actualString .= $digit;
    }


    return $actualString;
}

function repeatCharac(string $string,$oi){
    $strLen = strlen($string);
    $strArray = [];
    $repeats = 0;
    for($i=0; $i < $strLen; $i++){ 
        $strArray[] = substr($string,$i,1);
    }
    // print_r($strArray);
    foreach($strArray as $key=>$strValue){
        $strValue == $oi ? $repeats++ : null;
    }

    return $repeats;
}
function removerEspacos(string $string){
    $strLen = strlen($string);
    $strArray = [];
    $actualString = null;
    for($i=0; $i < $strLen; $i++){ 
        $strArray[] = substr($string,$i,1);
    }
    foreach($strArray as $key => $strValue){
        $strValue == ' ' ? $actualString .= '_' : $actualString .= $strValue;
    }
    return $actualString;
}
function clearString(string $string){
    $string = removerAcento($string);
    $string = removerEspacos($string);

    return $string;
}
