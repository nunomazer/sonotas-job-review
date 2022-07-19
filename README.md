# Só Notas

Sistema emissor de NFe

# Getting Started

## Download Dependencies
- composer install
- npm install

## Laravel Mix
- npm run dev

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

### Single Source of Truth

Garantir que apenas um local execute uma lógica do negócio.

Por exemplo, alteração em registro de banco de dados:
> Sempre pelos métodos oferecidos pelos Services, não realizar operações de alteração diretamnte
em models eloquent por controladores. 

## Permissões

Gerenciamento de permissões pelo pacote [Spatie Laravel-permission](https://spatie.be/docs/laravel-permission/v5/introduction).

Controlamos as permissões em nível de papéis (_roles_), verifique o modelo `Role` que 
possui constantes com os nomes utilizados. 

> _Se necessário no futuro podemos definir um controle mais granular por permissões, que usarão o mesmo pacote_.

