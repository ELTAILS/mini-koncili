# Mini Koncili

Mini Koncili é um projeto acadêmico de conciliação financeira entre vendas e repasses. A ideia central é comparar o valor esperado de uma venda com o valor que realmente foi recebido em um repasse, usando como chave de relacionamento o código do pedido, o `order_code`.

O projeto foi pensado para demonstrar, de forma simples e clara, como uma operação de reconciliação funciona na prática: uma venda gera um valor esperado, um repasse chega com um valor recebido e o sistema decide se os valores batem, se existem divergências ou se ainda faltam registros.

## Objetivo do projeto

O sistema ajuda a responder uma pergunta simples, porém muito importante no dia a dia financeiro:

- A venda foi paga da forma esperada?
- O valor recebido no repasse corresponde ao valor líquido previsto?
- Há alguma venda sem transferência registrada?
- Há algum repasse com valor diferente do esperado?

Esse tipo de análise é muito comum em marketplaces, meios de pagamento e plataformas de vendas, onde uma operação pode ser registrada em duas bases diferentes e precisa ser comparada com atenção.

## Como o projeto funciona passo a passo

### 1. Cadastro de vendas

A tabela `sales` registra cada venda do usuário.

Cada venda possui:

- `order_code`: código do pedido, usado como identificador principal para cruzar dados
- `gross_amount`: valor bruto da venda
- `commission_amount`: comissão aplicada
- `fee_amount`: taxas cobradas
- `sale_date`: data da venda

O valor esperado de repasse é calculado assim:

- `expected_amount = gross_amount - commission_amount - fee_amount`

Esse cálculo representa o valor que deveria ter sido recebido pela operação.

### 2. Cadastro de transferências

A tabela `transfers` guarda os repasses recebidos.

Cada repasse possui:

- `order_code`: mesmo código do pedido da venda correspondente
- `amount`: valor efetivamente recebido
- `transfer_date`: data do repasse

A regra do sistema é simples: o relacionamento entre venda e repasse é feito pelo `order_code`, e não por ID ou data.

### 3. Conciliação

Ao acessar a área de conciliação, o sistema percorre as vendas do usuário e compara cada uma com o repasse correspondente.

A lógica fica centralizada em `app/Services/ReconciliationService.php`, seguindo a regra de negócio principal do projeto:

- se existe um repasse com o mesmo `order_code` e o valor bate, a venda fica `conciliado`
- se existe um repasse com o mesmo `order_code`, mas o valor não bate, a venda fica `divergente`
- se não existe repasse para o `order_code`, a venda fica `pendente`

### 4. Processo de comparação

Para cada venda, o sistema:

1. busca o repasse do mesmo usuário e com o mesmo `order_code`
2. calcula o valor esperado da venda
3. compara com o valor recebido do repasse
4. salva o resultado na tabela `reconciliations`

Se houver diferença de centavos por arredondamento, a aplicação considera valores compatíveis até uma pequena margem.

## Fluxo geral do sistema

O fluxo do projeto pode ser entendido assim:

1. usuário faz login
2. visualiza o dashboard
3. cadastra ou importa vendas e repasses
4. entra na tela de conciliação
5. o sistema consolida os dados
6. cada venda recebe um status na tabela de reconciliação
7. o dashboard mostra o resumo por categoria

Em termos de telas, o fluxo principal é:

- Login / autenticação
- Dashboard
- Vendas
- Repasses
- Conciliação
- Relatório

## Os 3 resultados finais da conciliação

### 1. Conciliado

A venda está `conciliado` quando existe um repasse com o mesmo `order_code` e o valor recebido bate com o valor esperado.

Exemplo:

- venda: `gross_amount = 1000, commission_amount = 50, fee_amount = 20`
- valor esperado: `1000 - 50 - 20 = 930`
- repasse: `amount = 930`

Como o valor bate, o resultado final é `conciliado`.

Nesse caso, o sistema salva:

- `status = conciliado`
- `expected_amount = 930`
- `received_amount = 930`
- `difference = 0`

### 2. Divergente

A venda entra em `divergente` quando existe repasse com o mesmo `order_code`, mas o valor recebido não corresponde ao esperado.

Exemplo:

- valor esperado: `930`
- valor recebido: `900`
- diferença: `930 - 900 = 30`

Nesse caso, o sistema registra a diferença para mostrar que houve um problema ou diferença de cálculo no repasse.

O sistema salva:

- `status = divergente`
- `expected_amount = 930`
- `received_amount = 900`
- `difference = 30`

Esse status ajuda a identificar falhas de pagamento, descontos extras, taxas não previstas ou entradas fora do esperado.

### 3. Pendente

A venda fica `pendente` quando ainda não existe nenhum repasse com aquele `order_code`.

Isso significa que a venda foi registrada, mas ainda não houve transferência correspondente.

No sistema, isso é representado por:

- `status = pendente`
- `transfer_id = null`
- `received_amount = 0`
- `difference = expected_amount`

Ou seja, a operação ainda não foi reconciliada e precisa ser acompanhada.

## Regras de negócio que o projeto respeita

A lógica de conciliação segue uma regra clara e centralizada:

- o cruzamento de dados acontece pelo `order_code`
- cada usuário só visualiza seus próprios registros
- o cálculo do valor esperado é sempre `gross_amount - commission_amount - fee_amount`
- a regra da conciliação está isolada no serviço de negócios, e não espalhada em componentes visuais

## Estrutura do projeto

O projeto usa uma arquitetura simples e organizada:

- `app/Models`: modelos `Sale`, `Transfer`, `Reconciliation` e `User`
- `app/Services/ReconciliationService.php`: regra principal de comparação
- `app/Livewire`: telas interativas com Blade + Livewire
- `resources/views`: arquivos de interface
- `database/migrations`: estrutura das tabelas
- `tests`: testes de comportamento, especialmente focados na regra de reconciliação

## Tecnologias

- Laravel
- PHP 8+
- Livewire
- Blade + Tailwind CSS
- MySQL
- Redis para cache das métricas do dashboard
- Pest para testes

## Sobre o projeto acadêmico

O Mini Koncili é um projeto de caráter acadêmico e de portfólio, desenvolvido para demonstrar a lógica de conciliação financeira em um cenário realista, simplificado e funcional.

Ele foi pensado como uma peça de apresentação para quem está buscando mostrar conhecimento em:

- Laravel
- Livewire
- arquitetura de aplicação
- modelagem de dados
- regras de negócio
- testes automatizados
- gestão de processos financeiros

O objetivo não é substituir uma solução bancária ou financeira profissional, e sim apresentar uma implementação clara do problema e de sua solução na prática.

## Termos de uso e contexto do projeto

Como descrito no sistema, o Mini Koncili é uma ferramenta de aprendizado e demonstração prática para conciliação de transações financeiras. O serviço é disponibilizado em estado de estudo e não deve ser interpretado como aconselhamento financeiro profissional.

Dessa forma, o projeto reforça dois pontos importantes:

- o sistema é uma ferramenta acadêmica e educacional
- o uso deve seguir boas práticas de segurança, responsabilidade e ética

Entre as diretrizes do projeto estão:

- manter credenciais em sigilo
- não compartilhar acesso com terceiros
- usar a plataforma apenas para fins legítimos
- respeitar direitos autorais e uso ético dos dados

## Como rodar o projeto localmente

Para executar o projeto na máquina local, normalmente é necessário:

1. clonar o repositório
2. instalar as dependências do PHP com Composer
3. instalar as dependências do frontend com npm
4. criar o banco de dados
5. executar as migrations
6. iniciar o servidor local

Exemplo básico:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

A partir daí, o sistema pode ser acessado no navegador e a conciliação pode ser testada com vendas e repasses registrados pelo usuário.

## Conclusão

O Mini Koncili mostra, em uma estrutura enxuta e didática, como funciona a comparação entre uma venda e os repasses recebidos. O projeto está centrado em uma regra simples e importante: descobrir se a operação está consistente, divergente ou ainda pendente.

Essa lógica é a base da conciliação financeira e é justamente o que torna o projeto relevante como estudo de regra de negócio, análise de dados e desenvolvimento de sistemas reais.

