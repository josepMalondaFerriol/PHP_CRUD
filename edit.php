<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM task WHERE id = '$id'";
        $res = mysqli_query($conn, $query);

        if(mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_array($res);

            $title = $row['title'];
            $description = $row['description'];
        }
    }

    if(isset($_POST['update'])) {

        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
        $res = mysqli_query($conn, $query);

        if($res) {
            $_SESSION['message'] = 'the task updated succfully';
            $_SESSION['message_type'] = 'info';
            header("Location: index.php");
        }

    }

?>

<?php include("includes/headers.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="uptade title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control mt-4" placeholder="update description"><?php echo $description; ?></textarea>
                    </div>
                    <input type="submit" name="update" value="update " class="btn btn-success form-control mt-4" >
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/fooder.php"); ?>