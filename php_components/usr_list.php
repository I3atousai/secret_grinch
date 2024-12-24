<?php 
// sql updates 
    include('../php_components/usr_list_upd.php');
    $founder_name = Users::get_one($boxes_arr[$i]['founder_id'])['name']
    ?>   
    <div class="config_box">
        <p class="founder_name mb8 arial"><?php echo $founder_name ?></p>
        <button onclick="work_modal('modal_make_wish')" class="make_wish_btn" >✨</button>
                <div class="modal" id="modal_make_wish">
                    <div class="modal_bg"></div>
                    <div class="modal_content">
                        <button onclick="work_modal('modal_make_wish')" class="close_modal">Закрыть</button>
                        <form action="<?php echo "../Service/make_wish.php" ?>" method="post">
                            <h3 class="fw100" id="question">О каком подарке вы мечтаете?</h3>
                            <!-- <p class="warn fw100">(желание можно загадать только 1 раз)</p> -->
                            <input id="user_wish" class="fw100" type="text" name="wish" placeholder="Я хочу...">
                            <button id="push_wish" name="box_id" value="<?php echo $boxes_arr[$i]['id'] ?>" >Загадать желание</button>
                        </form>
                    </div>
                </div>
            <?php 
            if ($_SESSION['auth']['logged_user_id'] == $boxes_arr[$i]['founder_id']) {
            ?>
                <span class="config_box">
                <a class="emoji_button" href="<?php echo ($join_link . "?join_hash=" . $boxes_arr[$i]['join_hash']) ?>">📜</a>
            <form class="shuffle_form" action="../php/results.php" method="post">

            <?php
            if ($user_amount >= 3) { ?>
                <a href="../php/quick_results.php"> <button class="list_config_button" type="submit"  
                        name="shuffle_box"
                            value="<?php echo $boxes_arr[$i]['id'] ?>" 
                            id="<?php echo('shuffle_' . $i)?>"
                >🎲<button/></a>
           <?php } ?>
            </form>
            <?php 
                if ($boxes_arr[$i]['closed_or_oped'] == 1) { ?>
                <button onclick="toggleState(<?php echo $i ?>, 0, <?php echo $boxes_arr[$i]['id'] ?>)"
                type="button" class="list_config_button"  id=<?php echo('"change_state_close_' . $i . '"')?> >✔️</button>
                <button onclick="toggleState(<?php echo($i)?>, 1, <?php echo $boxes_arr[$i]['id'] ?>)" 
                type="button" class="hidden list_config_button" id=<?php echo('"change_state_open_' . $i . '"')?> >❌</button>
            <?php
            }
            else { ?>
                <button onclick="toggleState(<?php echo $i ?>, 0, <?php echo $boxes_arr[$i]['id'] ?>)"
                type="button" class="hidden list_config_button" id=<?php echo('"change_state_close_' . $i . '"')?> >✔️</button>
                <button onclick="toggleState(<?php echo($i)?>, 1, <?php echo $boxes_arr[$i]['id'] ?>)" 
                type="button" class="list_config_button" id=<?php echo('"change_state_open_' . $i . '"')?> >❌</button>
            <?php
            }
            ?>
            </span>
            <?php
                }  ?>
                
        
    </div>    
    <?php
    
            // SELECT users.name, wish, usr_id FROM `user_box_wish` JOIN users WHERE user_box_wish.id = 
            //(SELECT  MAX(user_box_wish.id) FROM `user_box_wish` JOIN users WHERE box_id = 3 and users.id = 4) and box_id = 3 and users.id = user_box_wish.usr_id;
            // $get = [
            //     "ubw.wish",
            // ];
            // $tables = ["user_box_wish as ubw",
            //             "users as u"];
            // $params = [
            //     ["ubw.id", "=", "(SELECT  MAX(user_box_wish.id) FROM `user_box_wish` JOIN users WHERE box_id =" . $boxes_arr[$i]['id'] . "and users.id =". $box_user['id'] . ")", "system", "AND"],
            //     ["ubw.box_id", "=", $boxes_arr[$i]['id'], "value", "AND"],
            //     ["u.id", "=", $box_user['id'], "value"],
            // ];
            //      $wish_usrid_username = LB::query(get:$get, tables:$tables, params:$params, unique:true) ;



    for ($u=0; $u < $user_amount; $u++) { 
        $user_to_get = $UABoxes_arr[$u]['user_id'];
        $box_user = Users::get_one($user_to_get);
        //so far SELECT users.name, wish, usr_id FROM `user_box_wish` JOIN users WHERE box_id = 3 and users.id = user_box_wish.usr_id and users.id = 14;
        $get = [
            "ubw.wish",
        ];
        $tables = ["user_box_wish as ubw",
                    "users as u"];
        $params = [
            ["ubw.usr_id", "=", $box_user['id'] , "value", "AND"],
            ["ubw.box_id", "=", $boxes_arr[$i]['id'], "value"]
        ];
             $wish = LB::query(get:$get, tables:$tables, params:$params, unique:true, fetch_mode:"one") ;
                ?>
            <img class="usr_pfp_list" src="<?php echo $box_user['profile_pic_path'] ?>" alt="pfp">
            <p class="usr_name_list" 
            
              <?php  if (isset($wish['wish'])) { ?>
                data-tooltip="<? echo($wish['wish'])   ?>"
            <?php } ?>
             
            id="<?php echo("user_number_" . $i . $u) ?>" class="arial"><?php echo $box_user['name'] ?> 

    <?php if ($_SESSION['auth']['logged_user_id'] == $boxes_arr[$i]['founder_id']) { ?>
        <button id="<?php echo("del_user_number_" . $i . $u) ?>" 
        onclick="del_user_number_(<?php echo $i ?>, <?php echo $u ?>, <?php echo $user_to_get ?>,  <?php echo $boxes_arr[$i]['id'] ?>)" 
        class="del_user_button" type="button" value="sublit"></button>
     <?php } ?>
        
        </p>
            <hr id="<?php echo("hr_" . $i . $u) ?>" class="mb8"/>
            <?php
        }
?>