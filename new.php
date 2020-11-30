<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

<?php 

$_idold= $_GET['_id'];
$custold= $_GET['cust'];
$commentold= $_GET['comment'];
$executiveold= $_GET['executive'];

?>


<?php
if ($_SERVER['REQUEST_METHOD'] =='POST')
{   
    $custnew= $_POST['cust1'];
    $executivenew= $_POST['executive1'];
    $commentnew= $_POST['comment1'];

    require 'vendor/autoload.php';

    $client = new MongoDB\Client;

    $tktdb = $client -> tktdb;

    $tktcoll=$tktdb -> tktcoll;

    $updateResult= $tktcoll->updateOne(
     ['cust'=>$custnew],['$set'=>['executive'=>$executivenew,'comment'=>$commentnew]]);

       if($updateResult){
          echo "updated ";
          header('Location: reports.php');
          exit;
        }
       else{
           echo "failed";
        }
    
         
  
    }
?>


<form action="/tryphp/new.php" method = "POST">
    <div  class="form-row">
    <div class="col-md-6 mb-3"  >
      <label for="validationDefault01">Customer ID</label>
      <input  value= <?php echo "$custold" ?> name ="cust1" readonly >
    </div>
    </div>
    

    
    <div class="col-md-5 mb-5" >
      <label for="validationDefault04">Executive</label>
      <select class="custom-select" id="validationDefault04" name="executive1">
        <option selected value=""><?php echo "$executiveold" ?></option>
        <option>Bhargav</option>
        <option>Rehan</option>
        <option>Nandu</option>
        <option>Datta</option>
        <option>Tarun</option>
        <option>Pannalal</option>
      </select>
    </div>

    <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Comments</span>
  </div>
  <textarea class="form-control" aria-label="With textarea" name= "comment1"> <?php echo "$commentold" ?> </textarea>
  </div>
    
  <div>
  <button class="btn btn-primary" style="margin:10px" type="submit">update</button>
  </div>
</form>

</body>
</html>