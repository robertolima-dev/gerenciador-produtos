
CREATE TABLE `tb_cadastro` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tb_cadastro` (`id_usuario`, `nome`, `email`, `senha`, `status`) VALUES
(1, 'Roberto', 'roberto@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Joao', 'joao@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'Ana', 'ana@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e', 1);



CREATE TABLE `tb_categoria` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `tb_categoria` (`id_categoria`, `id_usuario`, `name`, `code`, `status`) VALUES
(1, 1, 'EletrÃ´nicos', '123EL', 1),
(2, 3, 'Bebe e crianÃ§a', '123BC', 1),
(3, 1, 'Alimentos', '123AL', 1),
(4, 1, 'Bebidas', '123BD', 1),
(5, 3, 'AgronegÃ³cios', '123AG', 1),
(6, 1, 'Outros', '123OT', 1);


CREATE TABLE `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `category1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tb_produto` (`id_produto`, `id_usuario`, `photo`, `sku`, `name`, `price`, `quantity`, `category1`, `category2`, `description`, `status`) VALUES
(1, 1, 'foto_2019_146_14540_509.jpg', '12345-TV', 'TV de plasma', '1200', '15', 'EletrÃ´nicos', 'Outros', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer libero nibh, pulvinar quis rutrum sed, lacinia quis neque. Vivamus quis magna ac mi volutpat rutrum vel eu neque. Quisque a elementum purus. Sed at molestie lacus. Ut eu euismod tellus, non fringilla lorem. Cras vulputate, nulla eu vestibulum tempor, ipsum est egestas ligula, et egestas orci lacus et nunc. Praesent rutrum commodo est ut elementum. Proin ac felis justo. Nunc congue est tellus, at rhoncus orci semper lacinia. Aenean et sollicitudin sapien. Quisque non ante at ligula sollicitudin varius ac vitae arcu.', 1),
(2, 1, 'foto_2019_146_141622_298.jpg', '12345-NTB', 'Notebook', '1500', '23', 'EletrÃ´nicos', 'Outros', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer libero nibh, pulvinar quis rutrum sed, lacinia quis neque. Vivamus quis magna ac mi volutpat rutrum vel eu neque. Quisque a elementum purus. Sed at molestie lacus. Ut eu euismod tellus, non fringilla lorem. Cras vulputate, nulla eu vestibulum tempor, ipsum est egestas ligula, et egestas orci lacus et nunc. Praesent rutrum commodo est ut elementum. Proin ac felis justo. Nunc congue est tellus, at rhoncus orci semper lacinia. Aenean et sollicitudin sapien. Quisque non ante at ligula sollicitudin varius ac vitae arcu.', 1),
(3, 3, 'foto_2019_146_14219_983.jpg', '123-RP1', 'Roupa de bebÃª RN', '35', '100', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer libero nibh, pulvinar quis rutrum sed, lacinia quis neque. Vivamus quis magna ac mi volutpat rutrum vel eu neque. Quisque a elementum purus. Sed at molestie lacus. Ut eu euismod tellus, non fringilla lorem. Cras vulputate, nulla eu vestibulum tempor, ipsum est egestas ligula, et egestas orci lacus et nunc. Praesent rutrum commodo est ut elementum. Proin ac felis justo. Nunc congue est tellus, at rhoncus orci semper lacinia. Aenean et sollicitudin sapien. Quisque non ante at ligula sollicitudin varius ac vitae arcu.', 1),
(4, 3, 'foto_2019_146_142140_994.jpg', '123-RP2', 'Roupinha de bebÃª', '45', '180', 'Bebe e crianÃ§a', 'Outros', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer libero nibh, pulvinar quis rutrum sed, lacinia quis neque. Vivamus quis magna ac mi volutpat rutrum vel eu neque. Quisque a elementum purus. Sed at molestie lacus. Ut eu euismod tellus, non fringilla lorem. Cras vulputate, nulla eu vestibulum tempor, ipsum est egestas ligula, et egestas orci lacus et nunc. Praesent rutrum commodo est ut elementum. Proin ac felis justo. Nunc congue est tellus, at rhoncus orci semper lacinia. Aenean et sollicitudin sapien. Quisque non ante at ligula sollicitudin varius ac vitae arcu.', 1);


ALTER TABLE `tb_cadastro`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_categoria`);


ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_produto`);


ALTER TABLE `tb_cadastro`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `tb_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
