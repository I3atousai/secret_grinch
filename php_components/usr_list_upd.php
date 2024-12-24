<?php 
    if (isset($_POST["delete_box" . $i])) {

        $params_ualb = [
        ["box_id", "=", $boxes_arr[$i]["id"]]
        ];
    UALB::delete($params_ualb);
    Notifications::delete($params_ualb);
    UBW::delete($params_ualb);
        $params_box = [
            ["id", "=", $boxes_arr[$i]["id"]]
        ];
    LB::delete($params_box);
    unlink( $join_link);
    header("Location:../php/usr_page.php");
    }
?>