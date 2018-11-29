<?php require 'header.php'; ?>

<?php
$sql=$pdo->prepare('SELECT * FROM users where id = ?');
$sql->execute([
  htmlspecialchars($_GET['id'])
]);
?>

<?php
if (isset($_REQUEST['update'])) {
  $sql2=$pdo->prepare('
    UPDATE users
    SET name = ?, email = ?, password = ?
    WHERE id= ?
    ');
  $sql2->execute([
    htmlspecialchars($_REQUEST['name']),
    htmlspecialchars($_REQUEST['email']),
    htmlspecialchars($_REQUEST['password']),
    htmlspecialchars($_REQUEST['id'])
  ]);
  header("Location: users_edit.php?id=" . $_REQUEST["id"]);
}
?>

<div class="main users-edit">
  <div class="container">
    <div class="form-heading">アカウント編集</div>
    <div class="form users-form">
      <div class="form-body">
        <div class="form-error"></div>
        <?php foreach ($sql->fetchAll() as $row): ?>
        <form action="users_edit.php?id=<?=$row['id'] ?>" method="post">
          <input type="hidden" name="update" value="update">

            <input type="text" name="id" value="<?=$row['id'] ?>">
            <p>ユーザー名</p>
            <input name="name" value="<?=$row['name'] ?>">
            <p>画像</p>
            <input name="image" type="file">
            <p>メールアドレス</p>
            <input name="email" value="<?=$row['email'] ?>">
            <p>パスワード</p>
            <input type="password" name="password" value="<?=$row['password'] ?>">
            <input type="submit" value="保存">
          <?php endforeach; ?>
        </form>
      </div>
    </div>
  </div>
</div>
