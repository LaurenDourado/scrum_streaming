<?php
namespace Models;
use Interfaces\Locavel;

/**
 * Classe que representa um Carro no sistema
 */
class Novela extends Categoria implements Locavel {
    public function calcularAluguel(int $dias): float {
        return $dias * DIARIA_NOVELA;
    }

    public function alugar(): string {
        if ($this->disponivel) {
            $this->disponivel = false;
            return "Novela '{$this->titulo}' alugado com sucesso!";
        }
        return "A novela '{$this->titulo}' não está disponível.";
    }

    public function devolver(): string {
        if (!$this->disponivel) {
            $this->disponivel = true;
            return "Novela '{$this->titulo}' devolvido com sucesso!";
        }
        return "A novela '{$this->titulo}' já está na locadora.";
    }
}