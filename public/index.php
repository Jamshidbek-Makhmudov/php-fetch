<?php

declare(strict_types = 1);

// use App\App;
// use App\Config;
use App\Router;
use App\Controllers\HomeController;

require_once __DIR__ . '/../vendor/autoload.php';
try {
	# code...
	$db=new PDO ('mysql:host=db; dbname=my_db','root','root',[
		// PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ         #object xolatda chiqaradi
	]);

	$email='jane@gmail.com';
	$name='james Adams';
	$isActive=1;
	$createdAt=date('Y-m-d H:m:i', strtotime('07/11/2021 9:00PM'));
	$query = 'INSERT INTO users(email,full_name, is_active, created_at)
	VALUES (:email,:name,:active,:date)';
	$stmt=$db->prepare($query);
	$stmt->execute(['email'=>$email,'name'=>$name,'active'=>$isActive,'date'=>$createdAt]);
	$id=(int) $db->lastInsertId();
	$user=$db->query('SELECT * FROM users WHERE id= ' . $id)->fetch();
	echo "<pre>";
	var_dump($user);
	
	echo "<pre>";

	

	//  $query='SELECT * FROM users';
	// $stmt=$db->query($query);
	// var_dump($stmt->fetchAll());

	// foreach($db->query($query) as $user){
	// 	echo "<pre>";
	// 	var_dump($user);
		
	// 	echo "<pre>";
	// }
	
} catch (\PDOException $e) {
	# code...
	var_dump($e->getCode());

	throw new \PDOException($e->getMessage(), (int) $e->getCode());

}
var_dump($db);
 





// $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
// $dotenv->load();

// define('STORAGE_PATH', __DIR__ . '/../storage');
// define('VIEW_PATH', __DIR__ . '/../views');

// $router = new Router();

// $router
//     ->get('/', [HomeController::class, 'index']);

// (new App(
//     $router,
//     ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
//     new Config($_ENV)
// ))->run();