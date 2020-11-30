<!doctype html>
<html lang="en">


  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Tickting Tool</title>
  </head>



<body>  

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Ticketing Tool</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/tryphp/index.php">Create new <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/tryphp/reports.php">Reports</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More Options
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    
       <!  End of navigation bar -->

<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){


 require 'vendor/autoload.php';

 $client = new MongoDB\Client;

 $tktdb = $client -> tktdb;

 $tktcoll=$tktdb -> tktcoll;

echo "connected to db and collection";
 $cust = $_POST['cust'];
 $store = $_POST['store'];
 $city = $_POST['city'];
 $state = $_POST['state'];
 $executive = $_POST['executive']; 
 $comment = $_POST['comment'];

$insertOneResult = $tktcoll->insertOne(
  ['cust'=> $cust, 'store'=> $store, 'city'=> $city, 'state'=> $state, 'executive' => $executive,
   'comment'=> $comment]
   );
   
}
?>

<div class="container">
<form action="/tryphp/index.php" method = "POST">
  <div  class="form-row">
    <div class="col-md-6 mb-3"  >
      <label for="validationDefault01">Customer ID</label>
      <input type="text" class="form-control" id="validationDefault01" value="NSCIN" name ="cust" >
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationDefault02">Store name</label>
      <input type="text" class="form-control" id="validationDefault02" value="" name = "store">
    </div>
  </div>

  

  <div class="form-row"  >
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">City</label>
      <input type="text" class="form-control" id="validationDefault03" name ="city" >
    </div>
   
    <div class="col-md-6 mb-3">
      <label for="validationDefault05">State</label>
      <input type="text" class="form-control" id="validationDefault05" name = "state">
    </div>
  </div>
  <div class="form-group" >
    
  <div class="col-md-5 mb-5" >
      <label for="validationDefault04">Executive</label>
      <select class="custom-select" id="validationDefault04" name="executive">
        <option selected disabled value="">...</option>
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
  <textarea class="form-control" aria-label="With textarea" name= "comment"></textarea>
</div>
    
  </div>
  <button class="btn btn-primary" style="margin:10px" type="submit">Submit form</button>
</form>
</div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
  </body>
</html>