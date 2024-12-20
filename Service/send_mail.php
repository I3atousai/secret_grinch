<?php 
session_start();

        $headers  = "From: " . "grinchsecret@gmail.com" . "\r\n";
        // $headers .= "CC: susan@example.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // $message .=  "\$" . 'box_id_to_add =' . $box_id_to_add . ";\n";
        // $message .=  "\$" . 'join_hash ="' . $join_hash . "\";\n\n";
        // $message .= file_get_contents('../joinbox_files/template_second_half.php',TRUE);
        
        try {
          mail($santa_email, $subject , $message,$headers);
          echo "worked?";
        } catch (\Throwable $th) {
          echo $th->getMessage();
        }?>
   