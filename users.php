<?php require 'header.php'; ?>
<?php
$sql=$pdo->prepare('SELECT * FROM users');
$sql->execute([]);
?>


<div class="main users-index">
    <div class="container">
        <h1 class="users-heading">ユーザー一覧</h1>
        <?php foreach ($sql->fetchAll() as $row): ?>
        <div class="users-index-item">
            <div class="user-left"><img src="img/<?=$row['id'] ?>.jpg"></div>
            <div class="user-right"><a href="users_show.php?id=<?=$row['id'] ?>"><?=$row['name'] ?></a></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
