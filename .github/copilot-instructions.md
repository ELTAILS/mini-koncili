# Copilot Instructions — Mini-Koncili

Este arquivo dá contexto ao GitHub Copilot sobre o projeto, a regra de negócio e como ele deve se
comportar ao sugerir código. Objetivo: sugestões úteis e alinhadas ao domínio, sem gerar a lógica de
negócio inteira de forma opaca — quem escreve e entende o núcleo do sistema é o desenvolvedor, não o
Copilot.

## O que é o projeto

Mini-Koncili é um sistema de **conciliação financeira entre vendas e repasses**, inspirado no produto
real Koncili (DB1 Group), que concilia repasses de marketplaces e meios de pagamento. É um projeto de
portfólio: precisa ser pequeno, correto e bem explicado — não precisa (e não deve) crescer além do
escopo do MVP.

## Domínio de negócio — regra central

Isso é o que mais importa. Qualquer sugestão de código relacionada a conciliação deve respeitar esta
regra:

- Cada **venda** (`sales`) tem um `order_code` (código do pedido) e um valor esperado de repasse
  (`gross_amount` − `commission_amount` − `fee_amount`).
- Cada **repasse** (`transfers`) tem um `order_code` correspondente e um `amount` (o que foi
  efetivamente recebido).
- A conciliação cruza vendas e repasses **pelo `order_code`**, não por valor, não por data, não por ID
  sequencial.
- Resultado da conciliação (`reconciliations`) tem três status possíveis:
  - **`conciliado`**: existe repasse com o mesmo `order_code` e o valor bate (dentro de uma margem de
    centavos, por causa de arredondamento).
  - **`divergente`**: existe repasse com o mesmo `order_code`, mas o valor não bate — nesse caso,
    calcular e salvar `difference`.
  - **`pendente`**: não existe nenhum repasse com aquele `order_code` ainda.
- Essa lógica vive isolada em `app/Services/ReconciliationService.php` — não deve ser espalhada em
  controllers, Livewire components ou views. Se o Copilot sugerir lógica de matching fora dessa classe,
  isso está errado.

## Schema do banco (real e definitivo, MySQL Workbench)

```
users
  id INT (PK)
  name VARCHAR(100)
  email VARCHAR(100)
  password VARCHAR(255)
  remember_token VARCHAR(100)
  created_at, updated_at DATETIME

sales
  id INT (PK)
  user_id INT (FK -> users.id)
  order_code VARCHAR(100)
  sale_date DATETIME
  gross_amount DECIMAL(8,2)
  commission_amount DECIMAL(8,2)
  fee_amount DECIMAL(8,2)
  created_at, updated_at DATETIME

transfers
  id INT (PK)
  user_id INT (FK -> users.id)
  order_code VARCHAR(100)
  amount DECIMAL(8,2)
  transfer_date DATETIME
  created_at, updated_at DATETIME

reconciliations
  id INT (PK)
  sale_id INT (FK -> sales.id)
  transfer_id INT (FK -> transfers.id, NULLABLE — obrigatório ser nullable:
                    status "pendente" significa que ainda não existe repasse)
  status VARCHAR(20)          -- 'conciliado' | 'divergente' | 'pendente'
  expected_amount DECIMAL(8,2)
  received_amount DECIMAL(8,2)
  difference DECIMAL(8,2)
  reconciled_at DATETIME
  created_at, updated_at DATETIME
```

Índice recomendado: `order_code` em `sales` e `transfers` (é a coluna usada no match — sem índice, a
busca fica lenta conforme o volume cresce).

Todas as foreign keys em minúsculo e no singular (`user_id`, `sale_id`, `transfer_id`) — é a convenção
que o Eloquent espera para resolver relacionamentos automaticamente (`belongsTo(Sale::class)` sozinho
já funciona, sem precisar declarar a FK na mão).

## Stack técnica

- **Backend:** PHP 8+, Laravel, Livewire (não usar controllers tradicionais + Blade puro para telas
  interativas — usar componentes Livewire)
- **Frontend:** Blade + Tailwind CSS
- **Interatividade leve:** Alpine.js (`x-data`, `x-show`, `x-transition`) e os recursos nativos do
  Livewire (`wire:loading`, `wire:transition`, `wire:target`) — **sem GSAP ou qualquer outra biblioteca
  de animação**. Isso foi decidido deliberadamente para não introduzir dependência nova sob prazo curto.
- **Banco de dados:** MySQL, via Eloquent — sempre usar migrations, nunca alterar schema manualmente
- **Cache:** Redis (já disponível via Docker), usado em `Cache::remember()` para as métricas agregadas
  do Dashboard, com invalidação via Model Observer
- **Autenticação:** Laravel Breeze (stack Livewire) para o login da interface; Laravel Sanctum para
  tokens da API
- **Testes:** Pest, focados no `ReconciliationService`
- **Ambiente:** Docker Compose (containers: apache, mysql, nginx, node, php-fpm, proxy, redis, ssl),
  rodando em VM Ubuntu Server, acessado via VS Code Remote-SSH

## Arquitetura — respeitar as camadas

```
Blade + Tailwind            (visual)
   |
Livewire Components         (interatividade: SalesTable, TransfersTable, ReconciliationPanel, Dashboard)
   |
ReconciliationService        (regra de negócio: faz o match venda x repasse)
   |
Eloquent Models              (Sale, Transfer, Reconciliation, User)
   |
MySQL

API REST (Sanctum)  ->  mesmos Models, acesso paralelo via /api/v1/...
```

Ao sugerir código:
- Não colocar lógica de negócio em Controllers ou Livewire Components — eles chamam o Service, não
  reimplementam a regra.
- API Controllers devem usar API Resources para formatar resposta JSON (nunca retornar Model direto).
- Cada usuário só pode ver seus próprios dados — usar Policies do Laravel, não filtro manual espalhado
  pelas queries.

## Escopo do MVP — não expandir

Páginas do sistema: Login/Registro, Dashboard, Vendas, Repasses, Conciliação, Relatório (export CSV),
Sobre o projeto, e a página bônus Sobre mim. **Página de Perfil/Configurações está fora do escopo** —
não sugerir criação dela.

Não sugerir:
- Novas entidades/tabelas fora de `users`, `sales`, `transfers`, `reconciliations`
- Bibliotecas de animação (GSAP, Framer Motion, etc.)
- Frameworks de frontend adicionais (Vue, React) — o projeto é Blade + Livewire, ponto
- Documentação via Swagger/OpenAPI — a documentação da API é feita via coleção Insomnia/Postman +
  `API.md`, para não gastar tempo aprendendo ferramenta nova

## Uso de IA neste projeto — como o Copilot deve se comportar

Este projeto é peça de portfólio para entrevista de emprego. Quem construiu precisa conseguir explicar
e defender cada decisão — então:

- **Pode sugerir livremente:** boilerplate (migrations, esqueleto de CRUD Livewire), correção de erro
  de sintaxe, autocomplete de métodos Eloquent/Laravel padrão.
- **Sugerir com comentário explicativo, não só o código:** qualquer trecho de lógica não-trivial —
  preferir sugestões pequenas e comentadas a blocos grandes sem explicação.
- **Evitar gerar de uma vez:** o `ReconciliationService` inteiro, ou qualquer decisão de arquitetura.
  Prefira sugerir passo a passo, permitindo revisão a cada trecho.
- Ao sugerir testes Pest, seguir os 3 cenários de negócio (conciliado / divergente / pendente) — não
  gerar testes genéricos que não refletem essa regra.

## Convenções de nomenclatura

- Tabelas e colunas: inglês, snake_case, exatamente como no schema acima (`sales`, `order_code`,
  `gross_amount`) — não inventar nomes alternativos
- Foreign keys: sempre minúsculo (`user_id`, `sale_id`, `transfer_id`) — nunca `User_id` ou `Venda_id`
- Classes/Models: inglês, PascalCase (`Sale`, `Transfer`, `Reconciliation`, `ReconciliationService`)
- Comentários e mensagens voltadas ao usuário final: português
- Rotas da API: `/api/v1/...`, sempre versionadas
