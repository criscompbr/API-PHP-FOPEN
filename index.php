<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once "class/apiCliente.php";

$c = new cliente();

$utilize = 'Utilize o exemplo do url http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '?r=getCupons';
if(!isset($_GET['r'])){
  echo $utilize;
}else{
  echo "<pre>";
  switch ($_GET['r']) {
    
    // Cupons
    case 'getCupons':
      var_dump($c->API_Download('GET', 'cupons'));
      break;
    case 'putCupons':
      var_dump($c->API_Download('PUT', 'cupons', [
        'cupom' => 123456
      ]));
      break;
    
    // Franqueados
    case 'getFranqueados':
      var_dump($c->API_Download('GET', 'franqueados'));
      break;
    case 'putFranqueados':
      var_dump($c->API_Download('PUT', 'franqueados', [
        'id' => 145,
        'ativo' => 1
      ]));
      break;
    
    // Premios
    case 'getPremios':
      var_dump($c->API_Download('GET', 'premios'));
      break;
    case 'putPremios':
      var_dump($c->API_Download('PUT', 'premios', [
        'id' => 145,
        'estoque' => 1
      ]));
      break;
    case 'deletePremios':
      var_dump($c->API_Download('DELETE', 'premios', [
        'id' => 145
      ]));
      break;

    // Categorias
    case 'getCategorias':
      var_dump($c->API_Download('GET', 'categorias'));
      break;
    case 'postCategorias':
      var_dump($c->API_Download('POST', 'categorias', [
        'descricao' => ''
      ]));
      break;
    case 'putCategorias':
      var_dump($c->API_Download('PUT', 'categorias', [
        'id' => 145,
        'descricao' => ''
      ]));
      break;
    case 'deleteCategorias':
      var_dump($c->API_Download('DELETE', 'categorias', [
        'id' => 145,
      ]));
      break;

    // Usuários
    case 'getUsuarios':
      var_dump($c->API_Download('GET', 'usuarios'));
      break;
    case 'postUsuarios':
      var_dump($c->API_Download('POST', 'usuarios', [
        'nome' => 'Cliente',
        'cpf' => '',
        'email' => 'cliente@gmail.com',
        'telefone' => 5112345678,
        'senha' => 12345
      ]));
      break;
    case 'putUsuarios':
      var_dump($c->API_Download('PUT', 'usuarios', [
        'cpf' => '',
        'ativo' => 1
      ]));
      break;
 
    // Cupons
    case 'getPontos':
      var_dump($c->API_Download('GET', 'pontos'));
      break;
    case 'postPontos':
      var_dump($c->API_Download('POST', 'pontos', [
        'cpf' => '',
        'quantidade' => 1,
        'observacao' => ''
      ]));
      break;

    // Retorna link invalido
    default:
      echo $utilize;
  }
}