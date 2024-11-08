# Teste de Habilidades em Laravel

## Objetivo

Avaliar as habilidades do candidato em Laravel, compreensão e análise de requisitos, capacidade de inovação, determinação na busca de soluções e responsabilidade na tomada de decisões.

## Requisitos

1. Usar Laravel 10.x ou 11.x;
2. Implementar um sistema simples de autenticação;
3. Criar uma funcionalidade CRUD (Create / Read / Update / Delete) para duas entitades: Hotels e Rooms;
4. A tabela Hotels tem os seguintes campos: **name** (obrigatório / único), **address** (obrigatório), **city** (obrigatório), **state** (obrigatório), **zip_code** (obrigatório), **website**;
5. A tabela Rooms tem os seguintes campos: **name** (obrigatório), **description** (obrigatório), **hotel_id** (foreign key);
6. Usar as migrations para criar as tabelas acima;
7. O endereço deve ser preenchido automaticamente via integração com a API do ViaCEP (https://viacep.com.br/);
8. Utilizar Inertia com Vue na criação das telas;
9. Implementar os Controllers com os métodos padrões – **index**, **create**, **store**, etc;
10. Implementar as validações do Laravel;
11. Realize testes unitários para verificar a robustez do sistema;
12. Documente seu código de forma clara e concisa;

Bônus (Opcional):

- Usar Laravel Sail;
- Usar Seeder e Factory para alimentar as tabelas dos Quartos e Hotéis;
- Usar Tailwind e Vuetify;

## Avaliação

O candidato será avaliado com base na implementação correta dos requisitos, a qualidade do código e a capacidade de resolução de problemas. A documentação e os testes também serão considerados na avaliação.

## Observações

- Utilize as melhores práticas do Laravel.
- Preste atenção à qualidade do código.
- O projeto deve ser entregue em um repositório Git público.
