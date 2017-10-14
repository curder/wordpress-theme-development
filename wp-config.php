<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'wordpress_dev');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', '');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8mb4');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '76Almn@_K%/j[))NfG_Jq[[f(l4fGh,BQUEZr{{|Vc+or%C%8EK#g&7jhA,U%@V[');
define('SECURE_AUTH_KEY',  '1;.XpklB*6DFC$m2t;aQ5P.9au^4 TZG4:Mt)a:b70H]vxOzLhiJuw;b@:$fAhWd');
define('LOGGED_IN_KEY',    '6Xvb-^}|>q>iDi3.u?G,.@SMB<=zI4F8H2k9-,^M;>x7Swlf-,^zRQ+N6|f<ZqCw');
define('NONCE_KEY',        'XDn/@WbO?wyI>n!QR+zj]T?1({0O#R/!&}8o]?-g-I*yr8?9P/JhE3/|&n:R$~n+');
define('AUTH_SALT',        '[y*-|WK|%u8a9h{:KrlM^+hCnlTxp2NT,.)}/1Gj<U-vfvVq&y$k84+`Tb>0m6:v');
define('SECURE_AUTH_SALT', 'U@@u$ 5r`PZ|vQ1bRBfZ6/ugv:u>x=NTdv3(K~ jK1d#xMOK2<9g_!ob#I<@$q$}');
define('LOGGED_IN_SALT',   '7LFNZa !2D!#.N.*s$ED@Um)KoK1ohBz;it#D``lJ!4bt?-wT>.9[>spJ .#]fTx');
define('NONCE_SALT',       'np4%Gs>G9`;PTi3Y56Yxo7lLOCpb,UAGGF_11@?6q$^,i`U*]=GmB@9{/xp3!}l4');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
