<?php require 'header.php'; ?>

<?php
$sql=$pdo->prepare('
  SELECT * FROM tweets
  LEFT OUTER JOIN users
  ON tweets.user_id = users.id
  where tweets.tweet_id = ?
  ');
$sql->execute([
  $_REQUEST['tweet_id']
]);
?>

<?php foreach ($sql->fetchAll() as $row): ?>
<div class="main posts-show">
  <div class="container">
    <div class="posts-show-item">
      <div class="post-user-name">
        <img src="img/<?=$row['id']?>.jpg">
        <a href="users_show.php?id=<?=$row['id']?>'"><?=$row['name'] ?></a>
      </div>
      <p><?=$row['content'] ?></p>
      <div class="post-time"><?=$row['updated'] ?></div>
      <span class="fa fa-heart like-btn-unlike"></span>
      <span class="fa fa-heart like-btn">1</span>
      <div class="post-menus">
        <a href="posts_edit.php?tweet_id=<?=$row['tweet_id'] ?>">編集</a>
        <form action="posts.php" method="post">
        <input type="hidden" name="delete" value="delete">
        <input type="hidden" name="tweet_id" value="<?=$row['tweet_id'] ?>">
        <input type="submit" value="削除">
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
