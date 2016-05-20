Teste Admissional
=======================

Agenda Simples
------------
 Uma simples agenda onde é necessário implementar a tela de contatos, cada contato deve pertencer a um grupo, deve ter uma tela para listar os contatos existentes e uma pra adicionar os novos contatos.

Nesse projeto ja temos uma conexão com o banco de dados configurada em:
/config/autoload/database.local.php
existe nessa mesma pasta um dump da estrutura de dados:
/config/autoload/admissional.sql,

Já existe um módulo Agenda, onde já esta implementado o CRUD da tabela grupo, a fim de treinamento deve-se criar o CRUD dos contatos lembrando que todo contato deve ter um grupo

Segue o modelo ER:
Tarefas a serem avaliadas.

    Criar rotas /config/module.config.php
    Criar os arquivos de Model para o Contato.
    Criar as funções de inserção e listagem de contatos na model.
    Criar Controller/Views para adicionar e listar do contato.
    Editar o Module.php e autoload_classmap.php para reconhecer as novas models.
    Criar html com formulário para adicionar contato.
    Criar html para lista de contatos.
    Adicionar links para o menu no layout.phtml
    Desejável implementar validações nos campo e criar uma pesquisa na listagem de contatos
