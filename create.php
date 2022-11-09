<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id_no= isset($_POST['id_no']) && !empty($_POST['id_no']) && $_POST['id_no'] != 'auto' ? $_POST['id_no'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $guardian = isset($_POST['guardian']) ? $_POST['guardian'] : '';
    $course = isset($_POST['course']) ? $_POST['course'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    // Insert new record into the student_info table
    $stmt = $pdo->prepare('INSERT INTO student_id_registration VALUES (?, ?, ?, ?, ?, ? , ?, ?, ?, ?)');
    $stmt->execute([$id_no, $first_name, $last_name, $email, $phone, $address, $guardian, $course,$password, $created]);
    // Output message
    $msg = 'Created Successfully!';
}
?>
<?=template_header('Create')?>

<div class="content update">
	<h2>Register New Student</h2>
    <form action="create.php" method="post">
	<table>

	<form>
<h2>Student ID Registration System</h2>
<fieldset>
  <label for="id_no">UC ID:</label>
<input type="ptext"
       border = none;
    id="id_no" 
    name="id_no" 
    onkeypress="return isNumberKey(event)" 
    maxlength="11"
    placeholder="00-0000-000" />
    <br>
    <br>
 <label for="first_name">First Name:</label>
<input type="text"
       border = none;
    id="first_name" 
    name="first_name" 
    placeholder="" />
    <br>
<br>
 <label for="last_name">Last Name:</label>
<input type="text"
       border = none;
    id="last_name" 
    name="last_name" 
    placeholder="" />
    <br>
<br>
 <label for="email">E-mail:</label>
<input type="text"
       border = none;
    id="email" 
    name="email" 
    placeholder="" />
    <br>
<br>
 <label for="phone">Phone Number:</label>
<input type="text"
       border = none;
    id="phone" 
    name="phone" 
    placeholder="" />
    <br>
<br>
<br>
 <label for="address">Address:</label>
<input type="text"
       border = none;
    id="address" 
    name="address" 
    placeholder="" />
    <br>
<br>
<br>
 <label for="guardian">Guardian Name:</label>
<input type="text"
       border = none;
    id="guardian" 
    name="guardian" 
    placeholder="" />
    <br>
<br>
 <label for="password">Password:</label>
<input type="password"
       border = none;
    id="password" 
    name="password" 
    placeholder="" />
    <br>
<br>
  <label for="course">Course Department</label>
      <select name="course" id="course">
        <option value="COL">College of Law</option>
        <option value="CON">College of Nursing</option>
        <option value="COA">College of Accountancy</option>
        <option value="CITCS">College of Information Technology and Computer Science</option>
        <option value="CAS">College of Arts and Sciences</option>
        <option value="CHTM">College of Hospitality and Tourism Managementt</option>
        <option value="COC">College of Criminology</option>
        <option value="CEA">College of Engineering and architecture</option>
        <option value="CTE">College of Teacher Education</option>
<br>
<br>

      </select>

<br>
<br>

 <label for="created">Date Registered</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="submit" value="Register">

<table>
    </form>

    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>

<style type="text/css">
.form-style-3{
       max-width: 450px;
    
}

h2 {
  position: absolute;
  top: 10%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #92cbdf;
  padding: 50x 50px;
 font-size: 45px;
   display: flex;
  justify-content: center;

}
h3 {

 font-weight: bold;
       font-size: 20px;

       

}
body{
background: #93CDE8


}



fieldset {
  position: absolute;
  top: 50%;
  left: 50%;
  justify-content: center;
  transform: translate(-50%,-50%);
  background: #92cbdf;
  padding: 10px 20px;

}
.form-style-3 label{
       display:block;
       margin-bottom: 10px;
      
    
}
.form-style-3 label > span{
       float: left;
       width: 100px;
       color: #000000;
       font-weight: bold;
       font-size: 13px;
       text-shadow: 1px 1px 1px #fff;
    
    
}
.form-style-3 fieldset{
       border-radius: 10px;
       -webkit-border-radius: 10px;
       -moz-border-radius: 10px;
       margin: 0px 0px 10px 0px;
       border: 1px solid #afe4fc;
       padding: 20px;
       background: #afe4fc;
       box-shadow: inset 0px 0px 15px #afe4fc;
       -moz-box-shadow: inset 0px 0px 15px #afe4fc;
       -webkit-box-shadow: inset 0px 0px 15px #afe4fc;
}
}
.form-style-3 textarea{
       width:250px;
       height:100px;
    border-radius: 34px 34px 34px 34px;
}

.form-style-3 textarea{
       border-radius: 3px;
       radius: 3px;
       border-radius: 3px;
       border: 1px solid #145369;
       outline: none;
       color: #afe4fc;
       padding: 5px 8px 5px 8px;
       box-shadow: inset 1px 1px 4px #afe4fc;
       box-shadow: inset 1px 1px 4px #145369;
       box-shadow: inset 1px 1px 4px #145369;
       background: #FFEFF6;
       width:50%;
}
.form-style-3  input[type=submit],
.form-style-3  input[type=button]{
    
       background: #145369;
       border: 1px solid #145369;
       padding: 5px 15px 5px 15px;
       color: #FFFFFF;
       box-shadow: inset -1px -1px 3px #145369;
       -moz-box-shadow: inset -1px -1px 3px #145369;
       -webkit-box-shadow: inset -1px -1px 3px #145369;
       border-radius: 3px;
       border-radius: 3px;
       -webkit-border-radius: 3px;
       -moz-border-radius: 3px;    
       font-weight: bold;

}
.required{
       color:red;
       font-weight:normal;
}
</style>
</style>


