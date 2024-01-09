<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = getenv("MYSQL_ADDON_HOST");
$CFG->dbname    = getenv("MYSQL_ADDON_DB");
$CFG->dbuser    = getenv("MYSQL_ADDON_USER");
$CFG->dbpass    = getenv("MYSQL_ADDON_PASSWORD");
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => getenv("MYSQL_ADDON_PORT"),
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_0900_ai_ci',
);

$CFG->wwwroot   = getenv("URL");
$CFG->dataroot  = getenv("APP_HOME") . '/moodledata';
$CFG->admin     = getenv("ADMIN");

$CFG->directorypermissions = 0777;

$CFG->sslproxy = true;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
