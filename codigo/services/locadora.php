<?php
// Define o namespace onde essa classe está localizada
namespace Services;

// Importa as classes Veiculo, Carro e Moto do namespace Models
use Models\Categoria, Models\Filme, Models\Documentario, Models\Serie, Models\Novela;

/**
 * Classe responsável por gerenciar as operações da locadora
 */
class Locadora {
    // Array privado que armazena os veículos cadastrados na locadora
    private array $categorias = [];

    // Construtor da classe que chama o método para carregar os veículos do arquivo
    public function __construct() {
        $this->carregarCatalogo();
    }

    /**
     * Carrega os veículos do arquivo JSON
     */
    private function carregarCatalogo(): void {
        // Verifica se o arquivo JSON com os veículos existe
        if (file_exists(ARQUIVO_JSON)) {
            // Lê o conteúdo do arquivo e decodifica para array associativo
            $dados = json_decode(file_get_contents(ARQUIVO_JSON), true);
            // Percorre cada item do array para recriar os objetos Carro ou Moto
            foreach ($dados as $dado) {
                // Instancia o veículo com base no tipo salvo
                if ($dado['tipo'] === 'Filme') {
                    $categoria = new Filme($dado['titulo'], $dado['sinopse'], $dado['genero'], $dado['tipo'], $dado['poster']);
                } elseif ($dado['tipo'] === 'Documentario') {
                    $categoria = new Documentario($dado['titulo'], $dado['sinopse'], $dado['genero'], $dado['tipo'], $dado['poster']);
                } elseif ($dado['tipo'] === 'Serie') {
                    $categoria = new Serie($dado['titulo'], $dado['sinopse'], $dado['genero'], $dado['tipo'], $dado['poster']);
                } elseif ($dado['tipo'] === 'Novela') {
                    $categoria = new Novela($dado['titulo'], $dado['sinopse'], $dado['genero'], $dado['tipo'], $dado['poster']);
                } else {
                    throw new \Exception("Categoria desconhecida: " . $dado['tipo']);
                }
                // Define se o veículo está disponível ou não
                $categoria->setDisponivel($dado['disponivel']);
                // Adiciona o veículo ao array interno da locadora
                $this->categorias[] = $categoria;
            }
        }
    }

    /**
     * Salva os veículos no arquivo JSON
     */
    private function salvarCatalogo(): void {
        $dados = [];
        // Constrói um array associativo com os dados de cada veículo
        foreach ($this->categorias as $categoria) {
            $dados[] = [
                'tipo' => ((($categoria instanceof Filme) ? 'Filme' : 'Serie' ) ? 'Serie' : 'Novela') ? 'Novela' : 'Documentario', // Define a categoria do item
                'titulo' => $categoria->getTitulo(), // Obtém o titulo
                'sinopse' => $categoria->getSinopse(), // Obtém a sinópse
                'genero' => $categoria->getGenero(), // Obtém o gênero
                'disponivel' => $categoria->isDisponivel() // Verifica se está disponível
            ];
        }
        
        // Obtém o diretório do caminho do arquivo
        $dir = dirname(ARQUIVO_JSON);
        // Se o diretório não existir, cria com permissões completas
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        
        // Escreve os dados no arquivo JSON com formatação legível
        file_put_contents(ARQUIVO_JSON, json_encode($dados, JSON_PRETTY_PRINT));
    }


    // adicionar novo veículo
    public function adicionarItem(Categoria $item): void{
        $this->categorias[] = $item;
        $this->salvarCatalogo();
    }
    
    // remover veículo
    public function deletarItem(string $titulo, string $genero): string{
        foreach($this->categorias as $key => $item){
            // verifica se o modelo e a placa correspondem
            if($item->getTitulo() === $titulo && $item->getGenero() === $genero){
                // remove o veículo do array
                unset($this->veiculos[$key]);

                // reorganizar os indices
                $this->categorias = array_values($this->categorias);

                // salva os veículos restantes no arquivo JSON
                $this->salvarCatalogo();
                return "{$item->tipo} '{$titulo}' foi removido com sucesso!";
            }
        }
        return "{$item->tipo} não encontrado";
    }

    // alugar veiculo por X dias
    public function alugarItem(string $genero, int $dias = 1): string{

        // percorre a lista de veículos
        foreach($this->categorias as $item){
            if($item->getTipo() === $genero && $item->isDisponivel()){

                // calcular valor de aluguel
                $valorAluguel = $item->calcularAluguel($dias);

                // marcar como alugado
                $mensagem = $item->alugar();

                $this->salvarCatalogo();
                return $mensagem . "valor do aluguel: R$" . number_format($valorAluguel, 2, ',', '.');
            }            
        }
        return "{$item->tipo} não disponível";
    }

    // devolver veiculo
    public function devolverDeiculo(string $genero): string{
        foreach($this->categorias as $item){
            if($item -> getTipo() === $genero && !$item->isDisponivel()){
                $mensagem = $item->devolver();
                $this->salvarCatalogo();
                return $mensagem;
            }
        }
        return"{$item->tipo} já disponível ou não encontrado";
    }

    // retornar a lista de veiculos

    public function listarVeiculos(): array{
        return $this->categorias;
    }

    // calcular previsão do valor
    public function calcularPrevisaoAluguel(string $tipo, int $dias): float{
        if ($tipo === 'Filme'){
            return (new Filme('','','','',''))->calcularAluguel($dias);
        } elseif ($tipo === 'Documentario'){
            return (new Documentario('','','','',''))->calcularAluguel($dias);
        } elseif ($tipo === 'Serie'){
            return (new Serie('','','','',''))->calcularAluguel($dias);
        } elseif ($tipo === 'Novela'){
            return (new Novela('','','','',''))->calcularAluguel($dias);
        } else {
            throw new \Exception("Tipo desconhecido: " . $tipo);
        }
    }
}