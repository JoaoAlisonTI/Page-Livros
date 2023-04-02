
<!--

if (isset( $_POST['nome'] ) ) {

    $nome = $_POST['nome'];

} else {

   $nome = '';

}

include_once('conexao.php');

/*seleciona a tabela livros dentro do banco de dados biblioteca_bd*/
$sql = "SELECT *  FROM biblioteca_bd WHERE livros LIKE '%$nome%' ";

$dados = mysqli_query($conexao, $sql);


?>
-->
<?php

include('conexao.php');

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
      
      <form class="div-search" action="">
      <input name="busca" class="input-search" type="search" placeholder="Pesquisar ex: Livro..." value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" />
      <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
      </form>
 
      
    <h1 class="categoria-title">Romance</h1>
    
    <div class="livros-list">
     <!-- Os Livros aparecem dentro da livros-list -->
     <?php
      if (!isset($_GET['busca'])) {
        ?>
        
        <?php
        }
        else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * 
                FROM livro 
                WHERE titulo LIKE '%$pesquisa%' 
                OR autor LIKE '%$pesquisa%'
                OR categoria LIKE '%$pesquisa%'
                OR quantidade LIKE
                  '%$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
              while($dados = $sql_query->fetch_assoc()) {
                ?>
               
               <div class="container-livro">
                <div class="livro">
                <p class="livro-titulo"> <?php echo $dados[titulo]; ?></p>
                <p class="livro-autor"><?php echo $dados[titulo]; ?></p>
                </div>
                <div class="span">
                <p class="disponivel">Disponível</p>
                <p class="livro-quantidade"><?php echo $dados[titulo]; ?></p>
                </div>
              </div>
             <?php
            }
            ?>
        <?php
        }
     ?>
     
     
      <div class="container-livro">
        <div class="livro">
          <p class="livro-titulo">Dom Casmurro</p>
          <p class="livro-autor">Machado de Assis</p>
        </div>
        <div class="span">
          <p class="disponivel">Disponível</p>
          <p class="livro-quantidade">2</p>
        </div>
      </div>
      
      <div class="container-livro">
        <div class="livro">
          <p class="livro-titulo">A Culpa É das Estrelas</p>
          <p class="livro-autor">John Green</p>
        </div>
        <div class="span">
          <p class="disponivel">Disponível</p>
          <p class="livro-quantidade">0</p>
        </div>
      </div>
      
      <div class="container-livro">
        <div class="livro">
          <p class="livro-titulo">Madame Bovary</p>
          <p class="livro-autor">Gustave Flaubert</p>
        </div>
        <div class="span">
          <p class="disponivel">Disponível</p>
          <p class="livro-quantidade">1</p>
        </div>
      </div>
      
      
      
      <!--PHP para exibir o conteúdo
      
          while ($livro = mysqli_fetch_assoc($dados) ) {
          $livroTitulo = $livro['titulo'];
          $livroAutor = $livro['autor'];
          $livroCategoria = $livro['categoria'];
          $livroQuantidade = $livro['variavel_quantidade_no_BD'];
          
          echo "
          <div class="container-livro">
          <div class="livro">
          <p class="livro-titulo"> $livroTitulo </p>
          <p class="livro-autor"> $livroAutor </p>
          </div>
          <div class="span">
          <p class="disponivel">Disponível</p>
          <p class="livro-quantidade"> $livroQuantidade </p>
          </div>
          </div>
          "
          }
      ?>
      -->
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