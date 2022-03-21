$(document).ready(function(){
    $("#addBtn").click(function(){
     $.ajax({
         'url': 'todo.php',
         'method':'POST',
         'data' : {'input':$('#inputVal').val()},
         'datatype' : 'JSON'
     }).done(function(data){
         jData = $.parseJSON(data);
        // console.log(data);
         displayToDo1(jData);
     });
 }); 

});

function displayToDo1(data1){
var list = '';
for(var i =0;i<data1.length;i++){
    list += '<li>  <input type= "checkbox" data-check  = '+i+' class ="check" name = "check"> <label>'+data1[i]+'</label> \
    <input type = "text"> <button class="edit" data-ind = "'+i+'" name = "editBtn"> Edit </button>\
    <button class="delete" data-index = "'+i+'" name = "deleteBtn"> Delete </button>\
</li>';
}
$("#incomplete-tasks").html(list);
}



$(document).ready(function(){
$("#incomplete-tasks").on('click','.delete',function(){
 $.ajax({
     'url': 'todo.php',
     'method':'POST',
     'data' : {'index-pos':$(this).data('index')},
     'datatype' : 'JSON'
 }).done(function(data){
     jData = $.parseJSON(data);
    // console.log(data);
     displayToDo1(jData);
 });
})

});



$(document).ready(function(){
$("#incomplete-tasks").on('click','.edit',function(){
 var index = $(this).data('ind');
 $.ajax({
     'url': 'todo.php',
     'method':'POST',
     'data' : {'index-edit':$(this).data('ind')},
     'datatype' : 'JSON'
 }).done(function(data){
     jData = $.parseJSON(data);
     var btn = '';
     btn += '<input type="Button" id = "updateBtn" data-pid = "'+index+'" value = "Update">';
     $("#input-field").append(btn);  
     $("#inputVal").val(jData[index]);
     $("#updateBtn").show();
     $("#addBtn").hide();
     displayToDo1(jData);
 });
});
});


$(document).ready(function(){
$(document).on('click','#updateBtn',function(){
 $("#addBtn").show();
 $("#updateBtn").hide();
 $.ajax({
     'url': 'todo.php',
     'method':'POST',
     'data' : {'inputUpdate': $("#inputVal").val(), 'myIndex': $(this).data('pid')},
     'datatype' : 'JSON' 
 }).done(function(data){
     jData = $.parseJSON(data);
     //console.log(d);
     displayToDo1(jData);
 });
});
});


$(document).ready(function(){
$('#incomplete-tasks').on('change', '.check',function(){ 
 console.log(1000);     
     $.ajax({
         'url': 'todo.php',
         'method':'POST',
         'data' : {'check2':$(this).data('check')},
         'datatype' : 'JSON'
     }).done(function(data){
         // d = $.parseJSON(data);
         jData=$.parseJSON(data);
         console.log(jData);
         displayToDo1(jData['incomplete']);
         displayToDo2(jData['complete']);
 }); 

});
});


function displayToDo2(data2){
var list = '';
 for(var i =0;i<data2.length;i++){
     list += '<li>  <input type= "checkbox" checked data-check1  = '+i+' class = "check1" name = "check"> <label>'+data2[i]+'</label> \
     <button class="edit" name = "editComp"> Edit </button>\
     <button data-indexComp = "'+i+'" class="delete" id = "deleteComp" name = "deleteBtn"> Delete </button>\
 </li> <input type = "text" hidden name = "myVal" value = "'+i+'"> ';
 }
$("#completed-tasks").html(list);
}



$(document).ready(function(){
$("#completed-tasks").on('click', '#deleteComp',function(){
  $.ajax({
      'url': 'todo.php',
      'method' : 'POST',
      'data' : {'index-comp' : $(this).data('indexComp')},
      'datatype' : 'JSON'
  }).done(function(data){
      jData = $.parseJSON(data);
      displayToDo2(jData);
  });
});
});
