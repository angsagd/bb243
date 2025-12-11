<?php

$url = 'https://dummyjson.com/users';
$response = file_get_contents($url);

$data = json_decode($response);
$users = $data->users;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Members</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Members</h1>
  </header>
  <main>
    <section>
      <h2>Member Table</h2>
      <div class="row"></div>
      <table>
        <thead>
          <tr>
            <th>Username</th>
            <th>Role</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
          </tr>
        </thead>
        <tbody>
        <!-- Show members data -->
<?php
foreach ($users as $user) {
  echo '<tr>';
  echo '<td>' . $user->username . '</td>';
  echo '<td>' . $user->role . '</td>';
  echo '<td>' . $user->firstName . ' ' . $user->lastName . '</td>';
  echo '<td>' . $user->email . '</td>';
  echo '<td>' . $user->phone . '</td>';
  echo '</tr>';
}
?>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>
      