<?php 
    if(isset($_POST['formName'])){
        include '../server/db.php';


        $school = [];
        $subject = [];
        $midwifery = [];
        $employment = [];
        foreach($_POST as $key => $value){
            $expKey = explode('-', $key);
            if(count($expKey) == 3){
                if($expKey[0] == 'school'){
                    $school[$expKey[2]][$expKey[1]] = $_POST[$expKey[0].'-'.$expKey[1].'-'.$expKey[2]];
                } else if($expKey[0] == 'subject'){
                    $subject[$expKey[2]][$expKey[1]] = $_POST[$expKey[0].'-'.$expKey[1].'-'.$expKey[2]];
                } else if($expKey[0] == 'midwifery'){
                    $midwifery[$expKey[2]][$expKey[1]] = $_POST[$expKey[0].'-'.$expKey[1].'-'.$expKey[2]];
                } else if($expKey[0] == 'employment'){
                    $employment[$expKey[2]][$expKey[1]] = $_POST[$expKey[0].'-'.$expKey[1].'-'.$expKey[2]];
                }
            }
        }

        $school = json_encode(array_values($school));
        $subject = json_encode(array_values($subject));
        $midwifery = json_encode(array_values($midwifery));
        $employment = json_encode(array_values($employment));
        $experience = filter_var($_POST['experience'], FILTER_SANITIZE_STRING);
        $postalAddress = filter_var($_POST['postal_address'], FILTER_SANITIZE_STRING);

        $stmt = $conn->prepare("INSERT INTO users (user_id, school_attended, subject_grade, midwifery_school, experience, employment, postal_address) VALUES (?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE school_attended = ?, subject_grade = ?, midwifery_school = ?, experience = ?, employment = ?, postal_address = ?");
        $stmt->bind_param("sssssssssssss", $user_id, $school, $subject, $midwifery, $experience, $employment, $postalAddress, $school, $subject, $midwifery, $experience, $employment, $postalAddress);
        
        // Execute statement and check for errors
        if($stmt->execute() === TRUE) {
            echo "Data submitted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        // Close statement and connection
        $stmt->close();
        $conn->close();

    }


?>

