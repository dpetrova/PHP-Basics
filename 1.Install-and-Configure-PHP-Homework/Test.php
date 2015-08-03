
<form action="Test.php" method="get">
    Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
    <input type="submit">
</form>

<?php
if(isset($_GET["name"])){ ?>
Welcome <?php echo htmlentities($_GET["name"]) ?><br>
Your email is: <?php echo htmlentities($_GET["email"]) ?>
<?php } ?>