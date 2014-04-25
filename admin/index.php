<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="lolkittens" />

	<title>Login</title>
</head>

<body>

<div class="wrapper">

    <div class="container">
        <h1>Admin Login</h1>
        <div class="form">
            <form action="login_process.php" method="post">
                <input type="text" placeholder="username" name="username" />
                <input type="password" placeholder="password" name="password" />
                <input type="hidden" value="1" name="submit" />
                <input type="submit" value="login" />
            </form>
        </div>
    </div>

</div>


</body>
</html>