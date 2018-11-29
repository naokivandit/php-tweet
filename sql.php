<?php require 'pdo.php'; ?>
<?php
$sql=$pdo->prepare('SELECT * FROM users');
$sql->execute([]);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データベース</title>
  <link rel="stylesheet" href="css/test.css">
</head>
<body>
  <h1>usersデータ</h1>
  <table border=1>
    <tr style="background: yellowgreen;">
      <th>id</th>
      <th>name</th>
      <th>email</th>
      <th>password</th>
      <th>created</th>
      <th>updated</th>
    </tr>
    <?php foreach ($sql->fetchAll() as $row): ?>
      <tr>
        <td><?=$row['id'] ?></td>
        <td><?=$row['name'] ?></td>
        <td><?=$row['email'] ?></td>
        <td><?=$row['password'] ?></td>
        <td><?=$row['created'] ?></td>
        <td><?=$row['updated'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <br/>

  <h1>tweetsデータ</h1>
  <table border = 1>
    <tr style="background: yellowgreen;">
      <th>tweet_id</th>
      <th>user_id</th>
      <th>content</th>
      <th>created</th>
      <th>updated</th>
    </tr>
    <?php
    $sql=$pdo->prepare('SELECT * FROM tweets');
    $sql->execute([]);
    ?>
    <?php foreach ($sql->fetchAll() as $row): ?>
      <tr>
        <td><?=$row['tweet_id'] ?></td>
        <td><?=$row['user_id'] ?></td>
        <td><?=$row['content'] ?></td>
        <td><?=$row['created'] ?></td>
        <td><?=$row['updated'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <br/>

  <h1>ユーザー全体ツイート！</h1>
  <table border="1">
    <tr style="background: yellowgreen;">
      <th>user_id</th>
      <th>name</th>
      <th>content</th>
      <th>created</th>
      <th>updated</th>
    </tr>
    <?php
    $sql=$pdo->prepare('
      SELECT * FROM tweets
      LEFT OUTER JOIN users
      ON tweets.user_id = users.id
      ORDER BY user_id ASC
      ');
    $sql->execute([]);
    ?>
    <?php foreach ($sql->fetchAll() as $row): ?>
      <tr>
        <td><?=$row['user_id'] ?></td>
        <td><?=$row['name'] ?></td>
        <td><?=$row['content'] ?></td>
        <td><?=$row['created'] ?></td>
        <td><?=$row['updated'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

</body>
</html>