<?php require 'header.php'; ?>

<?php
if($_POST){
  $email = $_POST['email'];
  $password = $_POST['password'];

  try {
    $stmt = $pdo->prepare('select * from users where email = ?');
    $stmt->execute(array($email));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($password == $result['password']) {
      session_start();
      $_SESSION['user'] = array(
        'id' => $result['id'],
        'name' => $result['name'],
        'email' => $result['email'],
        'password' => $result['password']
      );

      header('Location: posts.php');
      exit();
    } else {
      $error = 'ユーザーIDあるいはパスワードに誤りがあります。';
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
 ?>

<div class="main users-new">
  <div class="container">
    <div class="form-heading">ログイン</div>
    <div class="form users-form">
      <div class="form-body">
        <div class="form-error"></div>
        <form action="login.php" method="post">
          <p>メールアドレス</p>
          <input type="text" name="email" required>
          <p>パスワード</p>
          <input type="password" name="password" required>
          <input type="submit" value="ログイン">
        </form>
      </div>
    </div>
  </div>
</div>
