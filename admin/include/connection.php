<? 
error_reporting(0);
//require_once '../../config/db.php';
// require_once __DIR__ .'/config/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/config/db.php';

session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /auth.php');
}
