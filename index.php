<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once "class/apiCliente.php";

$c = new cliente();

if(!isset($_GET['r'])){
  echo ".....";
}else{
  echo "<pre>";
  switch ($_GET['r']) {
    
    // Cupons [GET: OK, PUT: OK]
    case 'getCupons':
      var_dump($c->API_Download('GET', 'cupons'));
      break;
    case 'putCupons':
      var_dump($c->API_Download('PUT', 'cupons', [
        'cupom' => 18011404292
      ]));
      break;
    
    // Franqueados [GET: OK, PUT: OK]
    case 'getFranqueados':
      var_dump($c->API_Download('GET', 'franqueados'));
      break;
    case 'putFranqueados':
      var_dump($c->API_Download('PUT', 'franqueados', [
        'id' => 318,
        'ativo' => 1
      ]));
      break;
    
    // Premios [GET: OK, PUT: OK, DELETE: OK]
    case 'getPremios':
      var_dump($c->API_Download('GET', 'premios'));
      break;
    case 'putPremios':
      var_dump($c->API_Download('PUT', 'premios', [
        'id' => 1078,
        'estoque' => 700
      ]));
      break;
    case 'deletePremios':
      var_dump($c->API_Download('DELETE', 'premios', [
        'id' => 1078
      ]));
      break;

    // Categorias [GET: OK, POST: OK, PUT: OK, DELETE: OK]
    case 'getCategorias':
      var_dump($c->API_Download('GET', 'categorias'));
      break;
    case 'postCategorias':
      var_dump($c->API_Download('POST', 'categorias', [
        'descricao' => 'PHP'
      ]));
      break;
    case 'putCategorias':
      var_dump($c->API_Download('PUT', 'categorias', [
        'id' => 2814,
        'descricao' => 'PHP 7.0'
      ]));
      break;
    case 'deleteCategorias':
      var_dump($c->API_Download('DELETE', 'categorias', [
        'id' => 2815,
      ]));
      break;

    // Usuários [GET: OK, POST: OK, PUT: OK]
    case 'getUsuarios':
      var_dump($c->API_Download('GET', 'usuarios'));
      break;
    case 'postUsuarios':
      var_dump($c->API_Download('POST', 'usuarios', [
        'nome' => 'Cliente API #3',
        'cpf' => 13167260025,
        'email' => 'cliente8@gmail.com',
        'telefone' => 5137141811,
        'senha' => 12345
      ]));
      break;
    case 'putUsuarios':
      var_dump($c->API_Download('PUT', 'usuarios', [
        'cpf' => '693.186.500-51',
        'ativo' => 1
      ]));
      break;
 
    // Cupons [GET: OK, POST: OK]
    case 'getPontos':
      var_dump($c->API_Download('GET', 'pontos'));
      break;
    case 'postPontos':
      var_dump($c->API_Download('POST', 'pontos', [
        'cpf' => 95662223009,
        'quantidade' => -1,
        'observacao' => "Devolve o 88 pq o PDF eh falso!!"
      ]));
      break;

    // Retorna link invalido
    default:
      echo "....";

  }
}