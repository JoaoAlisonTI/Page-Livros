<?php

if (isset( $_GET['busca'] ) ) {
  $pesquisa = $_GET['busca'];
} else {
  $pesquisa = '';
}

include_once('conexao.php');

$sql = "SELECT *  FROM livro 
                WHERE titulo LIKE '%$pesquisa%' 
                OR autor LIKE '%$pesquisa%'
                OR quantidade LIKE
                  '%$pesquisa%' ";
                  
$sqlCategoriaRomance = "SELECT *  FROM livro WHERE categoria = 'Romance'";

$dados = mysqli_query($mysqli, $sql);
$dadosSelectRomance = mysqli_query($mysqli, $sqlCategoriaRomance);
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8"/> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    
    <link rel="stylesheet" href="https://cdn.es.gov.br/fonts/font-awesome/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="./css/TelaLivros.css" type="text/css" media="all" />
    
    <title>Tela de Livros</title>
    
  </head>
  
  <body>

      <div class="div-verde"></div>
      <div class="div-amarelo"></div>
      
      <form class="div-search" action="" method="GET">
      <input name="busca" class="input-search" type="search" placeholder="Pesquisar ex: Livro..." />
      <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
      
      <select name="menuCategorias" id="categorias">
        <option value="Todos">Todos</option>
        <option value="Romance">Romance</option>
        <option value="Aventura">Aventura</option>
      </select>
      </form>
      
      
    <h1 class="categoria-title">Livros</h1>
    
    <div class="livros-list">
     <!-- Os Livros aparecem dentro da livros-list -->
      
      <?php
        $categorias = $_GET['menuCategorias'];
         if ($categorias === 'Todos') {
         
          while ($livro = mysqli_fetch_assoc($dados) ) {
          $livroTitulo = $livro['titulo'];
          $livroAutor = $livro['autor'];
          $livroQuantidade = $livro['quantidade'];
        ?>
        
        <div class='container-livro'>
          <div class='livro'>
          <p class='livro-titulo'><?php echo $livroTitulo ?></p>
          <p class='livro-autor'><?php echo $livroAutor ?></p>
          </div>
          <div class='span'>
          <p class='disponivel'>Disponível</p>
          <p class='livro-quantidade'><?php echo $livroQuantidade ?></p>
          </div>
          </div>
          
        <?php
        }}
          $categorias = $_GET['menuCategorias'];
          if ($categorias === 'Romance') {
          while ($livrosRomance = mysqli_fetch_assoc($dadosSelectRomance) ) {
            
            $livroTitulo = $livrosRomance['titulo'];
            $livroAutor = $livrosRomance['autor'];
            $livroQuantidade = $livrosRomance['quantidade'];
          ?>
          <div class='container-livro'>
          <div class='livro'>
          <p class='livro-titulo'><?php echo $livroTitulo ?></p>
          <p class='livro-autor'><?php echo $livroAutor ?></p>
          </div>
          <div class='span'>
          <p class='disponivel'>Disponível</p>
          <p class='livro-quantidade'><?php echo $livroQuantidade ?></p>
          </div>
          </div>
        <?php
        }}
        ?>
      
          
     
    </div>
    
    <div class="footer">
    <div class="div-cadastrar">
    <button class="btn-cadastrarLivro" type="submit"><i class="fa fa-solid fa-folder-open" id="icon-1">Cadastrar Livro</i></button>
    </div>
    <button class="btn-sair" type="submit"><img src="./assets/icon-sair.png" id="icon-2" />Sair</button>  

    </div>
    
   <script src="js/index.js" type="text/javascript" charset="utf-8"></script>
  </body>
</html>