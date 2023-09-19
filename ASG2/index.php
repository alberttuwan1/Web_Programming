<?php include_once('partials/heading.php') ?>

<div class="search-bar">
    <form action="" method="GET">
        <input type="text" placeholder="Search a book title" name="title">
        <button type="submit">Search</button>
    </form>
</div>
<div class="table-container">
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Type</th>
            <th>Release Year</th>
            <th>ISBN</th>
        </tr>
        <?php
        $sql = 'SELECT * FROM books';
        $result = mysqli_query($config, $sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            if (!isset($_GET['title']) || stripos($row['title'], $_GET['title']) !== false) {
                echo '<tr>';
                foreach ($row as $attrib) {
                    echo "<td>$attrib</td>";
                }
                echo '</tr>';
            }
            if ($i > 15) {
                break;
            }
            ++$i;
        }
        ?>
    </table>
    <br>
    <p><em>The view above contains only the first 15 books.</em></p>
</div>


<?php include_once('partials/footer.php') ?>