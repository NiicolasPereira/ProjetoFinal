<?php

namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\DAO\JogadorDAO;
use APP\Utils\Redirect;
use APP\Model\Validation;
use APP\Model\Jogador;
use PDOException;

if (empty($_GET['operation'])) {
    Redirect::redirect(message: 'Nenhuma operação foi informada!!!', type: 'error');
}

switch ($_GET['operation']) {
    case 'insert':
        insertJogador();//pronto
        break;
    case 'list':
        listJogador();//pronto
        break;
    case 'delete':
        deleteJogador();//pronto
        break;
    case 'find':
        findJogador();
        break;
    case 'edit':
        editJogador();//pronto
        break;
    default:
        Redirect::redirect(message: 'Operação informada é inválida!!!', type: 'error');
}

function insertJogador()
{
    if (empty($_POST)) {
        Redirect::redirect(
            type: 'error',
            message: 'Requisição inválida!!!'
        );
    }

    $nome = $_POST["nome"];
    $nacionalidade = $_POST["nacionalidade"];
    $time = $_POST["time"];
    $idade = $_POST["idade"];
    $numero_camisa = $_POST["numero_camisa"];
    $posicao = $_POST["posicao"];



    $error = array();

    if (!Validation::validateName($nome)) {
        array_push($error, 'O nome do jogador deve conter ao menos 2 caracteres!!');
    }

    if (!Validation::validateNumber($numero_camisa)) {
        array_push($error, 'O número da camisa vai de 1 à 99!!!');
    }


    if ($error) { // Se o array NÃO estiver vazio
        Redirect::redirect(
            message: $error,
            type: 'warning'
        );
    } else {
        $jogador = new Jogador(
            nome: $nome,
            nacionalidade: $nacionalidade,
            time: $time,
            idade: $idade,
            numero_camisa: $numero_camisa,
            posicao: $posicao
        );
        $dao = new JogadorDAO();
        try {
            $result = $dao->insert($jogador);
        } catch (PDOException $e) {
            Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!!', type: 'error');
            // Tratar de notificar a equipe
            // $e->getMessage();
        }
        if ($result)
            Redirect::redirect(
                message: 'Jogador cadastrado com sucesso!!!'
            );
        else
            Redirect::redirect(
                message: 'Não foi possível cadastrar o Jogador!!!',
                type: 'error'
            );
    }
}
function listJogador()
{
    $dao = new JogadorDAO();
    try {
        $jogador = $dao->findAll();
    } catch (PDOException $e) {
        Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!!', type: 'error');
    }
    session_start();
    if ($jogador) {
        $_SESSION['Lista_Jogador'] = $jogador;
        header("location:../View/Lista_Jogador.php");
    } else {
        Redirect::redirect(message: ['Não existem jogadores cadastrados no sistema!!!'], type: 'warning');
    }
}

function deleteJogador()
{
    $id = $_GET['code'];
    $dao = new JogadorDAO();
    try {
        $result = $dao->delete($id);
        if ($result) {
            Redirect::redirect(message: 'jogador removido com sucesso!!!');
        } else {
            Redirect::redirect(message: ['Não foi possível remover o jogador!!!'], type: 'warning');
        }
    } catch (PDOException $e) {
        Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!!', type: 'error');
    }
}

function findJogador()
{
    $id = $_GET['code'];
    $dao = new JogadorDAO();
    $data = $dao->findOne($id);
    if ($data) {
        session_start();
        $_SESSION['jogador_data'] = $data;
        header('location:../View/Editar_Jogador.php');
    } else {
        Redirect::redirect(message: 'jogador não localizado em nossa base de dados!!!');
    }
}

function editJogador()
{
    if (empty($_POST)) {
        Redirect::redirect(
            type: 'error',
            message: 'Requisição inválida!!!'
        );
    }

    $code = $_POST["code"];
    $nome = $_POST["nome"];
    $nacionalidade = $_POST["nacionalidade"];
    $time = $_POST["time"];
    $idade = $_POST["idade"];
    $numero_camisa = $_POST["numero_camisa"];
    $posicao = $_POST["posicao"];

    $error = array();

    if (!Validation::validateName($nome)) {
        array_push($error, 'O nome do jogador deve conter ao menos 2 caracteres!!');
    }

    if (!Validation::validateNumber($numero_camisa)) {
        array_push($error, 'O número da camisa vai de 1 à 99!!!');
    }

    if ($error) {
        Redirect::redirect(message: $error, type: 'warning');
    } else {
        $jogador = new Jogador(
            id:$code,
            nome: $nome,
            nacionalidade: $nacionalidade,
            time: $time,
            idade: $idade,
            numero_camisa: $numero_camisa,
            posicao: $posicao
        );
        $dao = new JogadorDAO();
        $result = $dao->update($jogador);
        if ($result) {
            Redirect::redirect(message: 'jogador atualizado com sucesso!!!');
        } else {
            Redirect::redirect(message: ['Não foi possível atualizar o jogador!!!'], type: 'warning');
        }
    }
}


?>