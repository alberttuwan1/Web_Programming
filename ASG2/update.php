<?php include_once('partials/heading.php') ?>

<?php

function find_isbn($isbn)
{
    global $config, $stmt;
    mysqli_stmt_prepare($stmt, "SELECT * FROM books WHERE isbn = ?");
    mysqli_stmt_bind_param($stmt, "s", $isbn);
    mysqli_stmt_execute($stmt);
    $arr = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    return $arr;
}

?>

<div class="form-container">
    <form action="" , method="GET">
        <input type="text" name="isbn" class=<?= isset($_GET['isbn']) && !empty(find_isbn($_GET['isbn'])) ? "isbn-ok" : "not-ok" ?> placeholder="Search ISBN">
        <input type="submit">
    </form>
</div>

<div class="search-container">
    <div class="isbn-container">
        <?php
        if (isset($_GET['isbn']) && !empty(find_isbn($_GET['isbn']))) {
            $res = find_isbn($_GET['isbn']);
            echo "<pre>";
            echo "<strong>Data Query Result:</strong>";
            echo "<br>";
            foreach ($res as $key => $value) {
                $key = strtoupper($key);
                echo "$key: $value";
                echo "<br>";
            }
            echo "</pre>";
        } else {
            echo 'No data.';
        }
        ?>
    </div>
</div>

<div class="input-container">
    <?php if (isset($res)) : ?>
        <div class="form-container">
            <form class="input-form" method="POST" action="">
                <input type="text" name="title" placeholder="New Title">
                <input type="text" name="author" placeholder="New Author">
                <input type="text" name="publisher" placeholder="New Publisher">
                <input type="text" name="type" placeholder="New Type">
                <input type="number" name="year" placeholder="New Release Year">
                <input type="submit" name="edit">
                <input type="submit" name="delete" value="Delete Data" class="delete-button">
            </form>
        </div>
        <div class = "output-container">
            <?php
            if (isset($_POST['delete'])) {
                mysqli_stmt_prepare($stmt, "DELETE FROM books WHERE isbn = ?");
                mysqli_stmt_bind_param($stmt, "s", $_GET['isbn']);
                mysqli_stmt_execute($stmt);
                echo "Data deleted successfully.";
            }
            ?>
        </div>

    <?php endif; ?>

</div>



<?php include_once('partials/footer.php') ?>