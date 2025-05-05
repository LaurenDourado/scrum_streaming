<?php
namespace Models;

/**
 * Classe abstrata base para todos os tipos de veículos
 */
abstract class Categoria {
    protected string $titulo;
    protected string $sinopse;
    protected string $genero;
    protected string $tipo;
    protected string $poster;
    protected bool $disponivel;

    public function __construct(string $titulo, string $sinopse, string $genero, string $tipo, string $poster) {
        $this->poster = $poster;
        $this->titulo = $titulo;
        $this->sinopse = $sinopse;
        $this->genero = $genero;
        $this->tipo = $tipo;
        $this->disponivel = true;
    }

    /**
     * Calcula o valor do aluguel baseado na quantidade de dias
     */
    abstract public function calcularAluguel(int $dias): float;

    public function isDisponivel(): bool {
        return $this->disponivel;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function getTitulo(): string {
        return $this->titulo;
    }

    public function getSinopse(): string {
        return $this->sinopse;
    }

    public function getGenero(): string {
        return $this->genero;
    }

    public function getPoster(): string {
        return $this->poster;
    }

    public function setDisponivel(bool $disponivel): void {
        $this->disponivel = $disponivel;
    }
}
