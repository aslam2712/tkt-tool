<?php 

$custold= $_GET['custdelete'];

if ($_SERVER['REQUEST_METHOD'] =='POST')
{
    $custnew= $_POST['cust1'];
    require 'vendor/autoload.php';

    $client = new MongoDB\Client;

    $tktdb = $client -> tktdb;

    $tktcoll=$tktdb -> tktcoll;

    $deleteResult= $tktcoll->deleteOne(['cust'=>$custnew]);

    if($deleteResult){
        echo "deleted";
        header('Location: reports.php');
        exit;
      }
     else{
         echo "failed";
      }
      exit();
}    
?>


<form action="/tryphp/delete.php" method = "POST">
    <div class="col-md-6 mb-3">
      <label for="validationDefault01"></label>
      <input name ="cust1" value= <?php echo "$custold" ?> >
    </div>
    <div>
     <button class="btn btn-primary" style="margin:10px" type="submit">Delete</button>
    </div>
</form>