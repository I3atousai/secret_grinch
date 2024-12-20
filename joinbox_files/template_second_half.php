
if (!isset($_SESSION['auth'])) {
            echo "Только зарегистрированные пользлватели могут присоеденяться к коробкам";
        }
        else {
            if ($_GET['join_hash'] != $join_hash) {
                echo "Ссылка повреждена";
            }
            else {
                if (LB::get_one($box_id_to_add)['closed_or_oped'] == 0) {
                    echo "Коробка закрыта, обратитесь к владельцу ссылки";
                }
                else {
                    $get = [
                        "ualb.box_id",
                        "ualb.user_id"
                    ];
                    $tables = ["users_and_logged_boxes as ualb"];
                    $params = [
                        ["ualb.user_id", "=", $_SESSION['auth']['logged_user_id'], "system", "AND"],
                        ["ualb.box_id", "=", $box_id_to_add, "system"]
                    ];
        
                    if (count(UALB::query(get:$get, tables:$tables, params:$params)) >= 1) {
                        echo "пользователь уже в коробке";
                    }
                    else {
                        
                        $data_user_added = [
                            "user_id"=> $_SESSION['auth']['logged_user_id'],
                            "box_id"=> $box_id_to_add
                        ];
                        UALB::add($data_user_added);  
                    }
                }
            }
        }
        ?>
        <?php include_once('../php/footer.php') ;
        unset($_SESSION['sql_del'])?>
    </div>
</body>
</html>