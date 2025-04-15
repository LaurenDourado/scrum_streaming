<?php
// converte o json para um array em php
$filme = json_decode(file_get_contents("itens.json"),
true);

// verificaçao da conversão de json para php
if(!is_array($filme)){
    $filme = [];
}

$novoFilme = [
    // pega as informaçoes do formulario
    "titulo" => $_POST["titulo"],
    "tipo" => $_POST["tipo"],
    "genero" => $_POST["genero"],
    "status" => $_POST["status"],
    "ano" => $_POST["ano"]
];

//recebe e guarda as informaçoes do formulario
$filme [] = $novoFilme;

//converte o php em json
file_put_contents("itens.json" ,json_encode($filme, JSON_PRETTY_PRINT));

echo "Dados salvos com sucesso ! <a href=filmes.php>Voltar</a>"


?>

<?php
// converte o json para um array em php
$dados = json_decode(file_get_contents("user.json"),
true);

// verificaçao da conversão de json para php
if(!is_array($dados)){
    $dados = [];
}

$novoDado = [
    // pega as informaçoes do formulario
    "nome" => $_POST["nome"],
    "senha" => $_POST["senha"]
];

//recebe e guarda as informaçoes do formulario
$dados [] = $novoDado;

//converte o php em json
file_put_contents("user.json" ,json_encode($dados, JSON_PRETTY_PRINT));

echo "Dados salvos com sucesso ! <a href=usuarios.php>Voltar</a>"


?>