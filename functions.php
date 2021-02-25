<?php 

session_start();
require_once("Chave\ControllerChave.php");
require_once("Setor\ContollerSetor.php");
require_once("Funcionario\ControllerFuncionario.php");
require_once("ChaveFuncionario\ControllerChaveFuncionario.php");
header('Content-Type: application/json');

$dados = file_get_contents("php://input");

$dados = json_decode($dados, true);

$controle = $dados['controle'];

if (isset($controle) && $controle != 0) {
    switch ($controle) {
        case "1":
            $numero_sala = $dados['cadastrar_numero_sala'];
            $nome_sala = $dados['cadastrar_nome_sala'];

            if (isset($numero_sala) || $numero_sala != '' || isset($nome_sala) || $nome_sala != '') {
                $resultado = new ControlChave($numero_sala, $nome_sala);
                $resultado = $resultado->inserirChave();
        
                if ($resultado) {
                    echo $resultado;
                } else {
                    echo "false";
                }
            }
            break;
        case "2":
            $resultado = new ControlChave();
            $resultado = $resultado->listarChave();

            $resultado2 = new ControlFuncionario();
            $resultado2 = $resultado2->listarFuncionario();

            $array = array($resultado, $resultado2);
            echo json_encode($array);
            break;
        case "3":
            $resultado = new ControlSetor();
            $resultado = $resultado->listarSetores();
            echo json_encode($resultado);
            break;
        case "4":
            $nome_funcionario = $dados['nome_funcionario'];
            $setor_funcionario = $dados['setor_funcionario'];

            if (isset($nome_funcionario) || $nome_funcionario != '' || isset($setor_funcionario) || $setor_funcionario != '') {
                $resultado = new ControlFuncionario($nome_funcionario, $setor_funcionario);
                $resultado = $resultado->cadastrarFuncionario();
                if ($resultado) {
                    echo $resultado;
                } else {
                    echo false;
                }
            }
            break;
        case "5":
            $chave = $dados['chave'];
            $funcionario = $dados['funcionario'];
            $statusChave = 1;
            
            if (isset($chave) || $chave != '' || isset($funcionario) || $funcionario != '') {
                
                $controlChave = new ControlChave($chave, "", $statusChave);
                $resposta = $controlChave->verificarStatus();
                
                if ($resposta[0]["status"] == "0") {

                    $chave_funcionario = new ControlChaveFuncionario($chave, $funcionario);
                    $inserir = $chave_funcionario->emprestarChave();
                    
                    if ($inserir) {
                        $atualizarStatus = $controlChave->atualizarStatus();

                        if ($atualizarStatus) {
                            echo "Empréstimo de chave concluído com sucesso";
                        } else {
                            
                            echo false;        
                        }
                    }
                } else {
                    echo "Chave já foi emprestada ou não teve seu status atualizado após devolução";
                }
            } else {
                echo false;
            }
            break;
        case "6":
            
            $chave_funcionario = new ControlChaveFuncionario();
            $chave_funcionario = $chave_funcionario->procurarChavesEmprestadas();
            if ($chave_funcionario != false) {
                echo json_encode($chave_funcionario);
            } else {
                echo json_encode("vazio");
            }
            break;
        case "7":

            $chave = $dados['numero_chave'];
            
            if (isset($chave) || $chave != '' || isset($statusChave) || $statusChave != '') {
                
                $chave_funcionario = new ControlChaveFuncionario($chave);
                $controlChave = new ControlChave($chave);
    
                $chave_funcionario = $chave_funcionario->devolverChave();
    
                if ($chave_funcionario) {
                    
                    $resposta = $controlChave->verificarStatus();
                    echo json_encode($resposta);
                    if ($resposta[0]["status"] == "1") {
                        $atualizarStatus = $controlChave->atualizarStatus();
    
                        if ($atualizarStatus) {
                            echo "Devolução evetuada com sucesso";
                        } else {
                            echo false;
                        }
                    } else {
                        
                        echo "Chave não estava emprestada. Erro!";
                    }
                }
            } else {
                echo false;
            }

            break;
        default:
            echo "pfff";
            break;
    }
} else {
    echo "Não foi possível identificar a função desejada";
}



?>