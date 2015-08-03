
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CV Generator</title>
</head>
<script>
    var ID = 1;

    function addProgLang() {
        ID++;
        var inputField = document.createElement("input");
        inputField.setAttribute("type", "text");
        inputField.setAttribute("name", "progLanguage[]");
        inputField.setAttribute("id", "field" + ID);
        document.getElementById('parent').appendChild(inputField);
        var selectionField = document.createElement("select");
        selectionField.setAttribute("name", "level[]");
        selectionField.setAttribute("id", "level" + ID);
        selectionField.innerHTML = "<?php
            $levels = array("Beginner", "Intermediate", "Advanced", "Expert");
            foreach ($levels as $key => $value) {
                echo "<option value=$value>$value</option>";
            }
            ?>";
        document.getElementById('parent').appendChild(selectionField);
        var newLine = document.createElement("br");
        document.getElementById('parent').appendChild(newLine);
    }

    function removeProgLang(){
        var fieldID = "field" + ID;
        var selectionID = "level" + ID;
        var inputField = document.getElementById(fieldID);
        var selectionField = document.getElementById(selectionID);
        document.getElementById('parent').removeChild(inputField);
        document.getElementById('parent').removeChild(selectionField);
        ID--;
    }

    function addLang() {
        ID++;
        var inputField = document.createElement("input");
        inputField.setAttribute("type", "text");
        inputField.setAttribute("name", "language[]");
        inputField.setAttribute("id", "field" + ID);
        document.getElementById('home').appendChild(inputField);
        var selectComprehension = document.createElement("select");
        selectComprehension.setAttribute("name", "comprehension[]");
        selectComprehension.setAttribute("id", "comprehension" + ID);
        selectComprehension.innerHTML = "<?php
            $levels = array("Beginner", "Intermediate", "Advanced", "Expert");
            foreach ($levels as $key => $value) {
                echo "<option value=$value>$value</option>";
            }
            ?>";
        document.getElementById('home').appendChild(selectComprehension);

        var selectReading = document.createElement("select");
        selectReading.setAttribute("name", "reading[]");
        selectReading.setAttribute("id", "reading" + ID);
        selectReading.innerHTML = "<?php
            $levels = array("Beginner", "Intermediate", "Advanced", "Expert");
            foreach ($levels as $key => $value) {
                echo "<option value=$value>$value</option>";
            }
            ?>";
        document.getElementById('home').appendChild(selectReading);

        var selectWriting = document.createElement("select");
        selectWriting.setAttribute("name", "writing[]");
        selectWriting.setAttribute("id", "writing" + ID);
        selectWriting.innerHTML = "<?php
            $levels = array("Beginner", "Intermediate", "Advanced", "Expert");
            foreach ($levels as $key => $value) {
                echo "<option value=$value>$value</option>";
            }
            ?>";
        document.getElementById('home').appendChild(selectWriting);

        var newLine = document.createElement("br");
        document.getElementById('home').appendChild(newLine);
    }

    function removeLang(){
        var fieldID = "field" + ID;
        var comprehensionID =  "comprehension" + ID;
        var writingID =  "writing" + ID;
        var readingID =  "reading" + ID;
        var inputField = document.getElementById(fieldID);
        var comprehensionField = document.getElementById(comprehensionID);
        var readingField = document.getElementById(readingID);
        var writingField = document.getElementById(writingID);
        document.getElementById('home').removeChild(inputField);
        document.getElementById('home').removeChild(comprehensionField);
        document.getElementById('home').removeChild(readingField);
        document.getElementById('home').removeChild(writingField);
        ID--;
    }

</script>
<body>
<form method="post" action="5.CVGenerator.php">
    <fieldset>
        <legend>Personal Information</legend>
        <input type="text" name="first-name" placeholder="First Name" /><br/>
        <input type="text" name="last-name" placeholder="Last Name" /><br/>
        <input type="email" name="email" placeholder="Email" /><br/>
        <input type="tel" name="phone" placeholder="Phone Number" /><br/>
        <input type="radio" name="gender" value="female"/><label for="female">Female</label>
        <input type="radio" name="gender" value="male"/><label for="male">Male</label><br/>
        <label>Birthday</label><br/>
        <input type="date" name="bdate"><br/>
        <label for="nationality">Nationality:</label><br/>
        <select name="nationality" id="nationality">
            <?php
            $nationalities = array("Afghan", "Albanian", "Algerian", "American", "Andorran", "Angolan", "Antiguans", "Argentinean", "Armenian", "Australian", "Austrian",
                "Azerbaijani", "Bahamian", "Bahraini", "Bangladeshi", "Barbadian", "Barbudans", "Batswana", "Belarusian", "Belgian", "Belizean", "Beninese", "Bhutanese",
                "Bolivian", "Bosnian", "Brazilian", "British", "Bruneian", "Bulgarian", "Burkinabe", "Burmese", "Burundian", "Cambodian", "Cameroonian", "Canadian",
                "Cape Verdean", "Central African", "Chadian", "Chilean", "Chinese", "Colombian", "Comoran", "Congolese", "Costa Rican", "Croatian", "Cuban", "Cypriot", "Czech",
                "Danish", "Djibouti", "Dominican", "Dutch", "East Timorese", "Ecuadorean", "Egyptian", "Emirian", "Equatorial Guinean", "Eritrean", "Estonian", "Ethiopian", "Fijian",
                "Filipino", "Finnish", "French", "Gabonese", "Gambian", "Georgian", "German", "Ghanaian", "Greek", "Grenadian", "Guatemalan", "Guinea-Bissauan", "Guinean", "Guyanese",
                "Haitian", "Herzegovinian", "Honduran", "Hungarian", "I-Kiribati", "Icelander", "Indian", "Indonesian", "Iranian", "Iraqi", "Irish", "Israeli", "Italian", "Ivorian",
                "Jamaican", "Japanese", "Jordanian", "Kazakhstani", "Kenyan", "Kittian and Nevisian", "Kuwaiti", "Kyrgyz", "Laotian", "Latvian", "Lebanese", "Liberian", "Libyan",
                "Liechtensteiner", "Lithuanian", "Luxembourger", "Macedonian", "Malagasy", "Malawian", "Malaysian", "Maldivan", "Malian", "Maltese", "Marshallese", "Mauritanian",
                "Mauritian", "Mexican", "Micronesian", "Moldovan", "Monacan", "Mongolian", "Moroccan", "Mosotho", "Motswana", "Mozambican", "Namibian", "Nauruan", "Nepalese",
                "New Zealander", "Nicaraguan", "Nigerian", "Nigerien", "North Korean", "Northern Irish", "Norwegian", "Omani", "Pakistani", "Palauan", "Panamanian", "Papua New Guinean",
                "Paraguayan", "Peruvian", "Polish", "Portuguese", "Qatari", "Romanian", "Russian", "Rwandan", "Saint Lucian", "Salvadoran", "Samoan", "San Marinese", "Sao Tomean",
                "Saudi", "Scottish", "Senegalese", "Serbian", "Seychellois", "Sierra Leonean", "Singaporean", "Slovakian", "Slovenian", "Solomon Islander", "Somali", "South African",
                "South Korean", "Spanish", "Sri Lankan", "Sudanese", "Surinamer", "Swazi", "Swedish", "Swiss", "Syrian", "Taiwanese", "Tajik", "Tanzanian", "Thai", "Togolese", "Tongan",
                "Trinidadian/Tobagonian", "Tunisian", "Turkish", "Tuvaluan", "Ugandan", "Ukrainian", "Uruguayan", "Uzbekistani", "Venezuelan", "Vietnamese", "Welsh", "Yemenite",
                "Zambian", "Zimbabwean");
            foreach ($nationalities as $key => $value) {
                echo "<option value=\"$value\"" . ($value == "Bulgarian" ? " selected" : "") . ">$value</option>";
            }
            ?>
        </select>
    </fieldset>
    <fieldset>
        <legend>Last Work Position</legend>
        <label for="company">Company Name</label>
        <input type="text" name="company" id="company"/><br/>
        <label for="from">From</label>
        <input type="date" name="from" id="from"><br/>
        <label for="to">To</label>
        <input type="date" name="to" id="to">
    </fieldset>
    <fieldset>
        <div id="parent">
        <legend>Computer Skills</legend>
        <label for="progLanguage">Programming Languages</label><br/>
        <input type="text" name="progLanguage[]" id="progLanguage" />
        <select name="level[]" id="level">
            <option value="" selected="selected">-Level-</option>
            <?php
            $levels = array("Beginner", "Intermediate", "Advanced", "Expert");
            foreach ($levels as $key => $value) {
                echo "<option value=$value>$value</option>";
            }
            ?>
        </select><br />
        </div>
        <input type="button" name="remove-prog" value="Remove Language" id="remove-prog" onclick="removeProgLang()"/>
        <input type="button" name="add-prog" value="Add Language"  id="add-prog" onclick="addProgLang()"/>
    </fieldset>
    <fieldset>
        <div id="home">
        <legend>Other Skills</legend>
        <label for="language">Languages</label><br/>
        <input type="text" name="language[]" id="language" />
        <select name="comprehension[]" id="comprehension">
            <option value="" selected="selected">-Comprehension-</option>
            <?php
            foreach ($levels as $key => $value) {
                echo "<option value=$value>$value</option>";
            }
            ?>
        </select>
        <select name="reading[]" id="reading">
            <option value="" selected="selected">-Reading-</option>
            <?php
            foreach ($levels as $key => $value) {
                echo "<option value=$value>$value</option>";
            }
            ?>
        </select>
        <select name="writing[]" id="writing">
            <option value="" selected="selected">-Writing-</option>
            <?php
            foreach ($levels as $key => $value) {
                echo "<option value='$value'>$value</option>";
            }
            ?>
        </select><br />
        </div>
        <input type="button" name="remove-lang" value="Remove Language" id="remove-lang" onclick="removeLang()"/>
        <input type="button" name="add-lang" value="Add Language"  id="add-lang" onclick="addLang()"/><br />
        <label>Driver's License</label><br/>
        <input type="radio" name="category" value="B"/><label for="B">B</label>
        <input type="radio" name="category" value="A"/><label for="A">A</label>
        <input type="radio" name="category" value="C"/><label for="C">C</label>
    </fieldset>
    <input type="submit" name="submit" value="Generate CV" />
    </form>
</body>
</html>


<?php
if(isset($_POST['submit'])) {

    if (!isset($_POST['first-name']) || preg_match("/^[a-zA-Z -]{2,20}$/", $_POST['first-name']) == 0) {
        $fname = 'Enter valid first name';
    } else {
        $fname = $_POST['first-name'];
    }
    if (!isset($_POST['last-name']) || preg_match("/^[a-zA-Z -]{2,20}$/", $_POST['last-name']) == 0) {
        $lname = 'Enter valid last name';
    } else {
        $lname = $_POST['last-name'];
    }
    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    } else {
        $email = 'Enter valid email';
    }
    if (isset($_POST['phone']) && !preg_match('/[^0-9\+\-\s]/', $_POST['phone'])) {
        $phone = $_POST['phone'];
    } else {
        $phone = 'Enter valid phone number';
    }
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }
    if (isset($_POST['bdate'])) {
        $birthday = $_POST['bdate'];
    }
    if (isset($_POST['nationality'])) {
        $nationality = $_POST['nationality'];
    }
    echo "<table>";
    echo "<tr><th colspan='2'>Personal Information</th></tr>";
    echo "<tr><th>First Name</th><td>$fname</td></tr>";
    echo "<tr><th>Last Name</th><td>$lname</td></tr>";
    echo "<tr><th>Email</th><td>$email</td></tr>";
    echo "<tr><th>Phone number</th><td>$phone</td></tr>";
    echo "<tr><th>Gender</th><td>$gender</td></tr>";
    echo "<tr><th>Birth Date</th><td>$birthday</td></tr>";
    echo "<tr><th>Nationality</th><td>$nationality</td></tr>";
    echo "</table><br/>";


    if (!isset($_POST['company']) || preg_match('/^[A-Za-z0-9 ]{2,20}$/', $_POST['company']) == 0){
        $company = 'Enter valid company name';
    } else {
        $company = $_POST['company'];
    }
    if (isset($_POST['from'])) {
        $from = $_POST['from'];
    }
    if (isset($_POST['to'])) {
        $to = $_POST['to'];
    }
    echo "<table>";
    echo "<tr><th colspan='2'>Last Work Position</th></tr>";
    echo "<tr><th>Company Name</th><td>$company</td></tr>";
    echo "<tr><th>From</th><td>$from</td></tr>";
    echo "<tr><th>To</th><td>$to</td></tr>";
    echo "</table><br/>";


    if (isset($_POST['progLanguage'])) {
        $progLanguage = $_POST['progLanguage'];
    }
    if (isset($_POST['level'])) {
        $level = $_POST['level'];
    }
    echo "<table>";
    echo "<tr><th colspan='3'>Computer Skills</th></tr>";
    //echo "<tr><th rowspan='count($progLanguage)+1'>Programming Languages</th></tr>";
    echo "<tr><th>Language</th><th>Skill Level</th></tr>";
    for ($i = 0; $i < count($progLanguage); $i++) {
        echo "<tr><td>$progLanguage[$i]</td><td>$level[$i]</td></tr>";
    }
    echo "</table><br/>";


    if (isset($_POST['language'])){
        $language = $_POST['language'];
    }
    if (isset($_POST['comprehension'])){
        $comprehension = $_POST['comprehension'];
    }
    if (isset($_POST['reading'])){
        $reading = $_POST['reading'];
    }
    if (isset($_POST['writing'])){
        $writing = $_POST['writing'];
    }
    if (isset($_POST['category'])) {
        $category = $_POST['category'];
    }
    echo "<table>";
    echo "<tr><th colspan='5'>Other Skills</th></tr>";
    //echo "<tr><th rowspan='count($language)+1'>Languages</th></tr>";
    echo "<tr><th>Language</th><th>Comprehension</th><th>Reading</th><th>Writing</th></tr>";
    for ($i = 0; $i < count($language); $i++) {
        echo "<tr><td>$language[$i]</td><td>$comprehension[$i]</td><td>$reading[$i]</td><td>$writing[$i]</td></tr>";
    }
    echo "<tr><th>Driving License</th><td colspan='4'>$category</td></tr>";
    echo "</table><br/>";

}


