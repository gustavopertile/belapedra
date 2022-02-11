<?php

/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'belapedra');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'rootroot');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',**P iMj&mHG$,E-ZJSeA)o-dJ7Y=ZDhX!3|#MeIJw5!b]. !g-B9foinh#2]`[y');
define('SECURE_AUTH_KEY',  '_WV<6iKJ$.~MLOlc&c8%GRwpdFjasYo?iGe/`#bfx/y^gZv[0cFP9-^_+w-q[A$L');
define('LOGGED_IN_KEY',    'Dhx~>01v%fu?qpLBy,&;=N<y-:,Ah?9[Kw:hZ>VI:/<;@-s_N#b7$?sfRF xmE{?');
define('NONCE_KEY',        'ZpW<{t,wQf6L?zz-k/wg|kKA%3^^+7UyS=V&anlZ}]yRu%LX{wq;D&z(k~v%H$LC');
define('AUTH_SALT',        'dr<w-BdNPtGeYjT+#2U<V;Va9Qu-IDwL+6ByGXgOD4ma]kmqh;$S&1Fl;L|r(TZQ');
define('SECURE_AUTH_SALT', '~%d>o93{iS+nSsXo{=bp^%}],6Wr_b]U+4>X5g>mu4R.s:O%aPmD?twg<@wnyu?p');
define('LOGGED_IN_SALT',   'K;0~;~VJB2([jz^-Y}bz+kXBO,g4m#5_RIk-SesN7p.xXDd!K`=fmUo{(+vAxy:V');
define('NONCE_SALT',       'C*~D//2`^Jv`>l04-NF`CsEfFr*RE>BXNqPa+_.p4R]9.vKXNK^wbIy2`]+BMM=.');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';

define('WP_HOME', 'http://belapedra.gustavo.com/');
define('WP_SITEURL', 'http://belapedra.gustavo.com/');
