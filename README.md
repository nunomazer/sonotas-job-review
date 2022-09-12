# Só Notas

Sistema emissor de NFe

# Getting Started

## Fluxo de desenvolvimento

Trabalhar em _feature branches_:

1. Pull da branch `homolog` no ambiente local
2. Com a branch `homolog` atualizada, criar a branch para nova feature
    1. trabalhar na feature
    2. commits
    3. push para branch
3. Antes de realizar um PR
    1. Pull da `homolog` novamente
    2. Merge da `homolog` na branch de trabalho
    3. Resolução de conflitos se necessário
4. Fazer a PR da feature branch para `homolog`
5. Depois de realizado o merge no repositório da `homolog`
    1. voltar ao passo 1

## Download Dependencies

-   composer install
-   npm install

## Laravel Mix

-   npm run dev

## Ambiente de desenvolvimento/testes

### Migrations

Execute as migrations com seed para carregar os dados base auxiliares como CNAE, LC116, estados e cidades IBGE:

```bash
php artisan migrate:fresh --seed
```

### Dados de teste

Execute o seeder de teste para incluir alguns dados iniciais que facilitam os
testes

```
php artisan db:seed --class=TesteSeeder
```

### Comando de testes por funcionalidade

Para facilitar os testes por funcionalidades, principalmente das pontas de integração,
rodar o comando a seguir e escolher o nome da função interna de teste:

```
php artisan teste:service
```

Você deve iniciar a digitação do nome do método de teste ou clicar com a seta para cima para as opções serem mostradas uma a uma.

#### Implementando testes no comando

Adicione testes para serem chamados por linha de comando quando desejar:

1. Crie a funcão que simula a execução desejada
2. Cole o nome da função na _choice_ do início do comando.

**ATENÇÃO**: este método/estratégia não substitui a implementação de testes unitários e de integração.

## Arquitetura

A aplicação está desenvolvida para que a camada de domínio resolva a lógica central dos fluxos do negócio.

As classes de domínio estão localizadas na pasta `Services` e devem possuir o nome do domínio com prefixo _Service_,
por exemplo: `EmpresaService`.

## Responsividade

A responsividade foi feita utilizando o sistema de grid do Bootstrap, onde a tela é dividida em uma grade de 12 colunas e você pode definir a largura do elemento html em cada breakpoint.
Ex:

Dividir seção em 3 colunas: (se a largura total é 12 colunas, basta eu alocar 4 colunas pra cada div)

```
<div class="container">
  <div class="row">
    <div class="col-4">
      Primeira coluna
    </div>
    <div class="col-4">
      Segunda coluna
    </div>
    <div class="col-4">
      Terceira coluna
    </div>
</div>
```

Para definir o comportamento em cada tamanho de tela, basta usar as classes com os prefixos abaixo:

col = automático, <576px
col-sm = ≥576px
col-md = ≥768px
col-lg = ≥992px
col-xl = ≥1200px

Ex:
```

<div class="container">
  <div class="row">
    <div class="col-4 col-md-6 col-lg-8">
      Primeira coluna
    </div>
</div>
```

### Single Source of Truth

Garantir que apenas um local execute uma lógica do negócio.

Por exemplo, alteração em registro de banco de dados:

> Sempre pelos métodos oferecidos pelos Services, não realizar operações de alteração diretamnte
> em models eloquent por controladores.

## Permissões

Gerenciamento de permissões pelo pacote [Spatie Laravel-permission](https://spatie.be/docs/laravel-permission/v5/introduction).

Controlamos as permissões em nível de papéis (_roles_), verifique o modelo `Role` que
possui constantes com os nomes utilizados e o racional de cada papel.

> _Se necessário no futuro podemos definir um controle mais granular por permissões, que usarão o mesmo pacote_.
