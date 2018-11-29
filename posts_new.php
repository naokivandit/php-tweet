<?php require 'header.php'; ?>

<div class="main posts-new">
  <div class="container">
    <h1 class="form-heading">投稿する</h1>
    <div class="form">
      <div class="form-body">
        <div class="form-error">
        </div>
        <form action="posts.php" method="post">
          <input type="hidden" name="command" value="insert">
            <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
          <textarea name="content"></textarea>
          <input type="submit" value="投稿">
        </form>
      </div>
    </div>
  </div>
</div>
