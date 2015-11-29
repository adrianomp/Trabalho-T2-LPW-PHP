use bazar;

CREATE TABLE IF NOT EXISTS `catalogo_itens` (
  `ofertante` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preco` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `catalogo_itens` (`ofertante`, `nome`, `descricao`, `preco`) VALUES
('Adriano', 'Monitor', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Teclado', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Mouse', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Caixa de som', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Gabinete', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Processador', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Mouse pad', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Impressora', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Placa de video', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Placa mae', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Placa de som', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Memoria ram', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Abajur', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Balança', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Cadeira', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Algema', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Berimbau', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Caneta', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Apito', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Boneca', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Chicote', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Dado', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Escada', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Faca', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Diário', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Escova', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Fichário', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Dominó', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Espelho', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Fruteira', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Gaiola', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Harpa', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Ignitor', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Gaita', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Helióstato', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Interruptor', 'lorem ipsum dolor', 'R$2,00'),
('Adriano', 'Vasilhame', 'lorem ipsum dolor', 'R$2,00');
