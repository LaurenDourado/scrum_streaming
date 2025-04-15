![image](https://github.com/user-attachments/assets/b4029646-13f6-4ec3-a3f7-4888b61e8771)

# 📦 Sistema de Locadora Flexível

Projeto desenvolvido como trabalho no **Curso Técnico em Desenvolvimento de Sistemas**. O sistema simula uma **locadora de itens com aluguel flexível**, permitindo personalização na escolha de itens, tempo de locação e com funcionalidades voltadas tanto para administradores quanto usuários comuns.

---

## 📚 Contexto

Vivemos em uma era onde a personalização e a flexibilidade estão moldando o consumo. No setor imobiliário, o modelo de **locação flexível (flex stay)** permite contratos mais curtos e com menos burocracia. Esse projeto se inspira nessa tendência, aplicando os conceitos de consumo sob demanda em uma locadora de itens que permite controle personalizado por parte dos usuários.

---

## 🧩 Desafio

Seguindo o conceito de serviços personalizados, o sistema de locadora foi pensado para:
- Ser intuitivo e acessível;
- Refletir o modelo de locação flexível;
- Ser responsivo e funcional em diferentes dispositivos.

---

## 🎯 Objetivo

Desenvolver uma aplicação web completa que atenda aos requisitos de flexibilidade e usabilidade, com funcionalidades de autenticação, gerenciamento de itens e controle de aluguel baseado em dias e tipo de item.

---

## 🛠️ Tecnologias Utilizadas

- **PHP** – Backend e manipulação de dados
- **Bootstrap 5** – Interface responsiva
- **Bootstrap Icons** – Ícones na UI
- **Composer (PSR-4)** – Autoloading de classes
- **JSON** – Armazenamento de dados (`usuarios.json`, `itens.json`)

---

## ⚙️ Funcionalidades

- **Login de Usuário**
  - Autenticação com perfis: admin e usuário
  - Exibição de mensagens de erro

- **Gerenciamento de Itens**
  - Adição (admin)
  - Exclusão (admin)
  - Aluguel e devolução (ambos os perfis)

- **Cálculo de Previsão de Aluguel**
  - Com base no tipo de item e dias informados

- **Interface Responsiva**
  - Layout com Bootstrap
  - Ícones com Bootstrap Icons
  - Formulários com validações básicas

---

## 📁 Estrutura dos Dados

- `usuarios.json`
  ```json
  [
    {
      "username": "admin",
      "senha": "senha_criptografada",
      "perfil": "admin"
    }
  ]
[
  {
    "tipo": "Notebook",
    "modelo": "Dell XPS",
    "placa": "123-XYZ",
    "status": "disponível"
  }
]

## 📌 Telas

### 🔐 Login
- Formulário com campos de usuário e senha  
- Mensagem de erro em caso de falha  
- Redirecionamento para `index.php` após login bem-sucedido  

### 🖥 Página Principal
- Barra superior com nome do sistema, usuário logado e botão sair  
- **Seções:**
  - Adicionar Novo Item (visível apenas para admin)
  - Calcular Previsão de Aluguel (disponível para ambos os perfis)
  - Itens Cadastrados (ações: alugar, devolver, deletar)

---

## 🧪 Critérios de Avaliação

- ✅ Funcionalidade completa  
- ✅ Interface intuitiva  
- ✅ Layout responsivo e atraente  
- ✅ Código limpo e bem estruturado  
- ✅ Validação de dados e segurança básica  

---

## 🗂️ Entregas por Sprint

### 📦 Sprint 1
- Planejamento e requisitos  
- Cronograma com responsáveis  
- Identidade visual (logo e cores)  
- Protótipo no Figma  

### 💻 Sprint 2
- Implementação do Frontend com Bootstrap  
- Modelagem dos dados em JSON  

### 🛠 Sprint 3
- Desenvolvimento do Backend (PHP)  
- Entrega do relatório técnico (ABNT)  
- Apresentação (PowerPoint, PDF ou Canva)  

---

