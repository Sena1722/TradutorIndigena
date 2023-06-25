<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema de Busca</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Dicionário de Palavras</h1>
        <form>
            <input id="busca" placeholder="Digite a palavra" type="text">
            <button type="button" onclick="buscarPalavra()">Pesquisar</button>
        </form>

        <table width="600px" border="1">
            <tr>
                <th>Palavra</th>
                <th>Significado</th>
            </tr>
            <tbody id="resultados">
                <tr>
                    <td colspan="2">Digite algo para pesquisar.....</td>
                </tr>
            </tbody>
        </table>

        <script>
            function buscarPalavra() {
                var palavra = document.getElementById('busca').value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("resultados").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "buscar.php?busca=" + palavra, true);
                xhttp.send();
            }
        </script>
    </body>
</html>
