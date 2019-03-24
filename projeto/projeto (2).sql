-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Mar-2019 às 00:23
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Text` mediumtext NOT NULL,
  `Author` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `article`
--

INSERT INTO `article` (`idArticle`, `Title`, `Text`, `Author`, `Email`, `status`) VALUES
(3, 'teste3', 'Tire todas as suas dÃºvidas com o tutorial de InscriÃ§Ã£o Encceja 2019\r\nAs inscriÃ§Ãµes para o Exame Nacional para CertificaÃ§Ã£o de CompetÃªncias de Jovens e Adultos (Encceja Nacional) 2019 estÃ£o prevista para abril, e poderÃ£o ser feitas exclusivamente pela internet. O Sistema de InscriÃ§Ã£o Encceja 2019 tambÃ©m pode ser acessado por meio do Portal do Instituto Nacional de Estudos e Pesquisas Educacionais AnÃ­sio Teixeira (Inep). A plicaÃ§Ã£o das provas do Encceja 2019 estÃ£o previstas para o mÃªs de agosto.\r\n\r\nO Exame Ã© direcionado aos jovens e adultos que nÃ£o tiveram a oportunidade de concluir seus estudos na idade apropriada para cada nÃ­vel de ensino. A participaÃ§Ã£o Ã© voluntÃ¡ria e gratuita, mas existe uma idade mÃ­nima exigida. Quem visa a CertificaÃ§Ã£o de ConclusÃ£o do Ensino Fundamental precisa ter 15 anos completos na data de realizaÃ§Ã£o do Exame. Quem visa a CertificaÃ§Ã£o de ConclusÃ£o do Ensino MÃ©dio precisa ter 18 anos completos.\r\n\r\nTutorial de InscriÃ§Ã£o Encceja 2019\r\nTela Inicial\r\n\r\n1) Informe seu CPF e sua data de nascimento.\r\n2) Responda o desafio das figuras.\r\n3) Clique em â€œenviarâ€.\r\n\r\nTela Dados Pessoais\r\n\r\n1) Confira seus dados pessoais apresentados automaticamente pelo Sistema (CPF, nome completo, data de nascimento e nome da mÃ£e). Caso nÃ£o estejam corretos, entre em contato com o 0800-616161.\r\n2) Preencha os campos solicitados (sexo, cor ou raÃ§a, nÃºmero do RG, Ã³rgÃ£o expedidor, UF onde a carteira de identidade foi emitida, estado civil, nacionalidade, estado e municÃ­pio de nascimento).\r\n3) Clique em â€œprÃ³ximoâ€.\r\n\r\nTela EndereÃ§o\r\n\r\n1) Digite seu CEP (caso nÃ£o saiba recorra Ã  ferramenta de pesquisa).\r\n2) Confira os dados apresentados automaticamente pelo Sistema\r\n4) Indique o auxÃ­lio/recurso de acordo com sua necessidade.\r\n5) Clique no box, que aparece na parte inferior da tela, para confirmar a veracidade das informaÃ§Ãµes prestadas.\r\n6) Insira o documento (laudo mÃ©dico) que comprove sua condiÃ§Ã£o.\r\n7) Clique em â€œprÃ³ximoâ€.\r\n\r\nTela de Atendimento Especializado\r\n\r\nSe vocÃª nÃ£o precisa de atendimento especializado para fazer a prova\r\n\r\n1) Escolha a opÃ§Ã£o â€œNÃ£oâ€.\r\n2) Clique em â€œprÃ³ximoâ€.\r\n\r\nTela de Atendimento EspecÃ­fico\r\n\r\nSe vocÃª precisa de algum atendimento especÃ­fico para fazer a prova\r\n\r\n1) Escolha a opÃ§Ã£o â€œSimâ€.\r\n2) Indique o motivo da solicitaÃ§Ã£o.\r\n3) Indique o auxÃ­lio/recurso de acordo com sua necessidade.\r\n4) Clique em â€œprÃ³ximoâ€.', 'teste', 'teste@email.com', 'pendente'),
(4, 'Teste text area', '<div style=\"text-align: justify;\"><ol><li>O jQuery Ã© uma biblioteca de Javascript â€œleveâ€, fÃ¡cil de utilizar no sentido â€œescrever menos, fazer maisâ€. Esta biblioteca foi desenvolvida por John Resig, um programador de Javascript. O site oficial do JQuery fica em www.jQuery.com.<br></li></ol></div><div style=\"text-align: justify;\"><font size=\"2\"><br></font></div><div style=\"text-align: justify;\"><span style=\"color: rgb(36, 39, 41); text-align: left;\"><font size=\"2\" style=\"\" face=\"impact\">O jQuery Ã© uma biblioteca de Javascript â€œleveâ€, fÃ¡cil de utilizar no sentido â€œescrever menos, fazer maisâ€. Esta biblioteca foi desenvolvida por John Resig, um programador de Javascript. O site oficial do JQuery fica em www.jQuery.com</font></span><span style=\"color: rgb(36, 39, 41); font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: left;\"><br></span></div>', 'rodrigo', 'rodrigo@mail.com', 'aguardandoparec'),
(5, 'teste layout', '<h5><font face=\"arial\" size=\"2\">button.css3button {<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>font-family: Arial, Helvetica, sans-serif;<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>font-size: 14px;<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>color: #ffffff;<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>padding: 7px 17px;<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>background: -moz-linear-gradient(<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>top,<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>#dc56f7 0%,<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>#ff00dd);<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>background: -webkit-gradient(<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>linear, left top, left bottom,<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>from(#dc56f7),<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>to(#ff00dd));<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>-moz-border-radius: 16px;<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>-webkit-border-radius: 16px;<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>border-radius: 16px;<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>border: 3px solid #9c969c;<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>-moz-box-shadow:<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>3px 3px 11px rgba(0,0,0,0.4),<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>inset 0px 0px 4px rgba(51,51,51,1);<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>-webkit-box-shadow:<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>3px 3px 11px rgba(0,0,0,0.4),<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>inset 0px 0px 4px rgba(51,51,51,1);<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>box-shadow:<span style=\"background-color: rgb(0, 153, 153);\"><br></span></font><font face=\"arial\" size=\"2\" style=\"background-color: rgb(0, 0, 0);\"><span style=\"white-space: pre;\">	<font color=\"#009999\" style=\"\">	</font></span><font color=\"#009999\" style=\"\">3px 3px 11px rgba(0,0,0,0.4),<br></font></font><font color=\"#009999\"><span style=\"background-color: rgb(0, 0, 0);\"><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">		</span>inset 0px 0px 4px rgba(51,51,51,1);<br></font><font face=\"arial\" size=\"2\"><span style=\"white-space:pre\">	</span>text-shadow:<br></font></span><font face=\"arial\" size=\"2\"><span style=\"background-color: rgb(0, 0, 0);\"><span style=\"white-space: pre;\">		</span>0px -1px 0px rgba(0,0,0,0.2),</span><br></font></font><font face=\"arial\" size=\"2\"><font color=\"#009999\"><span style=\"white-space:pre\">		</span>0px 1px 0px rgba(255,255,255,0.3);</font><br></font><font face=\"arial\" size=\"2\">}</font></h5><div><img src=\"https://i.imgur.com/jOzZ1IY.jpg\" width=\"855\"><font face=\"arial\" size=\"2\"><br></font></div><div><br></div>', 'teste', 'raaiandrade67@email.com', 'pendente'),
(6, 'testeerro', 'aa', 'teste', 'lima_amandas@yahoo.com.br', 'aprovado'),
(7, 'testee', 'teste', 'aaaa', 'jaisankevine@outlook.com', 'incerto'),
(8, 'ijwajawdjioaw', '<span style=\"color: rgb(123, 136, 152); font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif; font-size: 26px; background-color: rgb(255, 255, 255);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>', 'aaa', 'teste@teste.com', 'reprovado'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing', '<p style=\"-webkit-tap-highlight-color: transparent; margin-top: 1.5em; margin-bottom: 1.5em; font-size: 1.1875em; font-weight: 400; font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif; line-height: 1.5; animation: fadeInLorem 1000ms linear 0s 1 normal none running;\"><span style=\"background-color: rgb(255, 255, 255);\"><font color=\"#000000\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet consectetur adipiscing elit ut aliquam purus sit amet. Vitae semper quis lectus nulla. Amet nisl purus in mollis nunc sed id semper. Habitant morbi tristique senectus et. Consectetur adipiscing elit pellentesque habitant morbi. Vel turpis nunc eget lorem dolor sed viverra. In cursus turpis massa tincidunt dui ut ornare. Blandit volutpat maecenas volutpat blandit aliquam etiam erat velit. Tellus id interdum velit laoreet id donec. Ac placerat vestibulum lectus mauris ultrices eros in cursus turpis. Ipsum nunc aliquet bibendum enim facilisis gravida neque convallis. Integer enim neque volutpat ac tincidunt vitae semper quis lectus. Ornare aenean euismod elementum nisi quis eleifend. Viverra mauris in aliquam sem fringilla ut morbi. Tellus id interdum velit laoreet id. Pulvinar sapien et ligula ullamcorper malesuada proin libero nunc. Nam aliquam sem et tortor consequat id porta. Tellus elementum sagittis vitae et leo duis ut. Justo eget magna fermentum iaculis eu.</font></span></p><p style=\"-webkit-tap-highlight-color: transparent; margin-top: 1.5em; margin-bottom: 1.5em; font-size: 1.1875em; font-weight: 400; font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif; line-height: 1.5; animation: fadeInLorem 1000ms linear 0s 1 normal none running;\"><span style=\"background-color: rgb(255, 255, 255);\"><font color=\"#000000\">Vitae purus faucibus ornare suspendisse sed nisi lacus sed. Urna duis convallis convallis tellus. Amet venenatis urna cursus eget nunc scelerisque viverra mauris. Sit amet porttitor eget dolor morbi non arcu. Vel pretium lectus quam id leo in vitae turpis. Senectus et netus et malesuada. Venenatis urna cursus eget nunc scelerisque viverra. Cras semper auctor neque vitae tempus. Ultrices neque ornare aenean euismod. Augue mauris augue neque gravida in fermentum et. Dui vivamus arcu felis bibendum ut.</font></span></p><p style=\"-webkit-tap-highlight-color: transparent; margin-top: 1.5em; margin-bottom: 1.5em; font-size: 1.1875em; font-weight: 400; font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif; line-height: 1.5; animation: fadeInLorem 1000ms linear 0s 1 normal none running;\"><span style=\"background-color: rgb(255, 255, 255);\"><font color=\"#000000\">Nibh venenatis cras sed felis. Vulputate eu scelerisque felis imperdiet proin fermentum. Ac odio tempor orci dapibus ultrices in iaculis. Et netus et malesuada fames ac turpis. Mauris in aliquam sem fringilla ut. Enim sit amet venenatis urna cursus eget nunc scelerisque. Faucibus nisl tincidunt eget nullam non nisi est sit. Molestie at elementum eu facilisis. Urna porttitor rhoncus dolor purus non enim praesent elementum facilisis. Eget velit aliquet sagittis id consectetur purus ut faucibus. Id porta nibh venenatis cras sed felis eget velit. Netus et malesuada fames ac turpis egestas. Lectus vestibulum mattis ullamcorper velit sed.</font></span></p><p style=\"-webkit-tap-highlight-color: transparent; margin-top: 1.5em; margin-bottom: 1.5em; font-size: 1.1875em; font-weight: 400; font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif; line-height: 1.5; animation: fadeInLorem 1000ms linear 0s 1 normal none running;\"><span style=\"background-color: rgb(255, 255, 255);\"><font color=\"#000000\">Integer vitae justo eget magna fermentum iaculis eu non diam. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo nulla. Sagittis nisl rhoncus mattis rhoncus urna neque. Cursus vitae congue mauris rhoncus aenean vel. At in tellus integer feugiat. Enim sit amet venenatis urna cursus. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Diam vulputate ut pharetra sit amet aliquam id. Posuere lorem ipsum dolor sit amet consectetur adipiscing. Pellentesque habitant morbi tristique senectus et netus et malesuada. Condimentum id venenatis a condimentum vitae sapien pellentesque habitant morbi. Quisque non tellus orci ac auctor augue mauris. Vel fringilla est ullamcorper eget. Ut morbi tincidunt augue interdum velit euismod in. Ut placerat orci nulla pellentesque.</font></span></p><p style=\"-webkit-tap-highlight-color: transparent; margin-top: 1.5em; margin-bottom: 1.5em; font-size: 1.1875em; font-weight: 400; font-family: &quot;Mercury SSm A&quot;, &quot;Mercury SSm B&quot;, Georgia, Times, &quot;Times New Roman&quot;, &quot;Microsoft YaHei New&quot;, &quot;Microsoft Yahei&quot;, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif; line-height: 1.5; animation: fadeInLorem 1000ms linear 0s 1 normal none running;\"><span style=\"background-color: rgb(255, 255, 255);\"><font color=\"#000000\">Tincidunt augue interdum velit euismod. Orci porta non pulvinar neque laoreet. Rutrum quisque non tellus orci ac auctor augue mauris. Eu mi bibendum neque egestas congue quisque egestas diam. Varius quam quisque id diam vel quam elementum pulvinar. Ac tincidunt vitae semper quis lectus. Suspendisse sed nisi lacus sed viverra tellus in hac habitasse. Ligula ullamcorper malesuada proin libero nunc consequat interdum. Donec massa sapien faucibus et molestie ac feugiat. Hendrerit gravida rutrum quisque non tellus orci ac auctor augue. Vel risus commodo viverra maecenas. Ut porttitor leo a diam sollicitudin tempor id. Quis auctor elit sed vulputate mi sit amet mauris commodo. Ut enim blandit volutpat maecenas volutpat blandit aliquam. Varius morbi enim nunc faucibus a pellentesque. Ut faucibus pulvinar elementum integer. Commodo elit at imperdiet dui accumsan. Varius duis at consectetur lorem donec massa sapien. Eu turpis egestas pretium aenean pharetra magna.</font></span></p>', 'LIADJWIOJDADJOIAW', 'walkdpokdapowdoawdk@email.com', 'aprovado'),
(10, 'teste', 'a', 'a', 'teste@email.com', 'pendente'),
(11, 'apagar teste', 'a', 'aaa', 'aaa@aa.com', 'pendente'),
(12, 'apagar teste', 'a', 'w', 'walkdpokdapowdoawdk@email.com', 'pendente'),
(13, '21312312', '12312312', '13212312', 'aaa@aa.com', 'pendente'),
(14, 'amanda e feia', 'amanda eeee feeeeia<img src=\"https://i.imgur.com/L9Ywavq.jpg\" width=\"850\">', 'amanda', 'lima_amandas@yahoo.com.br', 'reprovado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avarticle`
--

CREATE TABLE `avarticle` (
  `idavArticle` int(11) NOT NULL,
  `comments` mediumtext NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `parecer` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avarticle`
--

INSERT INTO `avarticle` (`idavArticle`, `comments`, `idUser`, `idArticle`, `parecer`) VALUES
(13, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 2, 6, 'ap'),
(14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, 6, 'ap'),
(15, 'APROEOPJKFAOPKFAOPWKFAWOFKOAPKWF', 2, 8, 'rp'),
(16, 'SWEFAABABA AA A A A A ', 3, 8, 'rp'),
(19, 'aaaaaaaaaaaaaaa', 2, 7, 'rp'),
(20, 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 3, 7, 'ap'),
(24, 'Lorem Ipsum Dolor Amet', 2, 9, 'ap'),
(25, 'asdasdsadsadasdasdsadasdasdsadasdasdasd', 3, 9, 'ap'),
(26, 'ta ruim', 2, 14, 'rp'),
(27, 'ta ruim', 3, 14, 'rp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `idSoli` int(11) NOT NULL,
  `nameSoli` varchar(60) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `PassSoli` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nameUser` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Pass` varchar(80) NOT NULL,
  `Level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `nameUser`, `Email`, `Pass`, `Level`) VALUES
(1, 'Lanuza Lima', 'administrador@email.com', '$2y$10$St/iQtsjhIYYnr/7g3/GqObBmcWt3r2/FEIKxw7fvcQNO5GCI2PP6', 'admin'),
(2, 'Rodrigo Parecerista', 'teste@email.com', '$2y$10$St/iQtsjhIYYnr/7g3/GqObBmcWt3r2/FEIKxw7fvcQNO5GCI2PP6', 'parecerista'),
(3, 'teste3', 'testep@email.com', '$2y$10$6oMCcKF95pM6pF4GGfE7uOmRIkvx56107Z3WLvJWDb5uL/oS7NAVe', 'parecerista'),
(4, 'JosÃ©', 'jose@email.com', '$2y$10$BUMb9YH4yS3oGKW0BlyAw.gzOa5PS2s4lvR2PSEQlUFhi.3x9VvL.', 'parecerista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `userart`
--

CREATE TABLE `userart` (
  `iduserArt` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `userart`
--

INSERT INTO `userart` (`iduserArt`, `idUser`, `idArt`) VALUES
(1, 2, 4),
(2, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`);

--
-- Indexes for table `avarticle`
--
ALTER TABLE `avarticle`
  ADD PRIMARY KEY (`idavArticle`),
  ADD KEY `idUser_fk` (`idUser`),
  ADD KEY `idArticle_fk` (`idArticle`) USING BTREE;

--
-- Indexes for table `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`idSoli`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `userart`
--
ALTER TABLE `userart`
  ADD PRIMARY KEY (`iduserArt`),
  ADD KEY `idUser_fk` (`idUser`),
  ADD KEY `idArt_fk` (`idArt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `avarticle`
--
ALTER TABLE `avarticle`
  MODIFY `idavArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `idSoli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userart`
--
ALTER TABLE `userart`
  MODIFY `iduserArt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
