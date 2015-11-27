use bazar;

CREATE TABLE IF NOT EXISTS `catalogo_itens` (
  `nome` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preco` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `catalogo_itens` (`nome`, `descricao`, `preco`) VALUES
('Monitor', 'ALTA FLORESTA D''OESTE', 'RO'),
('Teclado', 'ARIQUEMES', 'RO'),
('Mouse', 'CABIXI', 'RO'),
('Caixa de som', 'CACOAL', 'RO'),
('Gabinete', 'CEREJEIRAS', 'RO'),
('Processador', 'COLORADO DO OESTE', 'RO'),
('Mouse pad', 'CORUMBIARA', 'RO'),
('Impressora', 'COSTA MARQUES', 'RO'),
('Placa de video', 'ESPIGAO D''OESTE', 'RO'),
('Placa mae', 'GUAJARA-MIRIM', 'RO'),
('Placa de som', 'JARU', 'RO'),
('Memoria ram', 'JI-PARANA', 'RO');