<?php
session_start();
include_once('todo.php');

function displayTodo1(){                    
    if(isset($_SESSION['incomplete'])){
        foreach($_SESSION['incomplete'] as $key1 => $value1){
            echo ' 
                <li>  <input type= "checkbox" name = "check"> <label>'.$value1.'</label> 
                    <input type = "text"> <button class="edit" name = "editBtn"> Edit </button>
                    <button class="delete" name = "deleteBtn"> Delete </button>
                </li>
                <input type = "text" hidden name = "myVal" value ="'.$key1.'">
            ';
        }
    }
    else echo "" ;
  }


  function displayTodo2(){
    if(isset($_SESSION['complete'])){
        foreach($_SESSION['complete'] as $key2 => $value2){
            echo '  
             <li>  <input type= "checkbox" checked> <label>'.$value2.'</label> 
                   <input type = "text"> <button class="edit" name = "editBtn2"> Edit </button>
                    <button class="delete" name = "deleteBtn2"> Delete </button>
             </li>
             <input type = "text" hidden name = "myVal" value ="'.$key2.'"> ';
        }
    }
    else echo ""   ;
  }

?>
<html>
    <head>
        <title>TODO List</title>
        <link href="./style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h2>TODO LIST</h2>
            <h3>Add Item</h3>
            <p id="input-field">
                <input id="inputVal" type="text">
                <button id="addBtn" >Add</button>
            </p>
    
            <h3>Todo</h3>
             <ul id="incomplete-tasks">
            <!--<li><input type="checkbox"><label>Pay Bills</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li>
                <li><input type="checkbox"><label>Go Shopping</label><input type="text" value="Go Shopping"><button class="edit">Edit</button><button class="delete">Delete</button></li> -->

                <li>  <?php   echo displayTodo1();  ?>  </li>
            </ul>
    
            <h3>Completed</h3>
            <ul id="completed-tasks">
                <!-- <li><input type="checkbox" checked><label>See the Doctor</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li> -->
            </ul>

            <li>  <?php   echo displayTodo2();  ?>  </li>


        </div>
    


        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="./script.js"></script>
    </body>
</html>