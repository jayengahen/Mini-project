
<?php

include_once 'func.php';
$view = viewEmployee();



$fname ="";
$lname ="";
$mname ="";
$address ="";
$phone ="";
$email ="";
$mess="";


if(isset($_POST["add"]))
{
  
        $fname = trim($_POST["fname"]);
        $lname =trim($_POST["lname"]);
        $mname =trim($_POST["mname"]);
        $address =trim($_POST["address"]);
        $phone =trim($_POST["phone"]);
        $email =trim($_POST["email"]);

        if($fname !="" && $lname !="" && $mname !="" && $address !="" && $email !="" && $phone !="" )
        {

           $check = check_Employee($fname,$lname);
           if($check["fname"] == $fname && $check["lname"] == $lname)
           {

            $mess="Employee Already Exists!!!";

           }
           else
           {
              $addd = add_employee($fname,$lname,$mname,$address,$phone,$email);
              header("location:employee.php");
           }


        }
        else
        {

            $mess="Fill out all the fields!!!";
        }

}



else if(isset($_POST["save"]))
{      
        $id = trim($_POST["id"]);
        $fname = trim($_POST["efname"]);
        $lname =trim($_POST["elname"]);
        $mname =trim($_POST["emname"]);
        $address =trim($_POST["eaddress"]);
        $phone =trim($_POST["ephone"]);
        $email =trim($_POST["eemail"]);

         if($fname !="" && $lname !="" && $mname !="" && $address !="" && $email !="" && $phone !="" && $id !="" )
        {
            
            $updatee= updateEmp($fname,$lname,$mname,$address,$phone,$email,$id);
            header("location:employee.php");
        }
        else
        {
            $mess="Fill out all the fields!!!";
        }

}



else if(isset($_POST["delete"]))
{  
        $id = trim($_POST["id2"]);

        $fname = trim($_POST["efname2"]);
        $lname =trim($_POST["elname2"]);
        $mname =trim($_POST["emname2"]);
        $address =trim($_POST["eaddress2"]);
        $phone =trim($_POST["ephone2"]);
        $email =trim($_POST["eemail2"]);

         if($fname !="" && $lname !="" && $mname !="" && $address !="" && $email !="" && $phone !="" )
        {
            $delete = delete_employee($id);
            header("location:employee.php");
        }
}





?>






























<!DOCTYPE html>

<html>
<head>

  <title>employee_list</title>
    <link href="datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/myjs.js"></script>

    
</head>
<body>




<div class="container-fluid">

               <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0" align="center">Employee's List</h3> 
                            <br> 
                            <center><button type="button" class="btn btn-info" data-toggle="modal" data-target="#add"><i class="icon-people p-r-10"></i> Add Employee </button></center>
                            <hr>

            </div>
                             <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Employee id</th>

                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Middle Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php foreach($view as $wd){ ?>
                                        <tr>
                                            <td><?php echo $wd["emp_id"] ?></td>

                                            <td><?php echo $wd["emp_fname"] ?></td>
                                            <td><?php echo $wd["emp_lname"] ?></td>
                                            <td><?php echo $wd["emp_mname"] ?></td>
                                            <td><?php echo $wd["emp_add"] ?></td>
                                            <td><?php echo $wd["emp_phone"] ?></td>
                                            <td><?php echo $wd["emp_email"] ?></td>
                                             <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit">Edit</button> &nbsp; <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
                                           

                                         
                                          
                                              <script type="text/javascript">
    
                                                 var table = document.getElementById('myTable');
                
                                                for(var i = 0; i < table.rows.length; i++)
                                                           {
                                                                        table.rows[i].onclick = function()
                                                                                      {
                                                                                        //rIndex = this.rowIndex;
                                                                                        document.getElementById("id").value = this.cells[0].innerHTML;

                                                                                        document.getElementById("efname").value = this.cells[1].innerHTML;
                                                                                        document.getElementById("elname").value = this.cells[2].innerHTML;
                                                                                        document.getElementById("emname").value = this.cells[3].innerHTML;
                                                                                        document.getElementById("eaddress").value = this.cells[4].innerHTML;
                                                                                        document.getElementById("ephone").value = this.cells[5].innerHTML;
                                                                                        document.getElementById("eemail").value = this.cells[6].innerHTML;
                                                                                        document.getElementById("id2").value = this.cells[0].innerHTML;




                                                                                        document.getElementById("efname2").value = this.cells[1].innerHTML;
                                                                                        document.getElementById("elname2").value = this.cells[2].innerHTML;
                                                                                        document.getElementById("emname2").value = this.cells[3].innerHTML;
                                                                                        document.getElementById("eaddress2").value = this.cells[4].innerHTML;
                                                                                        document.getElementById("ephone2").value = this.cells[5].innerHTML;
                                                                                        document.getElementById("eemail2").value = this.cells[6].innerHTML;



                                                                                       };
                                                             }
                                             </script>
                                         </td>

                                        </tr>
                                        <?php } ?>
                                        
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


      <!--add-->
      <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <form method="post"> 
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title">Information</h4>
                                        </div>
                                        
                                        <div class="modal-body">
                                     
                                                
                         
                                                  <input type="text"  name="fname" class="form-control" placeholder="First Name" >
                                                    <h3> <input type="text"  class="form-control" name="lname" placeholder="Last Name"></h3>
                                                    <h3> <input type="text"  class="form-control" name="mname" placeholder="Middle  Name"></h3>
                                                    <h3> <input type="text"  class="form-control" name="address" placeholder="Address"></h3>
                                                    <h3> <input type="text"  class="form-control" name="phone" placeholder="Phone"></h3>
                                                    <h3> <input type="email"  class="form-control" name="email" placeholder="email"></h3>

                                          <br>

                                          <div class="form-group">
                                          <?php if($mess != "") { ?>
                                           <span class='alert alert-danger'><?php echo $mess; ?>  </span>
                                            <?php  } ?>
                                                
                                           
                                        </div>
                                       
                                        <div class="modal-footer">
                                             <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success waves-effect waves-light" name="add" >Add</button>
                                         
                                        </div>
                           
                                    </div>
                                </div>
                             </div>
                             </form>   
                        </div>    


<!--edit-->
 <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
 <form method="post">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title">Information</h4>
                                        </div>
                                        
                                        <div class="modal-body">
                                     
                                                
                                                  <input type="text"  name="id" class="form-control" id="id" readonly>                                                    
                                                  <h3>  <input type="text"  name="efname" class="form-control" id="efname"></h3>
                                                    <h3> <input type="text"  class="form-control" name="elname" id="elname"></h3>
                                                    <h3> <input type="text"  class="form-control" name="emname" id="emname"></h3>
                                                    <h3> <input type="text"  class="form-control" name="eaddress" id="eaddress"></h3>
                                                    <h3> <input type="text"  class="form-control" name="ephone"  id="ephone"></h3>
                                                    <h3> <input type="email"  class="form-control" name="eemail" id="eemail"></h3>



                                          
                                                
                                           
                                        </div>
                                       
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success waves-effect waves-light" name="save" >Save</button>

                                        </div>
                                      
                                    </div>
                                </div>
                                </form>
                        </div>    

<!--delete-->
 <div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
 <form method="post">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          <h4 class="modal-title">Information</h4>
                                        </div>
                                       
                                        <div class="modal-body">
                                     
                                                
                                                  <input type="text"  name="id2" class="form-control" id="id2" readonly>                                                    
                         
                                                  <h3><input type="text"  name="efname2" class="form-control" id="efname2" readonly></h3>
                                                    <h3> <input type="text"  class="form-control" name="elname2" id="elname2" readonly></h3>
                                                    <h3> <input type="text"  class="form-control" name="emname2" id="emname2" readonly></h3>
                                                    <h3> <input type="text"  class="form-control" name="eaddress2" id="eaddress2" readonly></h3>
                                                    <h3> <input type="text"  class="form-control" name="ephone2"  id="ephone2" readonly></h3>
                                                    <h3> <input type="email"  class="form-control" name="eemail2" id="eemail2" readonly></h3>



                                          
                                                
                                           
                                        </div>
                                       
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success waves-effect waves-light" name="delete" >Delete</button>

                                        </div>
                                      
                                    </div>
                                </div>
                                </form>
                        </div>    

  

<script src="jquery/jquery.min.js"></script>
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
    <!--Style Switcher -->
   


</body>

</html>