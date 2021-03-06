<?php
function login($username, $password, $ip){
    // return sprintf('You are trying username=>%s, password=>%s', $username, $password);

    $pdo = Database::getInstance()->getConnection();
    // Check existence of the user
    $check_exist_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name =:username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
    );

    if($user_set->fetchColumn()>0){
        // Check if value matches anything in the database
        $check_match_query = 'SELECT * FROM tbl_user WHERE user_name =:username';
        $check_match_query .= ' AND user_pass="'.$password.'"';
        $user_match = $pdo->prepare($check_match_query);
        $user_match->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
        );

        while($founduser = $user_match->fetch(PDO::FETCH_ASSOC)){
            $id = $founduser['user_id'];
        }

        //update the user table and set the user_ip column to be $ip

        //hint:write a proper sql query to update
        //check syntax above to see how to execute the query correctly
        //this is the query that i can use
        $update = 'UPDATE tbl_user SET user_ip=:ip WHERE user_id = :id';
        $user_update = $pdo->prepare($update);
        $user_update->execute(
            array(
                ':ip' =>$ip,
                ':id' =>$id
            )
            ); 


        if(isset($id)){
            redirect_to('index.php');
        }else{
            return 'Your Password is incorrect';
        }
    }else{
        return 'User does not exist';
    }
}