<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <title>Le blog de l'AVBN</title>
   <link href="style.css" rel="stylesheet" />
</head>

<body>
   <h1>Le super blog de l'AVBN !</h1>
   <p>Derniers billets du blog :</p>

   <?php
   foreach ($posts as $post) {
   ?>
      <div class="news">
         <h3>
            <?= htmlspecialchars($post['title']); ?>
            <em>le <?php echo $post['frCreationDate']; ?></em>
         </h3>
         <p>
            <?= nl2br(htmlspecialchars($post['content'])); ?>
            <br />
            <em><a href="templates/listComments.php">Commentaires</a></em>
         </p>
      </div>
   <?php
   } // The end of the posts loop.
   ?>
</body>

</html>