<?php require 'header.php'; ?>
<?php
$sql=$pdo->prepare('SELECT * FROM `users` where id = ?');
$sql->execute([$_REQUEST['id']]);
?>

<?php
$sql2=$pdo->prepare('
  SELECT * FROM tweets
  LEFT OUTER JOIN users
  ON tweets.user_id = users.id
  WHERE user_id = ?
  ORDER BY tweets.updated DESC
');
$sql2->execute([
  $_REQUEST['id']
]);
?>

<div class="main user-show">
  <div class="container">
    <?php foreach ($sql->fetchAll() as $row): ?>
      <div class="user">
        <img src="img/<?=$row['id'] ?>.jpg">
        <h2><?=$row['name'] ?></h2>
        <p><?=$row['email'] ?></p>
        <a href ="users_edit.php?id=<?=$row['id'] ?>">編集</a>
      </div>
      <ul class="user-tabs">
        <li class="active"><a>投稿</a></li>
      </ul>
    <?php endforeach; ?>


<!-- ここは関数を使って上に持っていきたい -->


    <?php foreach ($sql2->fetchAll() as $row): ?>
      <div class="posts-index-item">
        <div class="post-left"><img src="img/<?=$row['id'] ?>.jpg"></div>
        <div class="post-right"><div class="post-user-name"><a href="users_show.php?id=<?=$row['id'] ?>"><?=$row['name'] ?></a>
        </div>
          <a href="posts_show.php?tweet_id=<?=$row['tweet_id'] ?>"><?=$row['content'] ?></a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
