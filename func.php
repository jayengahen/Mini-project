<?php

function db(){
	return new PDO("mysql:host=localhost; dbname=employee;", 'root', '');	
}



function viewEmployee()
	{
		

     $db = db();
	$sql = "SELECT * FROM employee_list ";
	$s = $db->query($sql);
	$user = $s->fetchAll();

	$db = null;
	return $user;
}



	
function check_Employee($fname,$lname)
	{
		$db = db();
		$sql = "SELECT * FROM employee_list where emp_fname = ? and emp_lname= ? ";
		$s = $db->prepare($sql);
		$s->execute(array($fname,$lname));
		$user = $s->fetch();
		$db = null;
		return $user;
	}



function add_employee($fname,$lname,$mname,$address,$numbers,$email)
	{
		$db = db();		
		$sql = "INSERT INTO employee_list(emp_fname,emp_lname,emp_mname,emp_add,emp_phone,emp_email) VALUES (?,?,?,?,?,?)";
		$s=$db->prepare($sql);
		$s->execute(array($fname,$lname,$mname,$address,$numbers,$email));
		$user = $s->fetch();
		$db = null;
		return $user;
	}




function updateEmp($a,$b,$c,$d,$e,$f,$g){
		$db=db();
		$sql="UPDATE employee_list SET emp_fname=?,emp_lname=?,emp_mname=?,emp_add=?,emp_phone=?,emp_email=? WHERE emp_id=?";
		$stmt=$db->prepare($sql);
		$stmt->execute(array($a,$b,$c,$d,$e,$f,$g));
		$db-null;
	}




function delete_Employee($id)
	{
	

        $db = db(); 
		$sql = "DELETE FROM employee_list WHERE emp_id = ? ";
		$s = $db->prepare($sql);
		$s->execute(array($id));
		$db = null;

	}






















