<form action="" method="POST" role="form">
    @csrf
    <label for="">password</label>
    <input type="password" name="password">
    <label for="">confirm password</label>
    <input type="password" name="confirm_password">
    <button type="submit">Đặt lại mật khẩu</button>

</form>