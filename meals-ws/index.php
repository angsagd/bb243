<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meal Receipts</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Meal Receipts</h1>
  </header>
  <main>
    <section id="meal-index">
      <div class="meal-letters">
<?php
for ($i=65;$i<=90;$i++) {
  echo '<a href="?f=' . chr($i+32) . '">' . chr($i) . '</a> ';
}
?>
      </div>
      <div class="meal-search">
        <form action="">
          <input type="text" name="s" placeholder="Type something here ..." required>
          <button type="submit">Submit</button>
        </form>
      </div>
    </section>
  </main>
</body>
</html>