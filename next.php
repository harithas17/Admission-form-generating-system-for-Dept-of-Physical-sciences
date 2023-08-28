<?php
require 'config.php'; // Include your database connection configuration

// Fetch all data from the tb_data table
$query = "SELECT * FROM tb_data";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
    <h2>Student Details and Admission Forms</h2>
    <table>
        <tr>
            <th>#</th>
            <th>reg_no</th>
            <th>index_num</th>
            <th>name</th>
            <th>AMA3213</th>
            <th>PMA3213</th>
            <th>CSC3213</th>
            <th>Admission Form</th> <!-- New column for hyperlink -->
        </tr>
        <?php
        foreach ($data as $index => $row) {
            echo "
            <tr>
                <td> " . ($index + 1) . " </td>
                <td> " . $row['reg_no'] . " </td>
                <td> " . $row['index_num'] . " </td>
                <td> " . $row['name'] . " </td>
                <td> " . $row['AMA3213'] . " </td>
                <td> " . $row['PMA3213'] . " </td>
                <td> " . $row['CSC3213'] . " </td>
                <td><a href='generate_individual_form.php?reg_no=" . $row['reg_no'] . "'>Generate Form</a></td> <!-- Hyperlink column -->
            </tr>
            ";
        }
        ?>
    </table>

    <p><a href='generate_all_forms.php'>Generate Admission Cards for All Students</a></p>
    <p>E-Medical</p>
    <p>P-ropr</p>
    <p>V-Resit</p>

</body>
</html>
