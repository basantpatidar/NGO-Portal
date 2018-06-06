<?php
require_once('config.php');

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

$error = array();

$userDetails = fetchUserDetails($username, $password);

if($userDetails['active'] == 0){
    header('Location: ../login.php?flag="f"');

}else{
    #$entered_pass = generateHash($password, $userdetails["Password"]);

    if($password != $userDetails['password']){
        $error[] = 'Incorrect Username or Password';
    }else{
        if($userDetails['usertype'] == 'ngo'){

            $loggedinngo = fetchThisUser($userDetails['email'],$userDetails['usertype']);

            $loggedInUser = new ngo();

            $loggedInUser->ngoName = $loggedinngo['ngoName'];
            $loggedInUser->NGOUniqueID = $loggedinngo['NGOUniqueID'];
            $loggedInUser->license = $loggedinngo['license'];
            $loggedInUser->ngoEmail = $loggedinngo['ngoEmail'];
            $loggedInUser->ngoPhone = $loggedinngo['ngoPhone'];
            $loggedInUser->ngoWebsite = $loggedinngo['ngoWebsite'];
            $loggedInUser->ngoEstYear = $loggedinngo['ngoEstYear'];
            $loggedInUser->ngoType = $loggedinngo['ngoType'];
            $loggedInUser->ngoCause = $loggedinngo['ngoCause'];
            $loggedInUser->ngoFundraiserName = $loggedinngo['ngoFundraiserName'];
            $loggedInUser->ngoPeopleHelped = $loggedinngo['ngoPeopleHelped'];
            $loggedInUser->description = $loggedinngo['ngoDescription'];
            $loggedInUser->location = $loggedinngo['ngoLocation'];

            $_SESSION['thisUser'] = $loggedInUser;

            header('Location: ../ngoProfile.php');
        }else if($userDetails['usertype'] == 'volunteer'){
            $loggedinngo = fetchThisUser($userDetails['email'],$userDetails['usertype']);

            $loggedInUser = new user();

            $loggedInUser->firstName = $loggedinngo['firstName'];
            $loggedInUser->lastName = $loggedinngo['lastName'];
            $loggedInUser->Email = $loggedinngo['email'];
            $loggedInUser->Phone = $loggedinngo['phone'];
            $loggedInUser->Birthdate = $loggedinngo['birthdate'];

            $_SESSION['thisUser'] = $loggedInUser;

            header('Location: ../index.php');
        }
    }
}