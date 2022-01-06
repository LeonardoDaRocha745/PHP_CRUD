<?php 
include('conexao.php');
$sql_clientes =  "SELECT * FROM clientes";
$query_clientes = $mysqli ->query($sql_clientes) or die ($mysqli->error);
$num_clientes = $query_clientes->num_rows;
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
    
<h1>Lista de clientes</h1>
<p>Esses são os usúarios cadastrados</p>
<table class="table table-striped table-dark">
  <thead>
<?php
      $telefone = "";
      if(!empty($clientes['telefone'])){

      }
?>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Data</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php
      while($clientes = $query_clientes -> fetch_assoc()){
    
      ?>
    <tr>

      <td><?php echo $clientes ['id']; ?></td>
      <td><?php echo $clientes ['nome']; ?></td>
      <td><?php echo $clientes ['email']; ?></td>
      <td><?php echo $clientes ['telefone']; ?></td>
      <td><?php echo $clientes ['datanascimento']; ?></td>
      <td><?php echo $clientes ['datacadastro']; ?></td>
      <td>
      <a style = "text-decoration:none; color:white"href="editar_cliente.php?id=<?php echo $clientes['id']; ?>">Editar</a>
      <a style = "text-decoration:none; color:white"href="remover_cliente.php?id=<?php echo $clientes['id']; ?>">Remover</a>
    </td>

    </tr>

    <?php
      }?>
    
  </tbody>
</table>


</body>
</html>