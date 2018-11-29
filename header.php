<?php $pdo=new PDO('mysql:host=localhost;dbname=twitter;charset=utf8','twitterer','password'); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>TweetApp</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <?php if(isset($_SESSION['user'])): ?>
    <div class="header-logo"><a href ="posts.php">TweetApp</a></div>
    <ul class="header-menus">
      <li><a href="users_show.php?id=<?=$_SESSION['user']['id'] ?>"><?=$_SESSION['user']['name'] ?></a></li>
      <li><a href="posts_new.php">投稿</a></li>
      <li><a href="posts.php">投稿一覧</a></li>
      <li><a href="users.php">ユーザー一覧</a></li>
      <li><a href="logout.php">ログアウト</a></li>
    </ul>
  <?php else:?>
  <div class="header-logo"><a href="top.php">TweetApp</a></div>
  <ul class="header-menus">
    <li><a href="about.php">TweetAppとは</a></li>
    <li><a href="signup.php">新規登録</a></li>
    <li><a href="login.php">ログイン</a></li>
  </ul>
<?php endif; ?>
</header>
