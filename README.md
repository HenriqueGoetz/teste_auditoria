# Teste - Auditoria

Esse repositório foi criado para realizar um teste de programação em Laravel e Tailwind.

## Tarefa inicial

Desenvolver uma página para cadastro de empresas e cálculo do percentual de crédito a partir do ICMS pago e créditos possíveis.

## Funcionalides desenvoldidas

- Validação e máscaraS para campos do formulário
- Chamada AJAX para cadastro da empresa
- Estado de loading para requisição AJAX
- Tela de relatório (/empresas/{id})
- Tela de listagem dos relatórios (/empresas)
- Exportação do relatório como PNG

## Rotas disponíveis

1. Home (/)
2. Cadastro (/empresa)
3. Relatório (/empresas/{ID})
4. Relatórios (/empresas)

## Produção

O repositório foi integrado com o Railway para facilitar testes e validações. O banco de dados é um SQLite, portanto, não fica persistente após novos deploys. Acesse:

https://testeauditoria-production.up.railway.app/empresas.
