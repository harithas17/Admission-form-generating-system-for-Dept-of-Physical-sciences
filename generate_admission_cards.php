<?php
require 'config.php';

$query = "SELECT * FROM tb_data";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($data as $student) {
    $name = $student['name'];
    $reg_no = $student['reg_no'];
    $index_num = $student['index_num'];
    $AMA3213 = $student['AMA3213'];
    // ... and other fields
    
    // Generate admission card for each student
    echo "
    <div class='admission-card'>
        <h2>UNIVERSITY OF VAVUNIYA</h2>
        <h3>FACULTY OF APPLIED SCIENCE</h3>
        <h4>FOURTH EXAMINATION IN COMPUTER SCIENCE – 2020 –<br>SECOND SEMESTER – JULY/AUGUST 2022</h4>
        <h2>ADMISSION CARD</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Reg. No:</strong> $reg_no</p>
        <p><strong>Index No:</strong> $index_num</p>
        <p>Candidates are expected to produce this admission card to the Supervisor/Invigilator/Examiner at the Examination Hall...</p>
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
                <th>01</th>
                <th>$AMA3213</th>
                <th>Applied Mathematics</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                 <th>02</th>
                <th>$PMA3213</th>
                <th>Pure Mathematics</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>04</th>
                <th>$CSC3213</th>
                <th>Applied Mathematics</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
          
        </table>
        <p><strong>Instructions:</strong></p>
        <!-- ... instructions ... -->
    </div>
    ";
}
?>
