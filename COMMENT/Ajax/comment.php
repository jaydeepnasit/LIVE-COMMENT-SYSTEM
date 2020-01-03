<?php

session_start();

require_once '../Config/Functions.php';
$Fun_call = new Functions();

$json_data = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['flag']) && ($_POST['flag'] == '000')){

        if(isset($_POST['comment_text']) && isset($_POST['post_no'])){

            $comment_text = $Fun_call->validate($_POST['comment_text']);
            $post_no = $Fun_call->validate($_POST['post_no']);

            if(!empty(trim($comment_text)) && (strlen($comment_text) <= 8000) && !empty(trim($post_no)) && is_numeric($post_no)){

                $field_val['mc_text'] = $comment_text;
                $field_val['mc_u_uni_id'] = $_SESSION['user_uni_no'];
                $field_val['mc_p_uni_id'] = $post_no;
                $field_val['mc_date'] = date('y-m-d');
                $field_val['mc_uni_no'] = rand(1000000000000000, 10000000000000000);

                $insert = $Fun_call->insert('mcomments', $field_val);

                if($insert){

                    $json_data['status'] = 101;
                    $json_data['msg'] = 'Comment Success';

                }
                else{

                    $json_data['status'] = 102;
                    $json_data['msg'] = 'Comment Fail';

                }

            }
            else{
                
                $json_data['status'] = 103;
                $json_data['msg'] = 'Invalid Format Found';

            }

        }
        else{

            $json_data['status'] = 104;
            $json_data['msg'] = 'Invalid Key-value Found';

        }
        
    }
    elseif(isset($_POST['R_flag']) && ($_POST['R_flag'] == '111')){

        if(isset($_POST['replay_text']) && isset($_POST['user_no']) && isset($_POST['replay_no'])){

            $replay_text = $Fun_call->validate($_POST['replay_text']);
            $user_no = $Fun_call->validate($_POST['user_no']);
            $replay_no = $Fun_call->validate($_POST['replay_no']);

            if(!empty(trim($replay_text)) && (strlen($replay_text) <= 8000) && !empty(trim($user_no)) && is_numeric($user_no) && !empty(trim($replay_no)) && is_numeric($replay_no)){

                $field_val['msc_text'] = $replay_text;
                $field_val['msc_u_uni_no'] = $user_no;
                $field_val['msc_mc_uni_no'] = $replay_no;
                $field_val['msc_date'] = date('y-m-d');
                $field_val['msc_uni_no'] = rand(1000000000000000, 10000000000000000);

                $insert_rep = $Fun_call->insert('mscomments', $field_val);

                if($insert_rep){

                    $json_data['status'] = 201;
                    $json_data['msg'] = 'Replay Success';

                }
                else{

                    $json_data['status'] = 202;
                    $json_data['msg'] = 'Replay Fail';

                }

            }
            else{

                $json_data['status'] = 203;
                $json_data['msg'] = 'Invalid Format Found';

            }

        }
        else{

            $json_data['status'] = 204;
            $json_data['msg'] = 'Invalid key-value Found';

        }

    }
    else{

        $json_data['status'] = 105;
        $json_data['msg'] = 'Invalid Flag';

    }

}
else{

    $json_data['status'] = 106;
    $json_data['msg'] = 'Invalid Request';
    
}

echo json_encode($json_data);

?>
