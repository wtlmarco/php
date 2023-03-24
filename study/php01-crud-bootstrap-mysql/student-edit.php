<?php 
session_start();
require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Edit</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php include('message.php');?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Aluno
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            if(isset($_GET['id'])){
                                $student_id = mysqli_real_escape_string($con,$_GET['id']);
                                $query = "SELECT * FROM students WHERE id='$student_id'";
                                $query_run = mysqli_query($con,$query);

                                if (mysqli_num_rows($query_run)>0) {
                                    $student = mysqli_fetch_array($query_run);
                                    ?>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="student_id" value="<?= $student['id'];?>">
                                        <div class="mb-3">
                                            <label for="name">Nome</label>
<input type="text" name="name" value="<?= $student['name'];?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email</label>
<input type="text" name="email" value="<?= $student['email'];?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone">Telefone</label>
<input type="text" name="phone" value="<?= $student['phone'];?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="course">Curso</label>
<input type="text" name="course" value="<?= $student['course'];?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="update_student" class="btn btn-primary">Atualizar Aluno</button>
                                        </div>
                                    </form>
                                    <?php
                                }
                                else{
                                    echo "<h4>Nenhum ID encontrado</h4>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>