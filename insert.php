<?php
include('db.php');

$obj = new query1();

$fname ='';
$lname ='';
$age ='';
$id = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
   $id = $obj->get_safe_str($_GET['id']);
   $conditionArr= array('id'=>$id);
   $result = $obj->getdata('student','*',$conditionArr);
   //print_r($result);
   $fname = $result['0']['fname'];
   $lname = $result['0']['lname'];
   $age = $result['0']['age'];

}

if (isset($_POST['submit'])) {
   $fname = $obj->get_safe_str($_POST['fname']);
   $lname = $obj->get_safe_str($_POST['lname']);
   $age = $obj->get_safe_str($_POST['age']);

   $conditionArr = array('fname' => $fname, 'lname' =>  $lname, 'age' => $age);
   if($id==''){
   $result = $obj->insertdata('student', $conditionArr);
   }else{
      $result=$obj->updatedata('student',$conditionArr,'id',$id);

   }

   header('location:index.php');
}
?>
<!doctype html>
<html lang="en-US">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Manage User - PHP Object Oriented Programming CRUD</title>
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
         <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
         <div class="card-body">
            <div class="col-sm-6">
               <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
               <form method="post">
                  <div class="form-group">
                     <label>First Name <span class="text-danger">*</span></label>
                     <input type="text" name="fname" id="name" class="form-control" placeholder="Enter First name" value="<?php echo $fname; ?>" required>
                  </div>
                  <div class="form-group">
                     <label>Last Name <span class="text-danger">*</span></label>
                     <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name" value="<?php echo $lname; ?>" required>
                  </div>
                  <div class="form-group">
                     <label>Age <span class="text-danger">*</span></label>
                     <input type="text" class="tel form-control" name="age" id="age" placeholder="Enter age" value="<?php echo $age; ?>" required>
                  </div>
                  <div class="form-group">
                     <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add User</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
</body>

</html>