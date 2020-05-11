<?php
    function showGenerateKey($key){
       global $task;
       if("key" == $task){
           printf(" value = '%s' ",$key);
       }
    }