<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Menu de Palavras</title>
</head>
<style>
   #menu{
    background-color: brown;
    height: 15%;
    width: 100%;
    position:fixed;
    top:0%;
    left: 0%;
   }

        #menu ul {
            list-style-type: none; /* Remove a estilização padrão da lista */
            padding: 0; /* Remove o espaçamento interno da lista */
            margin: 0; /* Remove o espaçamento externo da lista */
            margin-top: 2%;
        }

        #menu li {
            display: inline; /* Exibe os itens do menu em linha */
            margin-right: 15px; /* Espaçamento entre os itens do menu */
            top:5%;
        }

        #menu li a {
            color: #fff; /* Cor do texto dos itens do menu */
            text-decoration: none; /* Remove a decoração de link */
            padding: 10px; /* Espaçamento interno dos itens do menu */
        }

        /* Estilos do menu suspenso */
        #letra {
            display: inline-block; /* Exibe as opções do menu suspenso lado a lado */
            margin-right: 5px; /* Espaçamento entre as opções do menu suspenso */
        }

        #menuPalavras{
            margin-top: 10%;
            padding: 20px;
            width: 600px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 5px;
        }

        #search-box {
        text-align: center; /* Centraliza o conteúdo do elemento */
        margin-top: 1%;
        margin-bottom: 10px; /* Espaçamento inferior do elemento */
        }

        #search-box input[type="text"] {
        width: 200px; /* Largura da caixa de texto */
        margin-bottom: 10px; /* Espaçamento inferior da caixa de texto */
        }

</style>
<div id="menu">
<body>
    <form id="search-box">
        <input id="busca" placeholder="Digite a palavra" type="text">
        <button type="button" onclick="buscarPalavra()">Pesquisar</button>
    </form>
</body>
<ul id="ul">
            <li><a href="#" onclick="buscarPalavras('A')">A</a></li>
            <li><a href="#" onclick="buscarPalavras('B')">B</a></li>
            <li><a href="#" onclick="buscarPalavras('C')">C</a></li>
            <li><a href="#" onclick="buscarPalavras('D')">D</a></li>
            <li><a href="#" onclick="buscarPalavras('E')">E</a></li>
            <li><a href="#" onclick="buscarPalavras('F')">F</a></li>
            <li><a href="#" onclick="buscarPalavras('G')">G</a></li>
            <li><a href="#" onclick="buscarPalavras('H')">H</a></li>
            <li><a href="#" onclick="buscarPalavras('I')">I</a></li>
            <li><a href="#" onclick="buscarPalavras('J')">J</a></li>
            <li><a href="#" onclick="buscarPalavras('K')">K</a></li>
            <li><a href="#" onclick="buscarPalavras('L')">L</a></li>
            <li><a href="#" onclick="buscarPalavras('M')">M</a></li>
            <li><a href="#" onclick="buscarPalavras('N')">N</a></li>
            <li><a href="#" onclick="buscarPalavras('O')">O</a></li>
            <li><a href="#" onclick="buscarPalavras('P')">P</a></li>
            <li><a href="#" onclick="buscarPalavras('Q')">Q</a></li>
            <li><a href="#" onclick="buscarPalavras('R')">R</a></li>
            <li><a href="#" onclick="buscarPalavras('S')">S</a></li>
            <li><a href="#" onclick="buscarPalavras('T')">T</a></li>
            <li><a href="#" onclick="buscarPalavras('U')">U</a></li>
            <li><a href="#" onclick="buscarPalavras('V')">V</a></li>
            <li><a href="#" onclick="buscarPalavras('W')">W</a></li>
            <li><a href="#" onclick="buscarPalavras('X')">X</a></li>
            <li><a href="#" onclick="buscarPalavras('Y')">Y</a></li>
            <li><a href="#" onclick="buscarPalavras('Z')">Z</a></li>
        </ul>
<body>
    <form>
        <select id="letra" onchange="buscarPalavras(this.value)">
            <option value="">Selecione uma letra</option>
            <?php
            for ($i = 65; $i <= 90; $i++) {
                $letra = chr($i);
                echo "<option value='$letra'>$letra</option>";
            }
            ?>
        </select>
    </form>
    </div>

    <div id = "menuPalavras">
    <table id="resultado" width="600px" border="1">
        <tr>
            <th>Palavra</th>
            <th>Significado</th>
        </tr>
        <tbody id="resultados">
            <tr>
                <td colspan="2">Selecione uma letra para exibir as palavras correspondentes.</td>
            </tr>
        </tbody>
    </table>
    </div>

    <script>
        function buscarPalavras(letra) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("resultados").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "buscar_palavras.php?letra=" + letra, true);
            xhttp.send();
        }

        function buscarPalavra() {
                var palavra = document.getElementById('busca').value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("resultados").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "buscar_palavras.php?palavra=" + palavra, true);
                xhttp.send();
            }
        
        function buscarPalavra() {
            var palavra = document.getElementById('search-input').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("resultados").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "buscar_palavras.php?palavra=" + palavra, true);
            xhttp.send();
        }
    </script>
</body>
</html>
