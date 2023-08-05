<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="/auth/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<script src="https://use.typekit.net/rjb4unc.js"></script>
<script>try {
        Typekit.load({async: true});
    } catch (e) {
    }</script>

<div class="container">
    @include('errors.message')
    <div class="logo">Tasks Dashboard</div>
    <div class="login-item">
        <form action="{{route('auth.login.done')}}" method="post" class="form form-login">
            @csrf
            <div class="form-field">
                <label class="user" for="email"><span class="hidden">Email</span></label>
                <input id="email" name="email" type="text" class="form-input" placeholder="Email" required>
            </div>

            <div class="form-field">
                <label class="lock" for="password"><span class="hidden">Password</span></label>
                <input id="password" name="password" type="password" class="form-input" placeholder="Password" required>
            </div>

            <div class="form-field">
                <input type="submit" value="Log in">
            </div>
        </form>
    </div>
</div>
<!-- partial -->

</body>
</html>
