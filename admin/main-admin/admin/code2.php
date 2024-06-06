<?php 

include('../config/function.php');
    
if(isset($_POST['updateMainProfile'])){
    $adminId = validate($_POST['adminId']);
    $adminData = getById('admins', $adminId);
    if(!$adminData){
        redirect('profile.php','No Such Admin Found');
    }
    // $passwordCheck = $adminData['data']['password'];

    if($adminData['status'] != 200){
        redirect('profile.php', 'please fill required fields.');
    }

    
    $username = validate($_POST['username']);
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $address = validate($_POST['address']);
    $city = validate($_POST['city']);
    $country = validate($_POST['country']);
    $postal_code = validate($_POST['postal_code']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;
    $admin_type= 'admin';

    $usernameCheckQuery = "SELECT * FROM admins WHERE username='$username' AND id!='$adminId' AND admin_type='$admin_type'";
    $usernameResult = mysqli_query($conn, $usernameCheckQuery);
    if($usernameResult){
        if(mysqli_num_rows($usernameResult) > 0){
            redirect('profile.php','Username Already used by another Admin');
        }
    }

    $EmailCheckQuery = "SELECT * FROM admins WHERE email='$email' AND id!='$adminId' AND admin_type='$admin_type'";
    $checkResult = mysqli_query($conn, $EmailCheckQuery);
    if($checkResult){
        if(mysqli_num_rows($checkResult) > 0){
            redirect('profile.php','Email Already used by another Admin');
        }
    }

    $phoneCheckQuery = "SELECT * FROM admins WHERE phone='$phone' AND id!='$adminId' AND admin_type='$admin_type'";
    $phoneResult = mysqli_query($conn, $phoneCheckQuery);
    if($phoneResult){
        if(mysqli_num_rows($phoneResult) > 0){
            redirect('profile.php','Phone Number Already used by another Admin');
        }
    }

    if($_FILES['image']['size'] > 0)
    {
        $path = "../assets/uploads/main-admins";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $filename = time().'.'.$image_ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);

        $finalImage = "assets/uploads/main-admins/".$filename;

        $deleteImage =  "../".$adminData['data']['image'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);
        }
    }  
    else
    {
        $filename = $adminData['data']['image'];
    }

    if($password != ''){

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
  
    }else{
        $hashedPassword = $adminData['data']['password'];
    }

    if($username != '' && $email != ''){

        $data = [
            'image' => $finalImage,
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'postal_code' => $postal_code,
            'email' => $email,
            'password' => $hashedPassword,
            'phone' => $phone,
            'admin_type' => $admin_type,
            'is_ban' => $is_ban
        ];
        $result = update('admins', $adminId, $data);
        if($result){
            redirect('profile.php', 'Admin Updated Successfully');
        }else{
            redirect('profile.php', 'Something went wrong');
        }

    }else{
        redirect('profile.php', 'please fill required fields.');
    }    
}

if(isset($_POST['saveMainAdmin'])){
    $username = validate($_POST['username']);
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $address = validate($_POST['address']);
    $city = validate($_POST['city']);
    $country = validate($_POST['country']);
    $postal_code = validate($_POST['postal_code']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $admin_type= 'admin';
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;

    if($username != '' && $email != '' && $password != ''){

        $usernameCheck = mysqli_query($conn, "SELECT * FROM admins WHERE username='$username' AND admin_type='$admin_type' ");
        if($usernameCheck){
            if(mysqli_num_rows($usernameCheck) > 0){
                redirect('main-admins-create.php', 'Username Already used by another admin.');
            }
        }

        $emailCheck = mysqli_query($conn, "SELECT * FROM admins WHERE email='$email' AND admin_type='$admin_type'");
        if($emailCheck){
            if(mysqli_num_rows($emailCheck) > 0){
                redirect('main-admins-create.php', 'Email Already used by another Admin.');
            }
        }

        $phoneCheck = mysqli_query($conn, "SELECT * FROM admins WHERE phone='$phone' AND admin_type='$admin_type' ");
        if($phoneCheck){
            if(mysqli_num_rows($phoneCheck) > 0){
                redirect('main-admins-create.php', 'Phone Number Already used by another Admin.');
            }
        }

        if($_FILES['image']['size'] > 0)
        {
            $path = "../assets/uploads/main-admins";
            $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            $filename = time().'.'.$image_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);

            $finalImage = "assets/uploads/main-admins/".$filename;
        }  
        else
        {
            $filename = '';
        }

        $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
        $data = [
            'image' => $finalImage,
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'postal_code' => $postal_code,
            'email' => $email,
            'password' => $bcrypt_password,
            'phone' => $phone,
            'admin_type' => $admin_type,
            'is_ban' => $is_ban
        ];
        $result = insert('admins', $data);
        if($result){
            redirect('main-admins.php', 'Admin Created Successfully');
        }else{
            redirect('main-admins-create.php', 'Something went wrong');
        }

    }else{
        redirect('main-admins-create.php', 'please fill required fields.');
    }
}

if(isset($_POST['updateMainAdmin'])){
    $adminId = validate($_POST['adminId']);
    $adminData = getById('admins', $adminId);
    if(!$adminData){
        redirect('main-admins.php','No Such Admin Found');
    }

    $_SESSION['setImage'] = [
        'image' => $adminData['data']['image'],
    ];
    // $passwordCheck = $adminData['data']['password'];

    if($adminData['status'] != 200){
        redirect('main-admins-edit.php?id=' . $adminId, 'please fill required fields.');
    }

    $username = validate($_POST['username']);
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $address = validate($_POST['address']);
    $city = validate($_POST['city']);
    $country = validate($_POST['country']);
    $postal_code = validate($_POST['postal_code']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $admin_type = 'admin';
    $is_ban = validate($_POST['is_ban']) == true ? 1:0;

    $usernameCheckQuery = "SELECT * FROM admins WHERE username='$username' AND id!='$adminId' AND admin_type='$admin_type'";
    $usernameResult = mysqli_query($conn, $usernameCheckQuery);
    if($usernameResult){
        if(mysqli_num_rows($usernameResult) > 0){
            redirect('main-admins-edit.php?id='.$adminId,'Username Already used by another Admin');
        }
    }

    $EmailCheckQuery = "SELECT * FROM admins WHERE email='$email' AND id!='$adminId' AND admin_type='$admin_type'";
    $checkResult = mysqli_query($conn, $EmailCheckQuery);
    if($checkResult){
        if(mysqli_num_rows($checkResult) > 0){
            redirect('main-admins-edit.php?id='.$adminId,'Email Already used by another Admin');
        }
    }

    $phoneCheckQuery = "SELECT * FROM admins WHERE phone='$phone' AND id!='$adminId' AND admin_type='$admin_type'";
    $phoneResult = mysqli_query($conn, $phoneCheckQuery);
    if($phoneResult){
        if(mysqli_num_rows($phoneResult) > 0){
            redirect('main-admins-edit.php?id='.$adminId,'Phone Number Already used by another Admin');
        }
    }

    
    if($_FILES['image']['size'] > 0)
    {
        $path = "../assets/uploads/main-admins";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $filename = time().'.'.$image_ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);

        $finalImage = "assets/uploads/main-admins/".$filename;

        $deleteImage =  "../".$adminData['data']['image'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);
        }
    }  
    else
    {
        $filename = $adminData['data']['image'];
    }

    if($password != ''){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
    }else{
        $hashedPassword = $adminData['data']['password'];
    }

    if($username != '' && $email != ''){

        $data = [
            'image' => $finalImage,
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'postal_code' => $postal_code,
            'email' => $email,
            'password' => $hashedPassword,
            'phone' => $phone,
            'admin_type' => $admin_type,
            'is_ban' => $is_ban
        ];
        $result = update('admins', $adminId, $data);
        if($result){
            redirect('main-admins-edit.php?id='. $adminId, 'Admin Updated Successfully');
        }else{
            redirect('main-admins-edit.php?id='. $adminId, 'Something went wrong');
        }

    }else{
        redirect('main-admins-create.php', 'please fill required fields.');
    }    
}

?>