<?php
# echo $_SERVER['PHP_SELF'];
# var_dump($_POST);
$isSubmitted = !empty($_POST);
$invalidInputs = [];

if ($isSubmitted) {
    $invalidInputs = [];
    # $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['password']));
    $avatar = htmlspecialchars(trim($_POST['avatar']));

    if (!$name) {
        array_push($invalidInputs, 'Username is empty');
    }

    if (!$email) {
        array_push($invalidInputs, 'Email is empty');
    }
    if (!$password) {
        array_push($invalidInputs, 'Password is empty');
    }
    /*
    if (!preg_match('/^[a-zA-Z0-9]{8, }$/', $password)) {
        array_push($invalidInputs, 'Password is too short');
    }
    */
}
?>

<?php include __DIR__ . '/includes/header.php' ?>

<?php if ($isSubmitted) : ?>
    <h2> Form is submitted</h2>
    <?php echo implode('<br>', $invalidInputs); ?>
<?php endif ?>

<?php if (!$isSubmitted) : ?>
<?php endif ?>

<h1>Form submission</h1>
<main>
    <form class="form-signup" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="mb-3">
            <label for="user" class="form-label">Username</label>
            <input name="username" type="" class="form-control" id="user">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input name="password" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
<?php include __DIR__ . '/includes/footer.php' ?>
