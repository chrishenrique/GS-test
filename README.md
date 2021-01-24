## Projeto criado para teste de vaga em emprego.

**[Demo](https://vehikl.com/)**

Este projeto consistem em apresentar em tempo hábil ao solicitado, o conhecimento na linguagem, boas práticas de código, estrutura de dados, modelagem de banco de dados, layout responsivo e amigavel, etc.

- PHP 7.2
- Laravel 7.2
- Mysql
- Bootstrap 4
- jQuery 3.0.1
- Bootstrap AdminLTE
- SASS

## Caso de uso

A empresa Signal - Engenharia Civil , é a empresa responsável pela construção de um
conjunto habitacional , em parceria com o minha casa minha vida da CEF.

Desta forma, a empresa após ter sido aprovada na licitação de Jeneiro de 2020, para
dar inicio a tais obras, necessita do desenvolvimento rápido de um sistema que controle a
construção de tal empreendimento.

Foi especificado para a construção do sistema , uma modelagem simples , onde deverá
ser construída uma interface para cadastro do empreendimento atual aprovado juntamente à
Caixa , e posteriores empreendimentos, contendo:


Módulo empreendimento:
- Nome
- Cep
- Endereço
- Número
- Estado
- Bairro
- Cidade
- Valor total da obra
- Data Início
- Data Fim
- Responsável técnico

Módulo Unidades
- Nome 
- Empreendimento
- Número da unidade
- Área total
- Área privativa
- Área coberta
- Cobertura ( S ou N )
- Valor de venda
- Valor de avaliacao pelo banco

Módulo Vendas
- Cliente
- Vendedor
- Unidade
- Valor final da venda
- Valor de descontos gerais
- Data da Venda
- Status da Venda ( Concluída, Pendente , Em negociação, Perdida )

Módulo Relatórios
- Relatório de vendas por período
- Relatório de vendas por vendedor
- Relatório de vendas por Cliente
- Relatório de vendas por status
- Relatório de unidade disponíveis por empreendimento


## Execução

### Instalação
- PHP 7.2
- **[Bibliotecas PHP](https://laravel.com/docs/7.x#server-requirements)**
- **[Apache ou Nginx](https://laravel.com/docs/7.x#pretty-urls)**
- Mysql

### Rodando em localhost

* Acesse a pasta do projeto e execute alguns comandos:
    - php artisan migrate
    - php artisan serve 

* Em seu navegador acesse: localhost:8000