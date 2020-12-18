<?php

/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

define('FS_METHOD', 'direct');

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'agenceromeross');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'agenceromeross');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'Qsdfgh54');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'agenceromeross.mysql.db');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ha+zOn!D>q1iQN4j5<R^_5dQfFg=A~T87,o=W8m<^8C--dW|P$2Rd~t{C~W*|?>+');
define('SECURE_AUTH_KEY',  '+ymlGlSv*+$DiIw=K 3lU`fEev`.0?+H+Y9VQy]TQvDk|9_Hwp p.<@ ob0Eq3c>');
define('LOGGED_IN_KEY',    'wa-r^wP9GWz)8%_[~OT^);-!-}b.]V!Bn/c$IcPi<vRH(-] BOkJP{G*tze=gtnQ');
define('NONCE_KEY',        '^kRo$qm$[FOfchZG1be (20w~!iT1i9qbtI&7o?vu6O6[ME#[K*dZ2MnKk<Sj0E<');
define('AUTH_SALT',        '?$?QG|kLP4,qG.19s#Tr*UscvtxpMGQROikK,RqTUY^Q8f97WB:rq[W|AZ 9NWK5');
define('SECURE_AUTH_SALT', '96RlQ(e0g?2y!v=@?2Q^lhz$B*jU.jlOHmzL8E- eZqn=jUsk4i-Yfp||@rfERQ!');
define('LOGGED_IN_SALT',   'k++B-p0F|1|I||W.=UAz14A)Xf7T%&-zS]8B_|6fNc#+Nt>{`Wn8%V?VcFBse/<{');
define('NONCE_SALT',       '<vdu~v*[%0<=P.&{?(xK][a$rf)!HTY=0 }HxLk:7bPk:|%<KH_]N<u^:#q@vQ8]');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

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
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if (!defined('ABSPATH'))
  define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
