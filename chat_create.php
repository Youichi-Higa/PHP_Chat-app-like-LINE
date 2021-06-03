<?php
// var_dump($_POST);
// exit();

if (
  !isset($_POST['u_name']) || $_POST['u_name'] == '' ||
  !isset($_POST['u_message']) || $_POST['u_message'] == ''
) {
  exit('ParamError');
}

$u_name = $_POST["u_name"];
$u_message = $_POST["u_message"];

// DB接続情報
$dbn = 'mysql:dbname=gsacf_l05_07;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

$sql = 'INSERT INTO chat_table(id, u_name, u_message, created_at) VALUES(NULL, :u_name, :u_message, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_name', $u_name, PDO::PARAM_STR);
$stmt->bindValue(':u_message', $u_message, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  header('Location:chat_input.php');
};
