<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our student_info table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM student_id_registration ORDER BY id_no LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$student_id_registration = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of student_info, this is so we can determine whether there should be a next and previous button
$num_student_id_registration = $pdo->query('SELECT COUNT(*) FROM student_id_registration')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">

	<a href="create.php" class="create-contact">Enroll New Student</a>
	<table>
        <thead>
            <tr>
                <td>id #</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Guardian</td>
                <td>Course</td>
                <td>Password</td>
                <td>Created</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($student_id_registration as $info): ?>
            <tr>
                <td><?=$info['id_no']?></td>
                <td><?=$info['first_name']?></td>
                <td><?=$info['last_name']?></td>
                <td><?=$info['email']?></td>
                <td><?=$info['phone']?></td>
                <td><?=$info['address']?></td>
                <td><?=$info['guardian']?></td>
                <td><?=$info['course']?></td>
                <td><?=$info['password']?></td>
                <td><?=$info['created']?></td>
				
                <td class="actions">
                    <a href="update.php?id_no=<?=$info['id_no']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id_no=<?=$info['id_no']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_student_id_registration): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>
<style type="text/css">
.form-style-3{
       max-width: 450px;
    
}

h2 {
  position: absolute;
  top: 15%;
  left: 50%;
  transform: translate(-20%,-20%);
  background: #92cbdf;
  padding: 20x 20px;
 font-size: 15px;
   display: flex;
  justify-content: center;

}
h3 {

 font-weight: bold;
       font-size: 20px;
 top: 50%;
       

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


