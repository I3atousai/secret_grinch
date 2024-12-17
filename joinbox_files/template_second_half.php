if (!isset($_SESSION['auth'])) {
            echo "Только зарегистрированные пользлватели могут присоеденяться к коробкам";
        }
        <!-- add if statement that checks if get value is ok -->
        else {
                
            $data_user_added = [
                "user_id"=> $_SESSION['auth']['logged_user_id'],
                "box_id"=> $box_id_to_add
            ];
            UALB::add($data_user_added);  
        }
        ?>
        <?php include_once('../php/footer.php') ;
        unset($_SESSION['sql_del'])?>
    </div>
    <!-- work with this -->
    <!-- <script src="../js/template.js"></script>
    <script>
            setFounder('<?php //echo $boxes_arr['join_hash'] ?>')
    </script> -->
</body>
</html>