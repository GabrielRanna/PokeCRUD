-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/02/2021 às 17:37
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wdev_pokemon`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `pokedex_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `foto` varchar(600) NOT NULL,
  `tipo1` enum('bug','dark','dragon','electric','fairy','fighting','fire','flying','ghost','grass','ground','ice','normal','poison','psychic','rock','steel','water') NOT NULL,
  `tipo2` enum('bug','dark','dragon','electric','fairy','fighting','fire','flying','ghost','grass','ground','ice','normal','poison','psychic','rock','steel','water') DEFAULT NULL,
  `habilidade` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `sexo` enum('macho','femea','nulo') NOT NULL,
  `username_id` varchar(255) NOT NULL,
  `shiny` enum('não','sim') NOT NULL DEFAULT 'não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pokemon`
--

INSERT INTO `pokemon` (`id`, `pokedex_id`, `nome`, `foto`, `tipo1`, `tipo2`, `habilidade`, `nivel`, `descricao`, `sexo`, `username_id`, `shiny`) VALUES
(1, 6, 'Charizard', 'http://pixelartmaker.com/art/61a944b428e3023.png', 'fire', 'flying', 'Blaze', 40, 'It spits fire that is hot enough to melt boulders. It may cause forest fires by blowing flames.\r\n', 'femea', 'giihstar', 'não'),
(2, 131, 'Lapras', 'http://pa1.narvii.com/5762/1cd707e64bec7c47e1da928107c010e97cdce8d7_00.gif', 'water', 'ice', 'Water Absorb', 55, 'A smart and kindhearted Pokémon, it glides across the surface of the sea while its beautiful song echoes around it.', 'femea', 'jujubaohime', 'não'),
(3, 376, 'Metagross', 'http://pixelartmaker.com/art/32c12b5c653fadd.png', 'steel', 'psychic', 'Clear Body', 70, 'Because the magnetic powers of these Pokémon get stronger in freezing temperatures, Metagross living on snowy mountains are full of energy.', 'nulo', 'gii', 'não'),
(378, 620, 'Mienshao', 'https://cdn.bulbagarden.net/upload/thumb/2/20/620Mienshao.png/250px-620Mienshao.png', 'fighting', '', 'Inner Focus', 65, 'Delivered at blinding speeds, kicks from this Pokémon can shatter massive boulders into tiny pieces.', 'macho', 'jujubaohime', 'não'),
(379, 94, 'Gengar', 'http://pixelartmaker.com/art/7e4b8f5b54e9c08.png', 'ghost', 'poison', 'Cursed Body', 33, 'On the night of a full moon, if shadows move on their own and laugh, it must be Gengar\'s doing.', 'femea', 'jujubaohime', 'não'),
(380, 700, 'Sylveon', 'https://i.pinimg.com/originals/ea/b8/77/eab8772fc8ea589bd2d6dfdb7153872a.gif', 'fairy', '', 'Cute Charm', 50, 'By releasing enmity-erasing waves from its ribbonlike feelers, Sylveon stops any conflict.', 'macho', 'jujubaohime', 'não'),
(381, 778, 'Mimikyu', 'https://cdn130.picsart.com/295134081000211.png?type=webp&to=min&r=640', 'ghost', 'fairy', 'Disguise', 32, 'It wears a rag fashioned into a Pikachu costume in an effort to look less scary. Unfortunately, the costume only makes it creepier.', 'macho', 'jujubaohime', 'não'),
(382, 184, 'Azumarill', 'http://pixelartmaker.com/art/2cdef1a4c4363ac.png', 'water', 'fairy', 'Huge Power', 43, 'These Pokémon create air-filled bubbles. When Azurill play in rivers, Azumarill will cover them with these bubbles.', 'macho', 'jujubaohime', 'não'),
(383, 131, 'Lapras', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/131.png', 'water', 'ice', 'Water Absorb', 32, 'Lapras is a large sea Pokémon that resembles a plesiosaur. It has a blue hide with darker blue spots and a cream-colored underside.', 'macho', 'jujubaohime', 'sim'),
(384, 4, 'Charmander', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png', 'fire', '', 'Blaze', 99, 'Charmander is a small, bipedal, dinosaur like Pokémon. Most of its body is colored orange, while its underbelly is a light yellow color. Charmander, along with all of its evolved forms, has a flame that is constantly burning on the end of its tail.', 'macho', 'giihstar', 'não'),
(385, 150, 'Mewtwo', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/150.png', 'psychic', '', 'Pressure', 99, 'It was created by\r\na scientist after\r\nyears of horrific gene splicing and\r\nDNA engineering\r\nexperiments.', 'macho', 'giihstar', 'não'),
(386, 858, 'Hatterene', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/858.png', 'psychic', 'fairy', 'Healer', 13, 'It emits psychic power strong enough to cause\r\nheadaches as a deterrent to the approach\r\nof others.', 'femea', 'giihstar', 'não'),
(387, 471, 'Glaceon', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/471.png', 'ice', '', 'Snow Cloak', 17, 'As a protective technique, it can\r\ncompletely freeze its fur to make\r\nits hairs stand like needles.', 'macho', 'giihstar', 'não'),
(388, 52, 'Meowth', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/52.png', 'normal', '', 'Pickup', 76, 'Adores circular\r\nobjects. Wanders\r\nthe streets on anightly basis to\r\nlook for dropped\r\nloose change.', 'femea', 'jujubaohime', 'não'),
(389, 280, 'Ralts', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/280.png', 'psychic', 'fairy', 'Synchronize', 10, 'RALTS senses the emotions of\r\npeople using the horns on its head.\r\nThis POKéMON rarely appears beforepeople. But when it does, it draws\r\ncloser if it senses that the person has\r\na positive disposition.', 'femea', 'jujubaohime', 'não'),
(390, 872, 'snom', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/872.png', 'ice', 'bug', 'Shield Dust', 24, 'It spits out thread imbued with a frigid sort of\r\nenergy and uses it to tie its body to branches,\r\ndisguising itself as an icicle while it sleeps.', 'femea', 'jujubaohime', 'não'),
(391, 9, 'Blastoise', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/9.png', 'water', '', 'Torrent', 36, 'It deliberately\r\nmakes itself heavy\r\nso it can with­stand the recoil\r\nof the water jets\r\nit fires.', 'femea', 'jujubaohime', 'sim'),
(392, 78, 'Rapidash', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/78.png', 'fire', '', 'Run Away', 76, 'Very competitive,\r\nthis POKéMON will\r\nchase anythingthat moves fast\r\nin the hopes of\r\nracing it.', 'macho', 'jujubaohime', 'sim'),
(393, 179, 'Mareep', 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/179.png', 'electric', '', 'Static', 10, 'If static elec­\r\ntricity builds in\r\nits body, itsfleece doubles in\r\nvolume. Touching\r\nit will shock you.', 'femea', 'jujubaohime', 'sim');

-- --------------------------------------------------------

--
-- Estrutura para tabela `treinador`
--

CREATE TABLE `treinador` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dinheiro` int(11) NOT NULL,
  `genero` enum('masculino','feminino','outro') NOT NULL,
  `insignia` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `treinador`
--

INSERT INTO `treinador` (`id`, `nome`, `username`, `password`, `email`, `dinheiro`, `genero`, `insignia`) VALUES
(1, 'Amélia', 'jujubaohime', 'bd60ca42a4c9822f71139135ad3c5d38', 'ameliadag96@gmail.com', 10, 'feminino', 8),
(2, 'Gabriel', 'giihstar', '0cfde28e2fe1f345e6e8ace61cc8c5ad', 'gabrielranna@outlook.com', 10, 'outro', 7),
(3, 'Gizelle', 'gii', 'e10adc3949ba59abbe56e057f20f883e', 'gizelledias_88@hotmail.com', 323, 'feminino', 5),
(4, 'Arthur', 'Arthur', '202cb962ac59075b964b07152d234b70', 'arthursanches1213@gmail.com', 10, 'masculino', 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_id` (`username_id`) USING BTREE;

--
-- Índices de tabela `treinador`
--
ALTER TABLE `treinador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT de tabela `treinador`
--
ALTER TABLE `treinador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
