<?php

$options = get_option( 'i_settings' );



$in = new Instagram_Row($options["iapikey"], $options["isecapi"], $options["iusname"], $options["icss_styles"], $options["iat"] ,$options["iuserID"]);

$ijson = $in->connect_insta();

$ijson = json_decode($ijson);


//functions

function iConnect($x){ //this is to just test it
      if(!$x){
        throw new Exception("Can't Connect to Instagram");
      }
      elseif(isset($x->errors)){
        if($x->errors[0]->code == 88){
          throw new Exception("LIMIT EXCEEDED");
        }
      }

}
set_exception_handler("iConnect");





 