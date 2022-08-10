create database if not exists bd_jogador;
use bd_jogador;
create table if not exists tb_jogador(
id_jogador INT primary key not null auto_increment,
nome VARCHAR(45) not null,
nacionalidade varchar(45) not null,
time varchar(45) not null,
idade SMALLINT not null,
numero_camisa smallint not null,
posicao VARCHAR(45) not null
);