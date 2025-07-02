<h2>Edit Account</h2>
<form method="post" action="<?= url('login/updateAccount') ?>">
    <label>Email:</label>
    <input type="email" name="email" value="<?= $user['email'] ?>" required>

    <label>New Password:</label>
    <input type="password" name="password">

    <button type="submit" class="btn btn-success">Update</button>
</form>
