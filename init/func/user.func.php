<?php
function createUser($name, $username, $password, $photo){
    global $db;
    $image_path = null;
    if(!empty($photo['name'])){
        $image_path = uploadImage($photo);
    }
    $query = $db->prepare('INSERT INTO tbl_users (name,username,passwd,photo) VALUES (?,?,?,?)');
    $query->bind_param('ssss', $name,$username, $password,$image_path);
    $query->execute();
    if($query->affected_rows){
        return true;
    } 
    return false;
}
function getUsers(){
    global $db;
    $query = $db->prepare('SELECT * FROM tbl_users WHERE level <> "admin"');
    $query->execute();
    $result = $query->get_result();
    return $result;
}
function readUser($id){
    global $db;
    $query = $db->prepare('SELECT * FROM tbl_users WHERE id = ?');
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    if($result->num_rows > 0){
        return $result->fetch_object();
    }
    return null;
}
function deleteUser($id){
    global $db;
    $query = $db->prepare('DELETE FROM tbl_users WHERE id = ?');
    $query->bind_param('i', $id);
    $query->execute();
    if($query->affected_rows){
        return true;
    } 
    return false;
}


?>
