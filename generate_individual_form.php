<?php
require 'config.php'; // Include your database connection configuration

// Check if reg_no parameter is provided in the URL
if (isset($_GET['reg_no'])) {
    $reg_no = $_GET['reg_no'];

    // Fetch data for the specific student
    $query = "SELECT * FROM tb_data WHERE reg_no = '$reg_no'";
    $result = mysqli_query($conn, $query);
    $student = mysqli_fetch_assoc($result);
} else {
    // Redirect if reg_no parameter is not provided
    header("Location: next.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Admission Form</title>
    <style>
         body {
            font-family: Arial, sans-serif;
        }

        .admission-form {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: none; /* Remove border */
            background-color: transparent; /* Add transparent background */
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="admission-form">
        <h2>UNIVERSITY OF VAVUNIYA</h2>
        <h3>FACULTY OF APPLIED SCIENCE</h3>
        <h4>FOURTH EXAMINATION IN COMPUTER SCIENCE – 2021 –<br>SECOND SEMESTER – AUG/SEPTEMBER 2023</h4>
        <h2>ADMISSION CARD</h2>

        <p>Candidates are expected to produce this admission card to the Supervisor/Invigilator/Examiner at the Examination Hall. This form should be filled and signed by the candidates in the presence of the Supervisor/Invigilator Examiner every time a paper test is taken. The Supervisor/Invigilator/Examiner is expected to authenticate the signature of the candidate by placing his/her initials in the appropriate column. Students are requested to hand over the admission card to the Supervisor on the last day of the paper.</p>

        <!--<form action="#" method="post">-->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="reg_no">Registration Number:</label>
                <input type="text" id="reg_no" name="reg_no" value="<?php echo $student['reg_no']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="index_num">Index Number:</label>
                <input type="text" id="index_num" name="index_num" value="<?php echo $student['index_num']; ?>" readonly>
            </div>
            
            <!-- Add more form fields as needed -->

            <table>
                <tr>
                    <th>S.No</th>
                    <th>Unit Code</th>
                    <th>Subject</th>
                    <th>Eligibility</th>
                    <th>Date</th>
                    <th>Candidate’s Signature</th>
                    <th>Initials of Supervisor/Invigilator</th>
                </tr>
                <tr>
                <td>01</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>02</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>03</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>04</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>05</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>06</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>07</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>08</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>09</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>10</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </table>

            <p><strong>Instructions:</strong></p>
            <ol>
                <li>No candidate shall be admitted to the Examination hall without this card.</li>
                <li>If any candidate loses this admission card, he/she shall obtain a duplicate Admission Card on payment of Rs. 150/-.</li>
                <li>Every candidate shall produce his/her Identity Card at every paper/Practical Examination he/she sits for.</li>
                <li>Any unauthorized documents, notes, and bags should not be taken into the Examinations.</li>
                <li>When unable to be present for any part of the Examination, it should be notified to me immediately in writing. No appeals will be considered later without this timely notification to me.</li>
            </ol>
        </form>
    </div>
</body>
</html>
