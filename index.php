<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    #tradu {
      margin-bottom: 20px;
    }

    #result-container {
      display: flex;
      justify-content: center;
    }

    #result-container table {
      width: 600px;
      border: 1px solid black;
    }

    #result-container th,
    #result-container td {
      padding: 10px;
      text-align: left;
    }

    #result-container tr:not(:first-child) {
      border-top: 1px solid black;
    }

    #result-container tr.middle-row {
      border-bottom: 1px solid black;
    }

    #search-bar p#search-text{
      text-align: center;
      margin-bottom: 10px;
    }

  </style>
</head>
<body>
  <div id="tradu" class="styles">
    <a href="pagina_inicial.html">Início</a>
    <a href="Dicionario.html">Dicionário</a>
    <a href="cultura.html">Cultura</a>
  </div>

  <div id="search-bar" class="styles">
    <form action="">
      <select name="idioma">
        <option value="linguagem_indigena">Linguagem indígena</option>
        <option value="lingua_portuguesa">Língua portuguesa</option>
      </select>
      <input name="busca" placeholder="Digite a palavra" type="text">
      <button type="submit">Pesquisar</button>
    </form>
  </div>
  <div id="result-container" class="styles">
    <?php
    if (!isset($_GET['busca'])) {
    ?>
      <p>Digite algo para pesquisar.....</p>
    <?php
    } else {
      $pesquisa = $mysqli->real_escape_string($_GET['busca']);
      $idioma = $mysqli->real_escape_string($_GET['idioma']);

      if ($idioma == 'linguagem_indigena') {
        $column = 'palavra';
        $compare_column = 'significado';
      } else {
        $column = 'significado';
        $compare_column = 'palavra';
      }

      $sql_code = "SELECT *
      FROM dicionario 
      WHERE $column LIKE '%$pesquisa%' ";
      $sql_query = $mysqli->query($sql_code)  or die("Erro ao consultar! " . $mysqli->error);
      if ($sql_query->num_rows == 0) {
    ?>
        <p>Nenhum resultado encontrado.....</p>
      <?php
      } else {
        $num_rows = $sql_query->num_rows;
        $middle_row = ceil($num_rows / 2);
        $row_count = 0;
      ?>
        <table>
          <tr>
            <th>Palavra</th>
            <th>Tradução</th>
          </tr>
          <?php
          while ($dados = $sql_query->fetch_assoc()) {
            $row_count++;
          ?>
              <?php
    if ($idioma == 'linguagem_indigena') {
    ?>
            <tr>
              <td style="text-align: left;"><?php echo $dados[$column];; ?></td>
              <td style="text-align: left;"><?php echo $dados[$compare_column]; ?></td>
            </tr>
            <?php if ($row_count === $middle_row) { ?>
              <tr class="middle-row">
                <td colspan="2" style="border-bottom: 1px solid black;"></td>
              </tr>
            <?php }?>
            <tr>
              <td colspan="2" style="border-bottom: 1px solid black;"></td>
            </tr>
          <?php
          }else{
            ?>
            <tr>
              <td style="text-align: left;"><?php echo $dados[$column]; ?></td>
              <td style="text-align: left;"><?php echo $dados[$compare_column]; ?></td>
            </tr>
            <?php if ($row_count === $middle_row) { ?>
              <tr class="middle-row">
                <td colspan="2" style="border-bottom: 1px solid black;"></td>
              </tr>
            <?php }?>
            <tr>
              <td colspan="2" style="border-bottom: 1px solid black;"></td>
            </tr>
          <?php
          }}
          ?>
        </table>
      <?php
      }
    }
    ?>
  </div>

</body>
</html>
