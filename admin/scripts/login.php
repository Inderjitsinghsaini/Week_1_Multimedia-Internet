<?php
function login($username, $password){
    //return sprintf('You are trying with username=>%s, password=>%s', $username, $password);

    $pdo = Database::getInstance()->getConnection();

    //check assistance
    //TODo: finish this query ti count how many users
    //with the username = $username
    $check_exist_query = 'SELECT COUNT(*)
    FROM tbl_user WHERE user_name = "' .$username.'"';

    $user_set = $pdo->query($check_exist_query);


    if($user_set->fetchColumn()>0){

    $check_match_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = "' .$username.'"';
    $check_match_query  .= ' AND user_pass="' .$password.'"'; 
    $user_match = $pdo->query($check_match_query);
    if($user_match->fetchColumn()>0){

        return 'You logged in successfully';
    }else{

        return 'wrong pass';
    }

    }else{
        return 'User does not exist';
    }

    
}


