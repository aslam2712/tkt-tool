<!DOCTYPE html>
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


<table class="table">
  <thead>
    <tr>
      <th scope="col">sno</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Store</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Executive</th>
      <th scope="col">Comment</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>

  <?php
    require 'vendor/autoload.php';

    $client = new MongoDB\Client;
   
    $tktdb = $client -> tktdb;
   
    $tktcoll=$tktdb -> tktcoll;

    $tickets=$tktcoll -> find();
      $sno=0;
    foreach($tickets as $list){
      $sno = $sno+1;
    echo "<tr>
    <th scope='row'>".$sno." </th>
    <td hidden> ".$list['_id']. "</td>
    <td>" .$list['cust']. "</td>
    <td>" .$list['store']. "</td>
    <td>" .$list['city']. "</td>
    <td>" .$list['state']. "</td>
    <td>" .$list['executive']. "</td>
    <td>" .$list['comment']. "</td>
    <td> <a href = 'new.php?_id= $list[_id] & sno= $sno & cust= $list[cust] & comment= $list[comment] & executive= $list[executive]'
    <input type='submit' value ='submit' id = 'editbtn' name ='submit' >edit</td>
    <td> <a href = 'delete.php?custdelete= $list[cust]'
    <input type='submit' value ='submit' id = 'deletebtn' name ='delete'>delete</td>    
  </tr>";
    }
  ?>   
      
  
    </tbody>
    

</table>





  <!-- <script>
  edits= document.getElementsByClassName('edit');
  Array.from(edits).forEach(
    (element)=>
   {element.addEventListener("click", (e)=>{console.log("edit");
   tr = e.target.parentNode.parentNode;
   customerId = tr.getElementsByTagName("td")[0].innerText;
   executive= tr.getElementsByTagName("td")[5].innerText;
   comment= tr.getElementsByTagName("td")[5].innerText;
   console.log(customerId, executive );
   
    })
  })
  
</script>
!>





</body>




</html>