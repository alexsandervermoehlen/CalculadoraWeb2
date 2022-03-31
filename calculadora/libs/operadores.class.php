<?php 
        session_start();
        $itotal = 0;

        $_SESSION['calculadora'] = $_SESSION['calculadora'] . $_POST[ 'botao'];  

        $bConcatena = true;
        $sPC = substr($_SESSION['calculadora'], 0, 1);
        $bPrimeiroCharIsOperador = isCharOperador($sPC);

     
        if ($bPrimeiroCharIsOperador || $_POST[ 'botao'] == '=') {
            $bConcatena = false;
        }

        
        $sUltimoCaractereDigitado = $_POST['botao'];
        $iTotalChar = strlen($_SESSION['calculadora']);

        if($iTotalChar > 1) {
            $bPenultimoCharOperador = isCharOperador($_SESSION['calculadora'][$iTotalChar-2]);
            $bUltimoCharOperador = isCharOperador($_SESSION['calculadora'][$iTotalChar-1]);
            
            if($bPenultimoCharOperador && $bUltimoCharOperador) {
                //remove o penultimo caractere e concatena o último botão clicado (operador);
                $sNovaString = substr($_SESSION['calculadora'],0,-2);
                $_SESSION['calculadora'] = $sNovaString . $sUltimoCaractereDigitado;
            }
        }
            
        if($bConcatena) {
            if($_POST['botao'] !== 'C') {
                $itotal = $_SESSION['calculadora'];    
            }
        }


        switch ($_POST['botao']) {
            case 'C':
                $_SESSION['calculadora'] = '';
                session_destroy();
                break;
            case '=':
                global $itotal;
                $itotal = number_format(resultado(),2,",",".");
                $_SESSION['calculadora'] = resultado();
                break;
        }
        
        function isCharOperador($sChar) {
            return $sChar == '/' || $sChar == 'x' || $sChar == '-' || $sChar == '+' || $sChar == ',' || $sChar == '=';
        }

        function isCharOperadorMatematico($sChar) {
            return $sChar == '/' || $sChar == 'x' || $sChar == '-' || $sChar == '+';
        }

        function resultado() {
            $aArray = tratamentoString();
            
            $aArray = realizaCalculo($aArray, 'x');
            $aArray = realizaCalculo($aArray, '/');
            $aArray = realizaCalculo($aArray, '-');
            $aArray = realizaCalculo($aArray, '+');

            return $aArray[0];
        }    

        function tratamentoString() {
            $sString = $_SESSION['calculadora'];
            $iTotal = strlen($sString);

            for ($i=0; $i < $iTotal ; $i++) { 
                if($sString[$i] == ',') {
                    $sString[$i] = '.';
                }
            }

            if(isCharOperador($sString[strlen($sString)-1])) {
                $sString = substr($sString, 0,-1);
            } 
            
            preg_match_all('#([0-9.]+|[+-/x])#', $sString, $aMatches);

            return $aMatches[1];
        }

        function realizaCalculo($aArray, $sOperador) {
            $bContinuaCalculo = false;

            do {
                foreach ($aArray as $key => $value) {
                    if($value == $sOperador) {
                        $bContinuaCalculo = true;
                        $iAnt = $aArray[$key-1];
                        $iPos = $aArray[$key+1];
                        switch ($sOperador) {
                            case 'x':
                                $aArray[$key] = $iAnt * $iPos;
                                break;
                            case '/':
                                $aArray[$key] = $iAnt / $iPos;
                                break;
                            case '+':
                                $aArray[$key] = $iAnt + $iPos;
                                break;
                            case '-':
                                $aArray[$key] = $iAnt - $iPos;
                                break;
                        }

                        unset($aArray[$key-1]);
                        unset($aArray[$key+1]);
                    } else {
                        $bContinuaCalculo = false;
                    }
                }
            } while($bContinuaCalculo);
       
            $aNewArray = reoordenaArray($aArray);

            return $aNewArray;
        }

        function reoordenaArray($aArray) {
            $aNewArray = [];
            foreach($aArray as $key => $value) {
                $aNewArray[] = $value;
            }

            return $aNewArray;
        }

        
    ?>