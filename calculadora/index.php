<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Calculadora</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    
    <style>
    
    .btn {
        height: 100%;
        width: 100%;
    }

    .tbGeral{
      color: white;
      border-collapse: collapse;
      height: 100%;
    }

    .colunaTab{
      border: 0px;
      width: 100px;
      height: 68px;     
    }

    #total {
        width: 98%;
        height: 100%;
        font-size: 100%;
        text-align: right;
    }

    </style>
</head>
<body>

    <?php
        require('./libs/operadores.class.php');
    ?>



<div id="calculator">
        <form method="POST">
            <table style="border: 1px solid black" class="tbGeral">
                <tr>
                    <td colspan="4" class="colunaTab"><input value="<?=$itotal?>" type="text" name="total" id="total"/></td>
                <tr>
                <tr>
                    <td class="colunaTab"><input type="submit" name="botao" value="C" class="btn"></td>
                    <td class="colunaTab"><button class="btn" disabled></button></td>
                    <td class="colunaTab"><button class="btn" disabled></button></td>
                    <td class="colunaTab"><input type="submit" name="botao" value="/" class="btn"></td>
                </tr>
                <tr>
                    <td class="colunaTab"><input type="submit" value="7" name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="8" name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="9" name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="x" name="botao" class="btn"></td>
                </tr>
                <tr>
                    <td class="colunaTab"><input type="submit" value="4" name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="5" name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="6" name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="-" name="botao" class="btn"></td>
                </tr>
                <tr>
                    <td class="colunaTab"><input type="submit" value="1" name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="2" name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="3" name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="+" name="botao" class="btn"></td>
                </tr>
                <tr>
                    <td class="colunaTab" colspan="2"><input type="submit" value="0" name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="," name="botao" class="btn"></td>
                    <td class="colunaTab"><input type="submit" value="=" name="botao" class="btn"></td>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>