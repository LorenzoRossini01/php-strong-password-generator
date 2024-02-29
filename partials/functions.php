<?php

function get_rand_password($length,$char_array,$final_array){
    while(count($final_array)<$length){

        $rand_index=rand(1,count($char_array)-1);
        $final_array[]=$char_array[$rand_index];
    }
    return implode("",$final_array);

};
function get_unique_rand_password($length,$char_array,$final_array){
    while(count($final_array)<$length){

        $rand_index=rand(0,(count($char_array)-1));
        $current_char=$char_array[$rand_index];
        if(!in_array($current_char,$final_array)){

            $final_array[]=$char_array[$rand_index];
        };
    }
    return implode("",$final_array);

}
