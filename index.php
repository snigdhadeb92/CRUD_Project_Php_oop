<?php
include('db.php');

$obj = new query1();
if (isset($_GET['type']) && $_GET['type'] == 'delete') {
   $id = $obj->get_safe_str($_GET['id']);
   $conditionArr = array('id' => $id);
   $result = $obj->deletedata('student', $conditionArr);
}
//$conditionArr= array('fname'=>'ronit','lname'=>'das','age'=>'26');
$result = $obj->getdata('student');
//print_r($result);
?>
<!doctype html>
<html lang="en-US">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>User Listing - PHP Object Oriented Programming CRUD</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   <style>
      .container {
         margin-top: 100px;
      }
   </style>
</head>

<body>
   <div class="container">
      <div class="card">
         <div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse User</strong> <a href="insert.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a></div>
      </div>
      <hr>
      <div>
         <table class="table table-striped table-bordered">
            <thead>
               <tr class="bg-primary text-white">
                  <th>Sr#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Age</th>
                  <!-- <th class="text-center">Added On</th> -->
                  <th class="text-center">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               if (isset($result['0'])) {
                  $i = 1;
                  foreach ($result as $list) {
               ?>
                     <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $list['fname']; ?></td>
                        <td><?php echo $list['lname']; ?></td>
                        <td><?php echo $list['age']; ?></td>
                        <!-- <td align="center">30st March 2020</td> -->
                        <td align="center">
                           <a href="insert.php?type=edit&id=<?php echo $list['id']; ?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
                           <a href="?type=delete&id=<?php echo $list['id']; ?>" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
                        </td>
                     </tr>
                  <?php $i++;
                  }
               } else { ?>
                  <tr>
                     <td colspan="6" align="center">No Records Found!</td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
      <!--/.col-sm-12-->
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
</body>

</html>