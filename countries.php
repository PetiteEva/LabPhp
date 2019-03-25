<?php

$countries = array("FR"=>"France", "PL"=>"Poland");

foreach($countries as $key){
    print $key;
}

foreach($countries as $key => $value){
    print "$key => $value";
}

?>