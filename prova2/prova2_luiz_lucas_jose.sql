create database prova2_luiz_lucas_jose;

use prova2_luiz_lucas_jose;

create table usu_usuarios (
	usu_id serial primary key,
    usu_nome varchar(45) not null,
    usu_senha varchar(200) not null
);

create table ati_ativos (
    ati_id serial primary key,
    ati_codigo_negociacao varchar(10) not null,
    ati_cotacao decimal(8,2) not null,
    ati_ativo varchar(4) not null,
    ati_p_vp decimal(8,2) not null,
    ati_dividend_yield decimal(10,2) not null
);

insert into ati_ativos values (0, 'VALE3', 64.69, 'Ação', 1.57, 10.87),
(0, 'BBDC4', 13.43, 'Ação', 0.86, 8.33),
(0, 'TAEE11', 35.01, 'Ação', 1.71, 10.74),
(0, 'PETR4', 41.59, 'Ação', 1.43, 17.52),
(0, 'BCFF11', 8.87, 'FII', 0.91, 0.79),
(0, 'XPLG11', 103.85, 'FII', 0.93, 0.75),
(0, 'XPML11', 116.33, 'FII', 1.05, 0.78),
(0, 'ITUB4', 33.05, 'Ação', 1.75, 7.23),
(0, 'BTLG11', 102.11, 'FII', 1.03, 0.71);