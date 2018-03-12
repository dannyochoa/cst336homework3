<?php
    session_start();
    if(!isset($_SESSION[toDo])){
        $_SESSION[toDo] = array();
    }
    include './inc/function.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url("./css/styles.css");
        </style>
    </head>
    
    <header>
        <h1>To do list</h1>
    </header>
    
    <body>

        <div id = "formcenter">
            <h2>Add an item to the list</h2>
            <form method = "post">
                <input type="text" name="activity" placeholder = "Activity" value = "<?=$_POST['activity']?>" />
                </br>
                <h2>Extra information</h2>
                <input type="text" name="info" placeholder = "Additional information" value = "<?=$_POST['info']?>" />
                
                </br></br>
                <input type="radio" name="urgent" value="today">
                <label class = "box" for="today">Urgent</label>
                <input type="radio" name="urgent" value="tomorrow">
                <label class = "box" for="tomorrow">Save For Tomorrow</label></br></br>
                
                
                <input type="checkbox" name="started" value="yes">
                <label class = "box" for="yes">Started</label>
                <input type="checkbox" name="started" value="no">
                <label class = "box" for="no">Have not Started</label></br></br>
                 
                <select  name="category">
                  <option value = "">Select One</option>
                  <option value="School">School</option>
                  <option value="Family">Family</option>
                  <option value="Girlfriend">Girlfriend</option>
                </select>
                </br></br>
                <input id="turnin" type="submit" value="Submit"/>
            </div>
            <div id = "toDotable">
            <table>
                <tr>
                    <th>Message</th>
                    <th>Info</th> 
                    <th>Started</th>
                    <th>Category</th>
                    <th>Urgent</th>
                    <th>Done</th>
                </tr>

            <?php
                $item = array(
                'message'=> "",
                'info' => "",
                'category' => "",
                'started' => "",
                'urgent' => "",
                );
                $delet = false;
                
                if(isset($_POST['done']))
                {
                    unset($_SESSION[toDo][$_POST['done']]);
                    $delet = true;
                }
                if(isset($_POST['activity']) && $_POST['activity'] != ""){
                    $item['message'] = $_POST['activity'];
                }
                else{
                    echo "<h2>You must enter an activity</h2>";
                }
                
                if(isset($_POST['info'])&& $_POST['info'] != ""){
                   $item['info'] = $_POST['info'];
                }
                else{
                    echo "<h2>Enter additional information</h2>";
                }
                
                if(isset($_POST['urgent'])){
                    $item['urgent'] = $_POST['urgent'];
                }
                
                if(isset($_POST['started'])){
                    $item['started'] = $_POST['started'];
                }
                
                if(isset($_POST['category'])&& $_POST['category'] != "" ){
                    $item['category'] = $_POST['category'];
                }
                if($item['message'] != "" && $item['info'] != "" && $delet == false)
                {
                    $_SESSION[toDo][]  =$item ;
                }
                $count = 0;
                foreach($_SESSION[toDo] as $i){
                    addItem($i['message'], $i['info'], $i['started'], 
                            $i['category'], $i['urgent'], $count);
                    $count++;
                }
                if(isset($_POST['clear'])){
                    session_destroy();
                }
                // print_r($_SESSION[toDo]);
            ?>
            </table>
            </form>
        </div>
    </body>
    
    <footer>
        <div id = "clearList">
            <h3>Clear to do list </h3>
            <form method = "post">
                 <input id="turnin2" type="submit" value="clear" name = "clear"/>
            </form>
        </div>
    </footer>
</html>
