<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculate Interest</title>
</head>
<body>
<form action="3.CalculateInterest.php" method="post">
    <label for="tags">Enter Amount:</label>
    <input type="text" name="amount" required="required" /> <br />
    <input type="radio" name="currency" value="USD" id="usd"/><label for="usd">USD</label>
    <input type="radio" name="currency" value="EUR" id="eur"/><label for="eur">EUR</label>
    <input type="radio" name="currency" value="BGN" id="bgn"/><label for="bgn">BGN</label><br />
    <label for="tags">Compound Annual Interest:</label>
    <input type="text" name="interest" required="required"/><br />
    <select name="period" required="required">
        <option value="6">6 Months</option>
        <option value="12">1 Year</option>
        <option value="24">2 Years</option>
        <option value="60">5 Years</option>
    </select>
    <input type="submit" name="submit" value="Calculate">
</form>
</body>
</html>

<?php
if(isset($_POST['amount']) && isset($_POST['currency']) && isset($_POST['interest']) && isset($_POST['period'])) {
    if (is_numeric($_POST['amount']) && is_numeric($_POST['interest'])) {
        $amount = (float)$_POST['amount'];
        $currency = $_POST['currency'];
        $annualInterest = (float)$_POST['interest'];
        $interestPerMonth = $annualInterest / 12;
        $correction = ($interestPerMonth + 100) / 100;
        $period = (int)$_POST['period'];
//        for ($i = 1; $i <= $period; $i++) {
//            $amount *= $correction;
//        }
        $amount *= pow($correction, $period);
        $currencySymbol = '';
        switch ($currency) {
            case 'USD':
                $currencySymbol = '&#36;';
                break;
            case 'EUR':
                $currencySymbol = '&#128;';
                break;
            case 'BGN':
                $currencySymbol = 'лв';
                break;
        }
        echo $currencySymbol . ' ' . number_format($amount, 2, '.', '');
    }
    else {
        echo "Invalid data!";
    }
}