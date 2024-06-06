<?php

    include('../config/function.php');
    
    if(isset($_POST['saveAdmin'])){
        $username = validate($_POST['username']);
        $firstname = validate($_POST['firstname']);
        $lastname = validate($_POST['lastname']);
        $gender = validate($_POST['gender']);
        $address = validate($_POST['address']);
        $city = validate($_POST['city']);
        $country = validate($_POST['country']);
        $postal_code = validate($_POST['postal_code']);
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        $phone = validate($_POST['phone']);
        $admin_type = 'employee';
        $is_ban = validate($_POST['is_ban']) == true ? 1:0;

        if($username != '' && $email != '' && $password != ''){

            $usernameCheck = mysqli_query($conn, "SELECT * FROM admins WHERE username='$username' AND admin_type='$admin_type' ");
            if($usernameCheck){
                if(mysqli_num_rows($usernameCheck) > 0){
                    redirect('admins-create.php', 'Username Already used by another user.');
                }
            }

            $emailCheck = mysqli_query($conn, "SELECT * FROM admins WHERE email='$email' AND admin_type='$admin_type'");
            if($emailCheck){
                if(mysqli_num_rows($emailCheck) > 0){
                    redirect('admins-create.php', 'Email Already used by another user.');
                }
            }

            $phoneCheck = mysqli_query($conn, "SELECT * FROM admins WHERE phone='$phone' AND admin_type='$admin_type' ");
            if($phoneCheck){
                if(mysqli_num_rows($phoneCheck) > 0){
                    redirect('admins-create.php', 'Phone Number Already used by another user.');
                }
            }

            $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
            $data = [
                'username' => $username,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'gender' => $gender,
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
            $result = insert('admins', $data);
            if($result){
                redirect('admins.php', 'Admin Created Successfully');
            }else{
                redirect('admins-create.php', 'Something went wrong');
            }

        }else{
            redirect('admins-create.php', 'please fill required fields.');
        }
    }

    if(isset($_POST['updateAdmin'])){
        $adminId = validate($_POST['adminId']);
        $adminData = getById('admins', $adminId);
        if(!$adminData){
            redirect('admins-edit.php','No Such Admin Found');
        }
        // $passwordCheck = $adminData['data']['password'];

        if($adminData['status'] != 200){
            redirect('admins-edit.php?id=' . $adminId, 'please fill required fields.');
        }

        $username = validate($_POST['username']);
        $firstname = validate($_POST['firstname']);
        $lastname = validate($_POST['lastname']);
        $gender =  validate($_POST['gender']);
        $address = validate($_POST['address']);
        $city = validate($_POST['city']);
        $country = validate($_POST['country']);
        $postal_code = validate($_POST['postal_code']);
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        $phone = validate($_POST['phone']);
        $admin_type = 'employee';
        $is_ban = validate($_POST['is_ban']) == true ? 1:0;

        $usernameCheckQuery = "SELECT * FROM admins WHERE username='$username' AND id!='$adminId' AND admin_type='$admin_type'";
        $usernameResult = mysqli_query($conn, $usernameCheckQuery);
        if($usernameResult){
            if(mysqli_num_rows($usernameResult) > 0){
                redirect('admins-edit.php?id='.$adminId,'Username Already used by another user');
            }
        }

        $EmailCheckQuery = "SELECT * FROM admins WHERE email='$email' AND id!='$adminId' AND admin_type='$admin_type'";
        $checkResult = mysqli_query($conn, $EmailCheckQuery);
        if($checkResult){
            if(mysqli_num_rows($checkResult) > 0){
                redirect('admins-edit.php?id='.$adminId,'Email Already used by another user');
            }
        }

        $phoneCheckQuery = "SELECT * FROM admins WHERE phone='$phone' AND id!='$adminId' AND admin_type='$admin_type'";
        $phoneResult = mysqli_query($conn, $phoneCheckQuery);
        if($phoneResult){
            if(mysqli_num_rows($phoneResult) > 0){
                redirect('admins-edit.php?id='.$adminId,'Phone Number Already used by another user');
            }
        }

        if($password != ''){
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
        }else{
            $hashedPassword = $adminData['data']['password'];
        }

        if($username != '' && $email != ''){

            $data = [
                'username' => $username,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'gender' => $gender,
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
                redirect('admins-edit.php?id='. $adminId, 'Admin Updated Successfully');
            }else{
                redirect('admins-edit.php?id='. $adminId, 'Something went wrong');
            }

        }else{
            redirect('admins-create.php', 'please fill required fields.');
        }    
    }

    if(isset($_POST['saveCategory']))
    {
        $name = validate($_POST['name']);
        $description = validate($_POST['description']);
        $status = isset($_POST['status']) == true ? 1:0; 

        $data = [
            'name' => $name,
            'description' => $description,
            'status' => $status
        ];
        $result = insert('categories', $data);
        if($result){
            redirect('categories.php', 'Category Created Successfully');
        }else{
            redirect('categories-create.php', 'Something went wrong');
        }
    }

    if(isset($_POST['updateCategory']))
    {
        $categoryId = validate($_POST['categoryId']);

        $name = validate($_POST['name']);
        $description = validate($_POST['description']);
        $status = isset($_POST['status']) == true ? 1:0; 

        $data = [
            'name' => $name,
            'description' => $description,
            'status' => $status
        ];
        $name = validate($_POST['name']);
        $result = update('categories', $categoryId, $data);
        if($result){
            redirect('categories-edit.php?id='.$categoryId, 'Category Updated Successfully');
        }else{
            redirect('categories-edit.php?id='.$categoryId, 'Something went wrong');
        }
    }

    if(isset($_POST['saveProduct']))
    {
        $category_id = validate($_POST['category_id']);
        $name = validate($_POST['name']);
        $description = validate($_POST['description']);
        $price = validate($_POST['price']);
        $quantity = validate($_POST['quantity']);
        $status = isset($_POST['status']) == true ? 1:0; 

        if($_FILES['image']['size'] > 0)
        {
            $path = "../assets/uploads/products";
            $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            $filename = time().'.'.$image_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);

            $finalImage = "assets/uploads/products/".$filename;
        }  
        else
        {
            $filename = '';
        }
        

        $data = [
            'category_id' => $category_id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $finalImage,
            'status' => $status
        ];
        $result = insert('products', $data);
        if($result){
            redirect('products.php', 'Product Created Successfully');
        }else{
            redirect('products-create.php', 'Something went wrong');
        }
    }

    if(isset($_POST['updateProduct']))
    {
        $product_id = validate($_POST['product_id']);
        $productData = getById('products', $product_id);
        if(!$productData){
            redirect('products.php','No Such Product Found');
        }
        $category_id = validate($_POST['category_id']);
        $name = validate($_POST['name']);
        $description = validate($_POST['description']);
        $price = validate($_POST['price']);
        $quantity = validate($_POST['quantity']);
        $status = isset($_POST['status']) == true ? 1:0; 

        if($_FILES['image']['size'] > 0)
        {
            $path = "../assets/uploads/products";
            $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            $filename = time().'.'.$image_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);

            $finalImage = "assets/uploads/products/".$filename;

            $deleteImage =  "../".$productData['data']['image'];
            if(file_exists($deleteImage)){
                unlink($deleteImage);
            }
        }  
        else
        {
            $filename = $productData['data']['image'];
        }
        

        $data = [
            'category_id' => $category_id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $finalImage,
            'status' => $status
        ];
        $result = update('products', $product_id, $data);
        if($result){
            redirect('products-edit.php?id='.$product_id, 'Product Updated Successfully');
        }else{
            redirect('products-edit-create.php?id='.$product_id, 'Something went wrong');
        }
    }

    if(isset($_POST['saveCustomer']))
    {
        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        $phone = validate($_POST['phone']);
        $status = isset($_POST['status']) ? 1:0;

        if($name != '')
        {
            $emailCheck = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email'");
            if($emailCheck){
                if(mysqli_num_rows($emailCheck) > 0){
                    redirect('customers.php', 'Email Already exist.');
                }
            }
            
            $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);
            

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $bcrypt_password,
                'phone' => $phone,
                'status' => $status
            ];

            $result = insert('customers', $data);
             
            if($result){
                redirect('customers.php', 'Customer Created Successfully');
            }else{
                redirect('customers.php', 'Something Went Wrong');
            }
        }
        else
        {
            redirect('customers.php', 'Please Fill required fields');
        }
    }

    if(isset($_POST['updateCustomer']))
    {
        $customerId = validate($_POST['customerId']);

        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $password = validate($_POST['password']);
        $phone = validate($_POST['phone']);
        $status = isset($_POST['status']) ? 1:0;

        if($name != '')
        {
            $emailCheck = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email' AND id!='$customerId' ");
            if($emailCheck){
                if(mysqli_num_rows($emailCheck) > 0){
                    redirect('customers-edit.php?id='.$customerId, 'Email Already exist.');
                }
            }

            if($password != ''){
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            }else{
                $hashedPassword = $adminData['data']['password'];
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'phone' => $phone,
                'status' => $status
            ];

            $result = update('customers', $customerId, $data);
             
            if($result){
                redirect('customers-edit.php?id='.$customerId, 'Customer Updated Successfully');
            }else{
                redirect('customers-edit.php?id='.$customerId, 'Something Went Wrong');
            }
        }
        else
        {
            redirect('customers-edit.php?id='.$customerId, 'Please Fill required fields');
        }
    }

    if(isset($_POST['saveBillInfoBtn'])){
        $adminId = validate($_POST['admin_id']);
        $p_fname = validate($_POST['p_fname']);
        $p_mname = validate($_POST['p_mname']);
        $p_lname = validate($_POST['p_lname']);
        $p_email = validate($_POST['p_email']);
        $p_phone = validate($_POST['p_phone']);
        $p_add_phone = validate($_POST['p_add_phone']);
        $p_address = validate($_POST['p_address']);
        $p_add_address = validate($_POST['p_add_address']);
        $p_nearB = validate($_POST['p_nearB']);
        $p_state = validate($_POST['p_state']);
        $p_pCode = validate($_POST['p_pCode']);

        $data = [
            'admin_id' => $adminId,
            'p_fname' => $p_fname,
            'p_mname' => $p_mname,
            'p_lname' => $p_lname,
            'p_email' => $p_email,
            'p_phone' => $p_phone,
            'p_add_phone' => $p_add_phone,
            'p_address' => $p_address,
            'p_add_address' => $p_add_address,
            'p_nearB' => $p_nearB,
            'p_state' => $p_state,
            'p_pCode' => $p_pCode,
        ];

        $result = insert('bill_info', $data);

        if($result){
            jsonResponse(200, 'success', 'Information Saved');
        }else{
            jsonResponse(500, 'error', 'Something went wrong');
        }
    }

    if(isset($_POST['updateBillInfo'])){
        $billId = validate($_POST['bill_id']);
        $p_fname = validate($_POST['p_fname']);
        $p_mname = validate($_POST['p_mname']);
        $p_lname = validate($_POST['p_lname']);
        $p_email = validate($_POST['p_email']);
        $p_phone = validate($_POST['p_phone']);
        $p_add_phone = validate($_POST['p_add_phone']);
        $p_address = validate($_POST['p_address']);
        $p_add_address = validate($_POST['p_add_address']);
        $p_nearB = validate($_POST['p_nearB']);
        $p_state = validate($_POST['p_state']);
        $p_pCode = validate($_POST['p_pCode']);

        if($p_fname != '' && $p_mname != '' && $p_lname != '' && $p_email != '' && $p_phone != '' && $p_address != '' && $p_nearB != '' && $p_state != '' && $p_pCode != ''){
            $data = [
                'p_fname' => $p_fname,
                'p_mname' => $p_mname,
                'p_lname' => $p_lname,
                'p_email' => $p_email,
                'p_phone' => $p_phone,
                'p_add_phone' => $p_add_phone,
                'p_address' => $p_address,
                'p_add_address' => $p_add_address,
                'p_nearB' => $p_nearB,
                'p_state' => $p_state,
                'p_pCode' => $p_pCode,
            ];

            $result = update('bill_info', $billId, $data);

            if($result){
                redirect('billings-info-edit.php?id='.$billId, 'Billing information Updated successfully');
            }else{
                redirect('billings-info-edit.php?id='.$billId, 'Something Went Wrong');
            }
        }else{
            redirect('billings-info-edit.php?id='.$billId, 'Fill Required Fields');
        }
    }


?>