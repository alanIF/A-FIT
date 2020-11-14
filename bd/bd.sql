create database sig_fit;
use sig_fit;

create table usuario( 
	id int auto_increment not null,
	nome varchar(200) not null,
	email varchar(200) not null,
	senha varchar(200) not null,
        tipo text,
	primary key(id)
);
/*
    Usuario geral - para treinos gerais

*/


create table exercicio(
	id int auto_increment not null,
	nome text, 
        grupo text,
        intervalo text,
        serie text,
        repeticao text,
	primary key(id)
);

create table treino(
    id int auto_increment not null,
    id_usuario int, 
    data_inicial text, 
    data_final text, 
    observacao text, 
    primary key(id),
    foreign key (id_usuario) references usuario(id)
);

create table treino_exercicio(
    id int auto_increment not null,
    id_treino int not null,
    id_exercicio int not null, 
    serie_especifica text,
    repeticao_especifica text,
    primary key(id),
    foreign key (id_treino) references treino(id),
    foreign key (id_exercicio) references exercicio(id)
);
