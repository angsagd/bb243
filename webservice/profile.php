<?php
$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
// Baca dan decode data user dari user.json
$userJson = file_get_contents("https://dummyjson.com/users/$id");
$user = json_decode($userJson);

// if (@$user->message) {
//     header('location: members.php');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="profile.css">
</head>
<body>

<header>
    <h1>User Profile</h1>
</header>

<nav>
    <ul>
        <li><a href="members.php">Members</a></li>
    </ul>
</nav>

<main>
    <section>
        <div class="row"></div>
        <div class="profile-container">
            <!-- Kolom kiri: avatar dan ringkasan -->
            <div class="profile-left">
                <img src="<?php echo htmlspecialchars($user->image); ?>" alt="Foto profil" class="profile-avatar">

                <h3 class="profile-name">
                    <?php
                    echo htmlspecialchars($user->firstName . ' ' . $user->lastName);
                    ?>
                </h3>

                <p class="profile-username">
                    @<?php echo htmlspecialchars($user->username); ?>
                </p>

                <p class="profile-role">
                    Role: <?php echo htmlspecialchars($user->role); ?>
                </p>

                <p class="profile-gender-age">
                    <?php echo htmlspecialchars(ucfirst($user->gender)); ?>,
                    <?php echo htmlspecialchars($user->age); ?> y.o.
                </p>
            </div>

            <!-- Kolom kanan: detail lengkap -->
            <div class="profile-right">

                <h3 class="profile-section-title">Contact Information</h3>
                <div class="profile-row">
                    <span class="label">Email</span>
                    <span class="value"><?php echo htmlspecialchars($user->email); ?></span>
                </div>
                <div class="profile-row">
                    <span class="label">Phone</span>
                    <span class="value"><?php echo htmlspecialchars($user->phone); ?></span>
                </div>
                <div class="profile-row">
                    <span class="label">IP Address</span>
                    <span class="value"><?php echo htmlspecialchars($user->ip); ?></span>
                </div>

                <h3 class="profile-section-title">Informasi Pribadi</h3>
                <div class="profile-row">
                    <span class="label">Date of Birth</span>
                    <span class="value"><?php echo htmlspecialchars($user->birthDate); ?></span>
                </div>
                <div class="profile-row">
                    <span class="label">Blood Type</span>
                    <span class="value"><?php echo htmlspecialchars($user->bloodGroup); ?></span>
                </div>
                <div class="profile-row">
                    <span class="label">Height / Weight</span>
                    <span class="value">
                        <?php
                        echo htmlspecialchars(
                            number_format($user->height, 2) . ' cm / ' .
                            number_format($user->weight, 2) . ' kg'
                        );
                        ?>
                    </span>
                </div>
                <div class="profile-row">
                    <span class="label">Eye Color</span>
                    <span class="value"><?php echo htmlspecialchars($user->eyeColor); ?></span>
                </div>
                <div class="profile-row">
                    <span class="label">Hair</span>
                    <span class="value">
                        <?php
                        echo htmlspecialchars($user->hair->type . ' - ' . $user->hair->color);
                        ?>
                    </span>
                </div>

                <h3 class="profile-section-title">Address</h3>
                <div class="profile-row">
                    <span class="label">Address</span>
                    <span class="value">
                        <?php
                        echo htmlspecialchars($user->address->address);
                        ?>
                    </span>
                </div>
                <div class="profile-row">
                    <span class="label">City</span>
                    <span class="value">
                        <?php
                        echo htmlspecialchars(
                            $user->address->city . ', ' .
                            $user->address->state . ' ' .
                            $user->address->postalCode
                        );
                        ?>
                    </span>
                </div>
                <div class="profile-row">
                    <span class="label">Country</span>
                    <span class="value">
                        <?php echo htmlspecialchars($user->address->country); ?>
                    </span>
                </div>
                <div class="profile-row">
                    <span class="label">Coordinat</span>
                    <span class="value">
                        Lat: <?php echo htmlspecialchars($user->address->coordinates->lat); ?>,
                        Lng: <?php echo htmlspecialchars($user->address->coordinates->lng); ?>
                    </span>
                </div>

                <h3 class="profile-section-title">School & Work</h3>
                <div class="profile-row">
                    <span class="label">University</span>
                    <span class="value"><?php echo htmlspecialchars($user->university); ?></span>
                </div>
                <div class="profile-row">
                    <span class="label">Company</span>
                    <span class="value"><?php echo htmlspecialchars($user->company->name); ?></span>
                </div>
                <div class="profile-row">
                    <span class="label">Departement</span>
                    <span class="value"><?php echo htmlspecialchars($user->company->department); ?></span>
                </div>
                <div class="profile-row">
                    <span class="label">Title</span>
                    <span class="value"><?php echo htmlspecialchars($user->company->title); ?></span>
                </div>
                <div class="profile-row">
                    <span class="label">Office Address</span>
                    <span class="value">
                        <?php
                        echo htmlspecialchars(
                            $user->company->address->address . ', ' .
                            $user->company->address->city . ', ' .
                            $user->company->address->state . ' ' .
                            $user->company->address->postalCode . ', ' .
                            $user->company->address->country
                        );
                        ?>
                    </span>
                </div>

                <h3 class="profile-section-title">Finance & Crypto</h3>
                <div class="profile-row">
                    <span class="label">Bank Card</span>
                    <span class="value">
                        <?php
                        $cardNumber = $user->bank->cardNumber;
                        $last4 = substr($cardNumber, -4);
                        echo htmlspecialchars(
                            $user->bank->cardType . ' · **** **** **** ' . $last4
                        );
                        ?>
                        (Exp: <?php echo htmlspecialchars($user->bank->cardExpire); ?>)
                    </span>
                </div>
                <div class="profile-row">
                    <span class="label">Crypto</span>
                    <span class="value">
                        <?php
                        echo htmlspecialchars(
                            $user->crypto->coin . ' - ' . $user->crypto->network
                        );
                        ?>
                        <br>
                        Wallet: <?php echo htmlspecialchars($user->crypto->wallet); ?>
                    </span>
                </div>
            </div>
        </div>
    </section>
</main>

</body>
</html>
