## 介绍

这是一个WordPress构建的项目DEMO，[参考视频](https://www.youtube.com/watch?v=ViZLtFIcSfo&list=PLriKzYyLb28kpEnFFi9_vJWPf5-_7d3rX)

进行中...[Create a Premium WordPress Theme - 12](https://www.youtube.com/watch?v=UTS536CE8E4&list=PLriKzYyLb28kpEnFFi9_vJWPf5-_7d3rX&t=3)

## 安装

```
git clone git@github.com:curder/wordpress-theme-development.git
cp wp-config-sample.php wp-config.php
```

## 配置

新建数据库并配置如下数据库信息。

### 配置MySQL数据库连接
```
// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'database_name_here');

/** MySQL数据库用户名 */
define('DB_USER', 'username_here');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'password_here');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');
```

### 开启调试日志
```
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
```

### 配置站点信息

输入站点域名`http://yourdomain.com`输入站点信息和管理员信息后确认。

### 选择主题

在浏览器上输入`http://yourdomain.com/wp-login.php`访问登录页面后输入管理员信息来到后台，选择"外观"->"主题"->"SunSet"，即可。
