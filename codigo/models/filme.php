<?php
namespace Models;
use Interfaces\Locavel;

/**
 * Classe que representa um Carro no sistema
 */
class Filme extends Categoria implements Locavel {
    public function calcularAluguel(int $dias): float {
        return $dias * DIARIA_FILME;
    }

    public function alugar(): string {
        if ($this->disponivel) {
            $this->disponivel = false;
            return "Filme '{$this->titulo}' alugado com sucesso!";
        }
        return "O filme '{$this->titulo}' não está disponível.";
    }

    public function devolver(): string {
        if (!$this->disponivel) {
            $this->disponivel = true;
            return "Filme '{$this->titulo}' devolvido com sucesso!";
        }
        return "O filme '{$this->titulo}' já está na locadora.";
    }
}