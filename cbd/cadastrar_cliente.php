
<?php 

function limpar_texto($str){ 
  return preg_replace("/[^0-9]/", "", $str); 
}


if(count($_POST)> 0){
  include('conexao.php');

  $nome = $_POST['nome'];
  $email = $_POST ['email'];
  $telefone = $_POST ['telefone'];
  $nascimento = $_POST ['nascimento'];
  $validacao = false;

if(empty($nome)){
?> <h1 style ="color:red"> Preencha o nome por favor</h1><?php
}else if(empty($email)){
?><h1 style ="color:red"> Preencha o email por favor</h1><?php
}else if(!empty($telefone)){
    $telefone = limpar_texto($telefone);
    if(strlen($telefone)!= 11){
      ?> <p style ="color:red"> O telefone deve ser preenchido no padrão (11)992185462</p><?php
    }else{
    $validacao = true;
    }
  }
if(!empty($nome && $email && $telefone && $nascimento )&& $validacao == true){
  
    $sql_code = "INSERT INTO clientes(nome, email,datanascimento,telefone,datacadastro)
    VALUES ('$nome','$email','$nascimento','$telefone',NOW())
    ";
    $deu_certo = $mysqli->query($sql_code) or die ($mysqli->error);

    if($deu_certo){
      echo "<p>Cliente cadastrado com sucesso!</p>";
    }



}


  
}

/*if(!empty($nascimento)){
  //explode vai explodir o array em pedaçoes usando com referencia o '/'
  //array (26,08,2000)e o array reverse vai inverter o array da data para ficar no padrão br
  //implode vai ser a função que vai formatar a data com "-"
  $pedacoes = implode("-" ,array_reverse(explode('/',$nascimento)));

}*/


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


<form action="" method="POST">

<div class="form-group">
    <label for="formGroupExampleInput">Nome</label>
    <input type="text" name="nome" class="form-control" id="formGroupExampleInput" placeholder="Nome">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput">Email</label>
    <input type="text" name="email" class="form-control" id="formGroupExampleInput" placeholder="Nome">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Telefone</label>
    <input type="text" name="telefone" class="form-control" id="formGroupExampleInput2" placeholder="Telefone">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Data</label>
    <input type="date" name="nascimento" class="form-control" id="formGroupExampleInput" placeholder="Data de Nascimento">
  </div>
  
<br>
  <button type="submit" class="btn btn-success">Enviar dados</button>
  <button type="submit" action="index.php" class="btn btn-primary">Ver dados</button>


</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
</body>
</html>

