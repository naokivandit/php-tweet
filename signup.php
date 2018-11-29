<?php require 'header.php';

if($_POST['signup']){
  $stmt = $pdo->prepare('insert into users(name, email, password) values(:name, :email, :password)');
  $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
  $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
  $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
  $stmt->execute();

  $stmt = $pdo->prepare('select * from users where email = ?');
  $stmt->execute(array($_POST['email']));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  session_start();
  $_SESSION['user'] = array(
    'id' => $result['id'],
    'name' => $result['name'],
    'email' => $result['email'],
    'password' => $result['password']
  );

  header('Location: users.php');
  exit();

}
?>

<div class="main users-new">
  <div class="container">
    <div class="form-heading">新規ユーザー登録</div>
    <div class="form users-form">
      <div class="form-body">
        <div class="form-error">
        </div>
        <form action="signup.php" method="post">
          <input type="hidden" name="signup">
          <p>ユーザー名</p>
          <input type="text" name="name" required>
          <p>メールアドレス</p>
          <input type="text" name="email" required>
          <p>パスワード</p>
          <input type="password" name="password" required>
          <input type="submit" name="signup" value="新規登録">
        </form>
      </div>
    </div>
  </div>
</div>
