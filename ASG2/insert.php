<?php include_once('partials/heading.php') ?>

<div class="form-container">
    <form class="input-form" method="POST" action="">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="author" placeholder="Author">
        <input type="text" name="publisher" placeholder="Publisher">
        <input type="text" name="type" placeholder="Type">
        <input type="number" name="year" placeholder="Release Year">
        <input type="text" name="isbn" placeholder="ISBN">
        <input type="submit" name="submit">
    </form>
</div>

<div class="output-container">
    <?php
    if (
        !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['publisher']) && !empty($_POST['type'])
        && !empty($_POST['year']) && !empty($_POST['isbn'])
    ) {
        mysqli_stmt_prepare($stmt, "INSERT INTO books (title, author, publisher, type, release_year, isbn) VALUES (?, ?, ?, ?, ?, ?)");
        $parse_year = strval($_POST['year']);
        mysqli_stmt_bind_param($stmt, "ssssss", $_POST['title'], $_POST['author'], $_POST['publisher'], $_POST['type'], $parse_year, $_POST['isbn']);
        mysqli_stmt_execute($stmt);
        if (mysqli_errno($config)) {
            echo "Your input is invalid: " . mysqli_error($config);
        } else {
            echo "Successfully inputted your data!";
        }
    } else if (isset($_POST['submit'])) {
        echo "Invalid data! Please complete the book data properly.";
    }
    ?>
</div>


<?php include_once('partials/footer.php') ?>