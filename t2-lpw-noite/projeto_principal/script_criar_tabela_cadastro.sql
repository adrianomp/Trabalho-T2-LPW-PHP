create table cadastro (
id_cadastro int not null primary key auto_increment,
nome varchar(50),
email varchar(50),
login varchar(30),
senha varchar(32),
data_ts varchar(14),
uid varchar(50),
ativo bool default 0
);
