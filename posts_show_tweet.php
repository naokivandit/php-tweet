
<?php require 'pdo.php'; ?>

<?php
$sql=$pdo->prepare('SELECT * FROM tweets WHERE user_id = 1 order by tweet_id desc ;');
$sql->execute([]);
?>

<?php foreach ($sql->fetchAll() as $row): ?>
  <div class="posts-index-item">
    <div class="post-left"><img src="img/<?=$row['user_id'] ?>.jpg"></div>
    <div class="post-right">
      <div class="post-user-name"></div>
      <a href="posts_show.php?tweet_id=<?=$row['tweet_id'] ?>"><?=$row['content'] ?></a>
    </div>
  </div>
<?php endforeach; ?>
