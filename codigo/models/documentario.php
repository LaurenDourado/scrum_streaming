<?php
namespace Models;
use Interfaces\Locavel;

/**
 * Classe que representa um Carro no sistema
 */
class Documentario extends Categoria implements Locavel {
    public function calcularAluguel(int $dias): float {
        return $dias * DIARIA_DOCUMENTARIO;
    }

    public function alugar(): string {
        if ($this->disponivel) {
            $this->disponivel = false;
            return "Documentário '{$this->titulo}' alugado com sucesso!";
        }
        return "O documentário '{$this->titulo}' não está disponível.";
    }

    public function devolver(): string {
        if (!$this->disponivel) {
            $this->disponivel = true;
            return "Documentário '{$this->titulo}' devolvido com sucesso!";
        }
        return "O documentário '{$this->titulo}' já está na locadora.";
    }
}