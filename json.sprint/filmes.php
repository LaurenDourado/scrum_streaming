<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens Json</title>
</head>
<body>
    <h2>Cadastro de Filmes</h2>
    <form action="salvar.php" method="post">
        Titulo: <input type="text" name="titulo" required><br><br>
        Tipo: <input type="text" name="tipo" required><br><br>
        Genero: <input type="text" name="genero" required><br><br>
        Status: <input type="text" name="status" required><br><br>
        Ano: <input type="date" name="ano">
        <button type="submit">Salvar</button>
    </form>

    <h2>Filmes cadastrados</h2>
    <ul>
    <?php
        $filmes = json_decode(file_get_contents("filmes.json"), true);

        if(!empty ($filmes)){
            foreach($filmes as $filme){
                echo "<li>{$filme['titulo']} - {$filme['tipo']} - {$filme['genero']} - {$filme['status']}- {$filme['ano']}</li>";
            }
        } else {
            echo "<li>Nenhum item cadastrado</li>";
        }
    ?>
    </ul>
</body>
</html>