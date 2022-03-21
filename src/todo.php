<?php
session_start();
if(isset($_POST['input'])){
    if(isset($_SESSION['incomplete'])){
        array_push($_SESSION['incomplete'],$_POST['input']);
      }
      else{
          $_SESSION['incomplete'] = array($_POST['input']);
      }
}

if(isset($_POST['index-pos'])){
    if(isset($_SESSION['incomplete'])){
        array_splice($_SESSION['incomplete'], $_POST['index-pos'],1 );
    }
       
      
}

if(isset($_POST['inputUpdate'])){
       if(isset($_SESSION['incomplete'])){
           foreach($_SESSION['incomplete'] as $key => $value){
               if($key ==  $_POST['myIndex']){
                   $_SESSION['incomplete'][$key] = $_POST['inputUpdate']; 
               }
           }
    }
}
    if(isset($_POST['check2'])){
        $_SESSION['temporary'] = $_SESSION['incomplete'][$_POST['check2']];
        array_splice($_SESSION['incomplete'], $_POST['check2'],1);

        if(isset($_SESSION['complete'])){
            array_push($_SESSION['complete'],$_SESSION['temporary']);
        }
        else{
            $_SESSION['complete'] = array($_SESSION['temporary']);
        }

        $mainArr['incomplete'] = $_SESSION['incomplete'];
        $mainArr['complete'] = $_SESSION['complete'];
        echo json_encode($mainArr);
    }
    else if(isset($_POST['index-comp'])){
        array_splice($_SESSION['complete'], $_POST['index-comp']);
        echo json_encode($_SESSION['complete']);
    }
    
    else {
        if(isset($_SESSION['incomplete']))
        echo json_encode($_SESSION['incomplete']);
      }


    
?>



