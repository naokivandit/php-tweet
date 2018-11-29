<?php require 'header.php'; ?>
<?php
$sql=$pdo->prepare('
  SELECT * FROM tweets
  LEFT OUTER JOIN users
  ON tweets.user_id = users.id
  WHERE tweets.tweet_id = ?
');
$sql->execute([
  $_REQUEST['tweet_id']
]);
?>

<div class="main posts-new">
  <div class="container">
    <h1 class="form-heading">編集する</h1>
    <div class="form">
      <div class="form-body">
        <div class="form-error"></div>
          <form action="posts.php" method="post">
            <?php foreach ($sql->fetchAll() as $row): ?>
              <input type="hidden" name="update" value="insert">
              <input type="hidden" name="tweet_id" value="<?=$row['tweet_id'] ?>">
              <textarea name="content"><?=$row['content'] ?></textarea>
            <?php endforeach ?>
            <input type="submit" value="保存">
          </form>
      </div>
    </div>
  </div>
</div>
