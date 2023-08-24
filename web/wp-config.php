<?php
/**

 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $XForwaredForParts = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $_SERVER['REMOTE_ADDR'] = !empty($XForwaredForParts[0]) ? $XForwaredForParts[0] : $_SERVER['HTTP_X_FORWARDED_FOR'];
}

define('ENV_LOCAL', ( false !== strrpos( $_SERVER[ 'HTTP_HOST' ], '.code' ) ) );
define('ENV_PREPROD_LONSDALE', ( false !== strrpos( $_SERVER[ 'HTTP_HOST' ], '.preprod.lonsdale.io' ) ) );
define('ENV_PROD', ( !ENV_LOCAL && !ENV_PREPROD_LONSDALE ) );


if (ENV_PROD) {
    /** Enable W3 Total Cache */
    define('WP_CACHE', true);
}

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'soundfuse');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'host.docker.internal:8889');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');


/** Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'z9{WiS+WQ_ 76;-mk)V kbi7QGeznTmwatMyAR$o(wJ#@t;Q6.h/+P[5S(M4?HFF');
define('SECURE_AUTH_KEY',  'KmOny[`gS=_p!8H=VW<Utyk?jK<bIHN,K#IF:ONOIm#-G@rV-+|dp|0}dljMcO 2');
define('LOGGED_IN_KEY',    'US7$5wF6>K)|W4[We!n}/vxh&eKj>!`+-rl&ESivNrl|(V-+E:.<.ps+{M_atLZ^');
define('NONCE_KEY',        '-@{}:c_FuFF=F^;^7hDh(2[z@I-_X$-4yTgH<3C?|Q_jw>H(4Q1a_i5KNek8#YI/');
define('AUTH_SALT',        ',%D:R,`25lvNke%}=V@u?T+9Dh4%eMP+0`VIcTb]&w9?U/>w5[{3N8,c6mJ>z1bZ');
define('SECURE_AUTH_SALT', 'K4vYpn:_o =X|mB)]qb([C)|Ws6#dK5x~{P*C.]Bi#$p]*-@ryp*9Cemv{r*rH|1');
define('LOGGED_IN_SALT',   ')1{]NZcD.21>a}0/N*]T7:yu%2mi,RPJ5uG;t[fF{L]WY|?z<d^-5jNQ)naVpg@-');
define('NONCE_SALT',       '`iMft#Th$Bnxt++AN03$Q|a38me2!C9woxtiQyMq M?`tyj{M>6GzN%v1|:wQ.+j');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'sdf_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_DEBUG_LOG', !ENV_LOCAL);

if (ENV_LOCAL) {
    ini_set('xdebug.var_display_max_depth', '100');
    ini_set('xdebug.var_display_max_children', '512');
    ini_set('xdebug.var_display_max_data', '2048');
}

define('DISALLOW_FILE_EDIT', false);

define( 'AUTOMATIC_UPDATER_DISABLED', false );

if (ENV_PROD || ENV_PREPROD_LONSDALE) {
    define('DISALLOW_FILE_MODS', true);
}

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
    $_SERVER['HTTPS'] = 'on';

$is_ssl = filter_var( empty( $_SERVER[ 'HTTPS' ] ) ? false : $_SERVER[ 'HTTPS' ], FILTER_VALIDATE_BOOLEAN );
if ( isset( $_SERVER[ 'HTTP_HOST' ] ) ) {
    /* Custom WordPress URL. */
    define( 'WP_SITEURL', sprintf( '%s://%s', $is_ssl ? 'https' : 'http', $_SERVER[ 'HTTP_HOST' ] ) );
    define( 'WP_HOME', sprintf( '%s://%s', $is_ssl ? 'https' : 'http', $_SERVER[ 'HTTP_HOST' ] ) );
    /* If SSL */
    if ($is_ssl) {
        define('FORCE_SSL_LOGIN', true);
        define('FORCE_SSL_ADMIN', true);
    }
}

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
