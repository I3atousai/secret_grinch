if (!isset($_SESSION['auth'])) {
            echo "<h2 class=\"box_error\">Только зарегистрированные пользлватели могут присоеденяться к коробкам</h2>";
        }
        else {
            if ($_GET['join_hash'] != $join_hash) {
                echo "<h2 class=\"box_error\">Ссылка повреждена</h2>";
            }
            else {
                if (LB::get_one($box_id_to_add)['closed_or_oped'] == 0) {
                    echo "<h2 class=\"box_error\">Коробка закрыта, обратитесь к владельцу ссылки</h2>";
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
                        echo "<h2 class=\"box_error\">Пользователь уже в коробке</h2>";
                    }
                    else {
                        
                        $data_user_added = [
                            "user_id"=> $_SESSION['auth']['logged_user_id'],
                            "box_id"=> $box_id_to_add
                        ];
                        UALB::add($data_user_added);  
                        header("Location:../php/usr_page.php");
                    }
                }
            }
        }
        ?>
        <?php  include_once('../php_components/footer.php') ?>
    </div>
</body>
</html>