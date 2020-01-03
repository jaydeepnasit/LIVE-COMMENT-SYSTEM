<?php

session_start();

require_once '../Config/Functions.php';
$Fun_call = new Functions();
global $post_no;

if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_uni_no'])){
    header('Location:index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['post_uni_no']) && is_numeric($_POST['post_uni_no'])){

        $post_no = $Fun_call->validate($_POST['post_uni_no']);

        $condition1['mc_p_uni_id'] = $post_no;
        $fetch_comment = $Fun_call->select_order_where('mcomments', $condition1, 'mc_id');

        $countwhere['mc_p_uni_id'] = $post_no;
        $totalcomment = $Fun_call->select_count('mcomments', $countwhere);

        $field['u_uni_no'] = $_SESSION['user_uni_no'];
        $sel_user_img = $Fun_call->select_assoc('user', $field);

    }
    else{
        echo "Invalid Data";
    }

}
else{
    echo "Invalid Method";
}


?>

                    <form id="comment_post_replay" style="display:none;">
                        <div class="comment-area">
                            <div class="comment-area-user">
                                <div class="comment-img-box">
                                    <img src="Images/User/<?php echo $sel_user_img['u_image']; ?>" class="img-set-100"
                                        alt="Images Not Found">
                                </div>
                            </div>
                            <div class="comment-area-text">
                                <textarea class="form-control" id="usercommentreplay" cols="30" rows="3"
                                    placeholder="Share Your Story"></textarea>
                            </div>
                            <div class="comment-area-btn">
                                <button type="submit" class="btn btn-sm btn-primary comment-btn">Add Replay</button>
                                <button type="button" id="close_rep" class="btn btn-sm btn-danger comment-btn mt-1">Close</button>
                            </div>
                            <span id="comment_rep_error" class="error-msg"></span>
                        </div>
                    </form>


                    <div class="title-comment"> <?php echo $totalcomment['NumberComments']; ?> User Comments</div>
                        <div class="card-body">

                        <?php if($fetch_comment){ foreach($fetch_comment as $fetch_cdata){ ?>
                           
                            <div class="w-100">
                                <div class="al-comment-ar">

                                    <?php
                                       $u_field['u_uni_no'] = $fetch_cdata['mc_u_uni_id'];
                                       $user_info = $Fun_call->select_assoc('user',$u_field);
                                    ?>

                                    <div class="comment-img-box-2" data-ppp="123">
                                        <img src="Images/User/<?php echo $user_info['u_image']; ?>" class="img-set-100"
                                            alt="Image Not Found">
                                    </div>
                                    <div class="main-comment-area">
                                        <h6 class="mb-0"><b><?php echo $user_info['u_name']; ?></b> <span
                                                class="cm-date"><?php echo $fetch_cdata['mc_date']; ?></span></h6>
                                        <span class="comment-text"><?php echo $fetch_cdata['mc_text']; ?></span>
                                    </div>
                                    <div class="replay-btn btn btn-sm btn-primary" data-dataid="<?php echo $fetch_cdata['mc_uni_no']; ?>">Replay</div>
                                </div>
                            </div>

                            <div class="add-sub-c">

                            </div>

                            <?php

                                $condi = $fetch_cdata['mc_uni_no'];
                                $replay = $Fun_call->replay_fetch("*", "mcomments", "mscomments", "mc_uni_no", "msc_mc_uni_no", $condi);                         

                                if($replay){ foreach($replay as $replay_data){

                            ?>

                            <div class="w-90" style="margin-left: auto !important;">
                                <div class="al-comment-ar">

                                    <?php
                                       $u_field1['u_uni_no'] = $replay_data['msc_u_uni_no'];
                                       $user_info_rep = $Fun_call->select_assoc('user', $u_field1);
                                    ?>

                                    <div class="comment-img-box-2">
                                        <img src="Images/User/<?php echo $user_info_rep['u_image']; ?>"
                                            class="img-set-100" alt="Image Not Found">
                                    </div>
                                    <div class="main-comment-area">
                                        <h6 class="mb-0"><b><?php echo $user_info_rep['u_name']; ?></b> <span
                                                class="cm-date"><?php echo $replay_data['msc_date']; ?></span></h6>
                                        <span class="comment-text"><?php echo $replay_data['msc_text']; ?></span>
                                    </div>
                                </div>
                            </div>

                                <?php }}  ?>

                                <?php }} ?>

                        </div>