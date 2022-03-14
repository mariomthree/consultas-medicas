<p align="center"><a href="https://laravel.com" target="_blank"><img src="./equipe-medica.png" width="300"></a></p>

## Consultas Médicas

O presente projecto é uma aplicação simples que permite a marcação de consultar medicas, foi desenvolvida com recurso ao Framework Laravel, para o pre-exame da disciplina de Desenvolvimento de aplicação Web, 4° ano Informática - Universidade Eduardo Mondlane.

## Descrição do Problema

A aplicação foi desenvolvida seguindo o enunciado abaixo:

O Hospital XYZ, deseja melhorar os serviços de atendimento e controle dos pacientes, assim sendo requisita uma aplicação que permite a marcação de consultas medicas.

A aplicação devera registar o medico, indicando o nome, apelido, data de nascimento, especialização e o seu posto medico, por conseguinte registar o paciente indicando o nome, apelido, data de nascimento, sintomas e o posto medico. Por fim tendo estes dados, devera ser possível criar uma marcação selecionado o paciente, medico e indicando a data da marcação.

As marcações deverão ser efectuadas pelos recepcionistas e o registo do medicos e pacientes somente pelo chefe de posto.

## Analise do Problema

### Classes e Atributos

- Medico (nome, apelido, data de nascimento, especialidade, posto medico)
- Paciente (nome, apelido, data de nascimento, sintomas, posto medico)
- Marcacao (Paciente, Medico, data de marcacao)

### Funções e Permissões

- Administrador - entidade responsável pela gestão de funções e permissões e registo dos utilizadores do sistema;
- Recepcionista - entidade que efectua as marcações no sistema;
- Chefe do posto - entidade responsável pelo registo dos medicos e pacientes;

## Tecnologias e Ferramentas

- Laravel (Framework PHP)
- AdminLte (Dashboard CSS Template)

## Demonstração

