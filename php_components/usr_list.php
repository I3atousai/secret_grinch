<?php 
// sql updates 
    include('../php_components/usr_list_upd.php');
    $founder_name = Users::get_one($boxes_arr[$i]['founder_id'])['name']
    ?>   
    <div class="config_box">
        <p class="founder_name mb8 arial"><?php echo $founder_name ?></p>
            <?php 
            if ($_SESSION['auth']['logged_user_id'] == $boxes_arr[$i]['founder_id']) {
            ?>
                <span class="config_box">
                <a href="<?php echo ($join_link . "?join_hash=" . $boxes_arr[$i]['join_hash']) ?>">📜</a>
            <form class="shuffle_form" action="../php/results.php" method="post">
                <a href="../php/quick_results.php"> <button class="list_config_button" type="submit"  
                        name="shuffle_box"
                            value="<?php echo $boxes_arr[$i]['id'] ?>" 
                            id="<?php echo('shuffle_' . $i)?>"
                >🎲<button/></a>
            </form>
            <?php  
            
            ?>

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
    for ($u=0; $u < $user_amount; $u++) { 
        $user_to_get = $UABoxes_arr[$u]['user_id'];

        $box_user = Users::get_one($user_to_get);
                ?>
            
            <p class="arial"><?php echo $box_user['name'] ?> 

<form action="../php/usr_page.php" method="post">
    <?php if ($_SESSION['auth']['logged_user_id'] == $boxes_arr[$i]['founder_id']) { ?>
        <button name="<?php echo("del_user_number_" . $i . $u) ?>" id="<?php echo("del_user_number_" . $i . $u) ?>" 
        class="del_user_button" type="submit" value="sublit"></button>
     <?php } ?>
</form>
        
        
        </p>
            <hr class="mb8"/>
            <?php
        }
?>