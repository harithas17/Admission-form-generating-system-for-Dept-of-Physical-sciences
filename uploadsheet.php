<?php require 'config.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
        <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        form {
            margin-bottom: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
	</head>
	<body>
    <form class="" action="" method="post" enctype="multipart/form-data">
        <input type="file" name="excel" required value="">
        <button type="submit" name="import">Import</button>
    </form>
    <hr>
    <!-- ... (existing table code) ... -->
    <?php
    if(isset($_POST["import"])){
        $fileName = $_FILES["excel"]["name"];
        $fileExtension = explode('.', $fileName);
        $fileExtension = strtolower(end($fileExtension));
        $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

        $targetDirectory = "uploads/" . $newFileName;
        move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

        error_reporting(0);
        ini_set('display_errors', 0);

        require 'excelReader/excel_reader2.php';
        require 'excelReader/SpreadsheetReader.php';

        $reader = new SpreadsheetReader($targetDirectory);
        foreach($reader as $key => $row){
            $reg_no = $row[0];
            $index_num = $row[1];
            $name = $row[2];
            $AMA3213 = $row[3];
            $PMA3213 = $row[4];
            $CSC3213 = $row[5];
           
            // Add condition to check if reg_no matches the required format
             if (preg_match('/^\d{4}\/ASP\//', $reg_no)) {
                 mysqli_query($conn, "INSERT INTO tb_data VALUES('', '$reg_no', '$index_num','$name','$AMA3213','$PMA3213','$CSC3213')");
             }
        }

        echo
        "
        <script>
        window.location.href = 'next.php'; // Redirect to next.php after importing
        </script>
        ";
    }
    ?>
</body>
</html>
