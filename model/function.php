<?php
global $mysqli;

/*--To generate Hash for a Password--*/
function generateHash($plainText, $salt = NULL){

    if($salt === NULL) {
        $salt = substr(md5(uniqid(rand(), TRUE)), 0, 25);
    } else {
        $salt = substr($salt, 0, 25);
    }
    return $salt . sha1($salt . $plainText);
}

/* Random Id Generator*/
function randomString(){
    $character_array = array_merge(range('A', 'Z'), range(0, 9), range('a','z'));
    $rand_string = "";
    for ($i = 0; $i < 9; $i++) {
        $rand_string .= $character_array[rand(
            0, (count($character_array) - 1)
        )];
    }
    return $rand_string;
}

/*--To return all Testimonials--*/
function getAllTest(){
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT NGOUniqueID, NGOTestimonial FROM testimonial");
    $stmt -> execute();
    $stmt->bind_result($NGOUniqueID, $NGOTestimonial);
    while($stmt->fetch()){
        $row[] = array(
            'id' => $NGOUniqueID,
            'test' => $NGOTestimonial
        );
    }
    $stmt->close();
    return($row);
}

/*--To make Donations--*/
function makeDonation($DonationType, $NGOUniqueID, $Donation , $FirstName, $LastName){
    global $mysqli;

    $UserID = "ARB123A1";

    $stmt = $mysqli->prepare("INSERT INTO donation (DonationID, UserID, FirstName, LastName, NGOUniqueID, DonationType, Donation) 
                                    VALUES ('". randomString() ."',?,?,?,?,?,?)");
    $stmt -> bind_param("ssssss", $UserID,$FirstName, $LastName, $NGOUniqueID, $DonationType, $Donation);
    $result = $stmt->execute();
    $stmt -> close();

    return($result);
}

/*--Fetch User Details--*/
function fetchUserDetails($email){
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT LoginID, Email, Password, UserType, Active FROM login WHERE Email= ? LIMIT 1");
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $stmt->bind_result($LoginID, $Email, $Password, $UserType, $Active);
    while($stmt->fetch()){
        $row = array(
            'loginid' => $LoginID,
            'email' => $Email,
            'password' => $Password,
            'usertype' => $UserType,
            'active' => $Active
        );
    }
    $stmt->close();
    return($row);
}

/*--Fetch This NGO--*/
function fetchThisUser($email, $usertype){
    global $mysqli;

    if($usertype == 'ngo'){
        $stmt = $mysqli->prepare("SELECT NGOUniqueID, NGOName, NGOLicense, NGOEmail, NGOPhone, NGOWebsite, 
                                         NGOYear, NGOType, NGOPurpose, NGOFundraiserName, NGOCapacity, NGOdescription, NGOLocation FROM ngo WHERE NGOEmail= ?");
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt->bind_result($NGOUniqueID,$NGOName, $NGOLicense, $NGOEmail, $NGOPhone, $NGOWebsite,
            $NGOYear, $NGOType, $NGOPurpose, $NGOFundraiserName, $NGOCapacity, $NGOdescription, $NGOLocation);
        while($stmt->fetch()){
            $row = array(
                'NGOUniqueID'   => $NGOUniqueID,
                'ngoName' => $NGOName,
                'license' => $NGOLicense,
                'ngoEmail' => $NGOEmail,
                'ngoPhone' => $NGOPhone,
                'ngoWebsite' => $NGOWebsite,
                'ngoEstYear' => $NGOYear,
                'ngoType' => $NGOType,
                'ngoCause' => $NGOPurpose,
                'ngoFundraiserName' => $NGOFundraiserName,
                'ngoPeopleHelped' => $NGOCapacity,
                'ngoDescription' => $NGOdescription,
                'ngoLocation' => $NGOLocation
            );
        }
        $stmt->close();
        return($row);
    }elseif($usertype == 'volunteer'){
        $stmt = $mysqli->prepare("SELECT `FirstName`, `LastName`, `Email`, `Phone`, `BirthDate` FROM `user` WHERE Email = ?");
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt->bind_result($FirstName, $LastName, $Email, $Phone, $BirthDate);
        while($stmt->fetch()){
            $row = array(
                'firstName' => $FirstName,
                'lastName' => $LastName,
                'email' => $Email,
                'phone' => $Phone,
                'birthdate' => $BirthDate
            );
        }
        $stmt->close();
        return($row);
    }
}

/* Insert NGO Profile */
function createNGO($nname, $license, $email, $phone, $website, $established, $type, $purpose, $fundraisers, $capacity, $password, $location, $description){
    global $mysqli;

    $stmt = $mysqli->prepare("INSERT INTO ngo
    (NGOUniqueID,
    NGOName,
    NGOLicense,
    NGOEmail,
    NGOPhone,
    NGOWebsite,
    NGOYear,
    NGOType,
    NGOPurpose,
    NGOFundraiserName,
    NGOCapacity,
    NGOMemberSince,
    NGOdescription,
    NGOLocation) 
    VALUES ('". randomString() ."',?,?,?,?,?,?,?,?,?,?,' " . date("Ymd") . " ',?,?)");
    $stmt->bind_param("ssssssssssss",$nname, $license, $email, $phone, $website, $established, $type, $purpose, $fundraisers, $capacity, $description, $location);
    $stmt->execute();
    $stmt->close();

    $stmt = $mysqli->prepare("INSERT INTO login
    (LoginID,
    Email,
    Password, 
    UserType,
    Active) 
    VALUES ('". randomString() ."', ?, ?, 'ngo','1')");
    $stmt->bind_param("ss", $email, $password);
    $result = $stmt->execute();
    $stmt->close();

    return $result;

}

/* Update NGO Profile */
function updateNGO($nname, $email, $phone, $website, $type, $purpose, $fundraisers, $capacity, $location, $description){
    global $mysqli;

    $stmt = $mysqli->prepare("UPDATE ngo SET NGOName=?, NGOPhone=?,NGOWebsite=?,NGOType=?,NGOPurpose=?,NGOFundraiserName=?,                                                         NGOCapacity=?, NGOdescription=?, NGOLocation=? WHERE NGOEmail=?");
    $stmt->bind_param("sssssssss",$nname, $phone, $website, $type, $purpose, $fundraisers, $capacity, $description, $location,  $email);
    $result = $stmt->execute();
    $stmt->close();

    if($result){
        $fetchUser = fetchThisUser($email, 'ngo');
        return $fetchUser;
    }

}

/* Delete NGO Profile*/
function deleteProfile($email, $userType){
    global $mysqli;

    if($userType == 'ngo') {
        $stmt = $mysqli->prepare("UPDATE login SET Active=".'0'." WHERE Email= ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $stmt = $mysqli->prepare("DELETE FROM ngo WHERE NGOEmail= ?");
        $stmt->bind_param("s", $email);
        $result = $stmt->execute();
        $stmt->close();

    }elseif($userType == 'volunteer'){
        $stmt = $mysqli->prepare("UPDATE login SET Active=".'0'." WHERE Email= ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $stmt = $mysqli->prepare("DELETE FROM user WHERE Email= ?");
        $stmt->bind_param("s", $email);
        $result = $stmt->execute();
        $stmt->close();
    }
    session_unset();

    return($result);
}

/*-- List of all NGO's --*/
function fetchAllNGO(){
    global $mysqli;
    $stmt = $mysqli->prepare(
        "SELECT
		NGOUniqueID,
		NGOName,
		NGOLicense,
		NGOEmail,
		NGOPhone,
		NGOWebsite,
		NGOYear,
		NGOType,
		NGOPurpose,
		NGOFundraiserName,
		NGOCapacity,
		NGOdescription,
        NGOLocation
		FROM ngo"
    );
    $stmt->execute();
    $stmt->bind_result(
        $NGOUniqueID,
        $NGOName,
        $NGOLicense,
        $NGOEmail,
        $NGOPhone,
        $NGOWebsite,
        $NGOYear,
        $NGOType,
        $NGOPurpose,
        $NGOFundraiserName,
        $NGOCapacity,
        $NGOdescription,
        $NGOLocation
    );

    while ($stmt->fetch()) {
        $row[] = array(
            'NGOUniqueID' => $NGOUniqueID,
            'NGOName' => $NGOName,
            'NGOLicense' => $NGOLicense,
            'NGOEmail' => $NGOEmail,
            'NGOPhone' => $NGOPhone,
            'NGOWebsite' => $NGOWebsite,
            'NGOYear' => $NGOYear,
            'NGOType' => $NGOType,
            'NGOPurpose' => $NGOPurpose,
            'NGOFundraiserName' => $NGOFundraiserName,
            'NGOCapacity' => $NGOCapacity,
            'NGOdescription' => $NGOdescription,
            'NGOLocation' => $NGOLocation
        );
    }
    $stmt->close();
    return ($row);
}

/*-- Creating new user --*/
function createUser($fname,$lname,$email,$phone,$bday,$password){
    global $mysqli, $db_table_prefix;
    $stmt= $mysqli->prepare("INSERT INTO user 
    (UserID, 
    FirstName, 
    LastName, 
    Email, 
    Phone, 
    BirthDate) 
    VALUES ('".randomString()."',?,?,?,?,?)");
    $stmt->bind_param("sssss",$fname,$lname,$email,$phone,$bday);
    $stmt->execute();
    $stmt->close();

    $stmt = $mysqli->prepare("INSERT INTO login (LoginID, Email, Password, UserType, Active) 
                                    VALUES ('".randomString()."', ?, ?, 'volunteer', '1')");
    $stmt ->bind_param("ss", $email, $password);
    $result= $stmt->execute();
    $stmt->close();
    return $result;
}


/* Update User Info */
function updateUser($fname,$lname,$email,$phone){
    global $mysqli;
    $stmt= $mysqli->prepare("UPDATE user SET FirstName=?, LastName=?, Phone=? WHERE Email=?");
    $stmt->bind_param("ssss",$fname,$lname,$phone,$email);
    $result = $stmt->execute();
    $stmt->close();
    if($result){
        $fetchUser = fetchThisUser($email, 'volunteer');
        return $fetchUser;
    }
}

/* Fetch This NGO */
function fetchThisNGO($NGOid){
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT NGOName, NGOWebsite, NGOYear, NGOType, NGOPurpose, NGOCapacity, NGODescription FROM ngo WHERE
                                    NGOUniqueID=?");
    $stmt -> bind_param("s", $NGOid);
    $stmt -> execute();
    $stmt->bind_result($NGOName, $NGOWebsite, $NGOYear, $NGOType, $NGOPurpose, $NGOCapacity, $NGODescription);
    while($stmt->fetch()){
        $row = array(
            'ngoName' => $NGOName,
            'ngoWebsite' => $NGOWebsite,
            'ngoEstYear' => $NGOYear,
            'ngoType' => $NGOType,
            'ngoCause' => $NGOPurpose,
            'ngoPeopleHelped' => $NGOCapacity,
            'ngoDescription' => $NGODescription
        );
    }
    $stmt->close();
    return($row);
}

/*---Feedback --*/
function addfeedback($fname, $lname, $phone, $email, $feedback){
    global $mysqli;

    $stmt = $mysqli->prepare("INSERT INTO feedback (feedbackID, fname, lname, phone, email, text)
                                    VALUES('".randomString()."',?,?,?,?,?)");
    $stmt -> bind_param("sssss", $fname, $lname, $phone, $email, $feedback);
    $result = $stmt -> execute();
    $stmt ->close();

    return $result;
}

/*-- Profile add image --*/
function addImg($imgID,$fileNameNew,$ngoID){
    global $mysqli;

    $stmt = $mysqli->prepare("INSERT INTO ngoimgs (imgID, imgName, ngoID)
                                    VALUES(?,?,?)");
    $stmt -> bind_param("sss",$imgID,$fileNameNew,$ngoID);
    $result = $stmt -> execute();
    $stmt ->close();
    return $result;
}

function fetchImage($ngoID){
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT imgName FROM  ngoimgs WHERE ngoID = ? ");
    $stmt->bind_param("s", $ngoID);
    $stmt->execute();
    $stmt->bind_result($imgName);
    while ($stmt->fetch()){
        $row[] = array(
            'imgName'       => $imgName
        );
    }
    $stmt->close();
    return($row);

}

/*--Destroying Session--*/
function destroySession($name){
    if(isset($_SESSION[$name])) {
        $_SESSION[$name] = NULL;
        session_unset();
    }
}

?>