<?php 
 
// Load the database configuration file 
include_once 'config.php'; 
 
// Include PhpSpreadsheet library autoloader 
require_once 'vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Reader\Xlsx; 
 
if(isset($_POST['importSubmit'])){ 
     
    // Allowed mime types 
    $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
     
    // Validate whether selected file is a Excel file 
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)){ 
         
        // If the file is uploaded 
        if(is_uploaded_file($_FILES['file']['tmp_name'])){ 
            $reader = new Xlsx(); 
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']); 
            $worksheet = $spreadsheet->getActiveSheet();  
            $worksheet_arr = $worksheet->toArray(); 
 
            // Remove header row 
            unset($worksheet_arr[0]); 
 
            foreach($worksheet_arr as $row){ 
                $s_no = $row[0]; 
                $reg_num = $row[1]; 
                $index_num = $row[2]; 
                $name = $row[3];
                $AMA3213 = $row[4]; 
                $PMA3213 = $row[5]; 
                $STA3213 = $row[6]; 
                $CSC3213 = $row[7]; 
                $CSC3222 = $row[8]; 
 
                // Check whether member already exists in the database with the same email 
                $prevQuery = "SELECT id FROM member WHERE reg_num = '".$reg_num."'"; 
                $prevResult = $db->query($prevQuery); 
                 
                if($prevResult->num_rows > 0){ 
                    // Update member data in the database 
                    $db->query("UPDATE member SET s_no = '".$s_no."', index_num = '".$index_num."', name = '".$name."', AMA3213 = '".$AMA3213."', PMA3213 = '".$PMA3213."', STA3213 = '".$STA3213."', CSC3213 = '".$CSC3213."', CSC3222 = '".$CSC3222."', modified = NOW() WHERE reg_num = '".$reg_num."'"); 
                } else {
                    $db->query("INSERT INTO member (s_no, reg_num, index_num, name, AMA3213, PMA3213, STA3213, CSC3213, CSC3222, created, modified) VALUES ('".$s_no."', '".$reg_num."', '".$index_num."', '".$name."', '".$AMA3213."', '".$PMA3213."', '".$STA3213."', '".$CSC3213."', '".$CSC3222."', NOW(), NOW())"); 
                }
            } 
             
            $qstring = '?status=succ'; 
        }else{ 
            $qstring = '?status=err'; 
        } 
    }else{ 
        $qstring = '?status=invalid_file'; 
    } 
} 
 
// Redirect to the listing page 
header("Location: uploadsheet.php".$qstring); 
 
?>