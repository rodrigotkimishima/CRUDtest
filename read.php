<?php include "header.php"?>

<h2>CRUD - Listar Alunos</h2>

<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'crud');
$results = mysqli_query($db, "SELECT * FROM aluno"); ?>

<table>
	<thead>
		<tr>
			<th>Nome</th>
			<th>CEP</th>
            <th>Idade</th>
			<th colspan="5"></th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['nome']; ?></td>
			<td><?php echo $row['cep']; ?></td>
            <td><?php echo $row['idade']; ?></td>
			<td>
				<a href="edit.php?id=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="delete.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form>
<?php include "footer.php" ?>