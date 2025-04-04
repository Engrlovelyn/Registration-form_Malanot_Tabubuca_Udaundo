<?php
// ito yung data base connection
$host = 'localhost'; // Hostname
$username = 'root';  // MySQL username (default: root for XAMPP)
$password = '';      // MySQL password (default: empty for XAMPP)
$dbname = 'college_registration'; // pangalan to nung data base mo sa sql

// pag gawa ng connection
$conn = new mysqli($host, $username, $password, $dbname);

// ito para icheck kung tama yung connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ito na yung get data na kung annong nakalagay sa html form yun yung naka connect dito malamng alangan i process mo yung wala sa form diba
$full_name = $_POST['full_name'];
$birthdate = $_POST['birthdate'];
$birthplace = $_POST['birthplace'];
$gender = $_POST['gender'];
$citizenship = $_POST['citizenship'];
$civil_status = $_POST['civil_status'];
$contact_number = $_POST['contact_number'];
$email_address = $_POST['email_address'];
$home_address = $_POST['home_address'];
$shs_school = $_POST['shs_school'];
$shs_strand = $_POST['shs_strand'];
$shs_year = $_POST['shs_year'];
$awards = $_POST['awards'];
$parent_name = $_POST['parent_name'];
$parent_contact = $_POST['parent_contact'];
$parent_occupation = $_POST['parent_occupation'];
$course = $_POST['course'];
$student_type = $_POST['student_type'];
$academic_year = $_POST['academic_year'];
$semester = $_POST['semester'];
$preferred_section = $_POST['preferred_section'];

// ito naman yung mag check sa file na in upload mo yung 2x2 ning
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    // ito na yung mag handle sa file
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_dest = 'uploads/' . $file_name;

    // Move the uploaded file to the "uploads" directory
    if (move_uploaded_file($file_tmp, $file_dest)) {
        echo "File uploaded successfully!";

        // Prepare the SQL query to insert data into the database
        $sql = "INSERT INTO registration_data (full_name, birthdate, birthplace, gender, citizenship, civil_status, contact_number, email_address, home_address, shs_school, shs_strand, shs_year, awards, parent_name, parent_contact, parent_occupation, course, student_type, academic_year, semester, preferred_section, file_name)
                VALUES ('$full_name', '$birthdate', '$birthplace', '$gender', '$citizenship', '$civil_status', '$contact_number', '$email_address', '$home_address', '$shs_school', '$shs_strand', '$shs_year', '$awards', '$parent_name', '$parent_contact', '$parent_occupation', '$course', '$student_type', '$academic_year', '$semester', '$preferred_section', '$file_name')";

        // finalyy ito na yung mag check kung nakapasok ba siya sa data base
        if (mysqli_query($conn, $sql)) {
            echo "Congrats tapos na awit ang hirap mong kuninnnn!!!!!!!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file!";
    }
} else {
    echo "No file uploaded or an error occurred with the file upload.";
}

// Close monaa kase nakakapagod naaa 
$conn->close();
?>
