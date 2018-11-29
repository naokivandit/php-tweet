<?php require 'header.php'; ?>

<?php
//ツイート投稿
if (isset($_REQUEST['command'])) {
  $sql=$pdo->prepare('
    INSERT INTO tweets(user_id, content)
    VALUES(?,?)
    ');
  $sql->execute([
    htmlspecialchars($_REQUEST['user_id']),
    $_REQUEST['content']
   ]);
}

//ツイート編集
if (isset($_REQUEST['update'])) {
  $sql=$pdo->prepare('
    UPDATE tweets
    SET content=?
    WHERE tweet_id= ?
    ');
  $sql->execute([
    htmlspecialchars($_REQUEST['content']),
    $_REQUEST['tweet_id']
  ]);
}

//ツイート削除
if (isset($_REQUEST['delete'])) {
  $sql=$pdo->prepare('
    DELETE FROM tweets
    WHERE tweet_id= ?
    ');
  $sql->execute([
    $_REQUEST['tweet_id']
  ]);
}

//表示
$sql=$pdo->prepare('
  SELECT * FROM tweets
  LEFT OUTER JOIN users
  ON tweets.user_id = users.id
  ORDER BY tweets.updated DESC');
$sql->execute([]);
?>

<div class="main posts-index">
  <div class="container">
    <?php foreach ($sql->fetchAll() as $row): ?>
    <div class="posts-index-item">
      <div class="post-left"><img src="img/<?=$row['id'] ?>.jpg"></div>
      <div class="post-right">
        <div class="post-user-name"><a href="users_show.php?id=<?=$row['id'] ?>"><?=$row['name'] ?></a></div>
        <a href="posts_show.php?tweet_id=<?=$row['tweet_id'] ?>"><?=$row['content'] ?></a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
