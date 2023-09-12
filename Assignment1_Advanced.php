<!DOCTYPE html>
<html lang="en">

<head>
</head>

<style>
    .error {
        color: #FF0000;
        display: inline-block;
    }

    body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form {
        display: flex;
        flex-direction: column;
        justify-content: baseline;
    }

    .output {
        text-align: left;
        border: 2px solid;
        padding: 0.5rem;
        width: 300px;
        margin-top: -15px;
    }
</style>

<body>
    <div>
    </div>
    <?php
    // Define variables and set to empty value
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Processing name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and space allowed";
            }
        }

        // Processing email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // Check if e-mail address is well formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Processing website url
        // if (empty($_POST["website"])) {
        //     $website = "";
        // } else {
        //     $website = test_input($_POST["website"]);
        //     // Check if URL address syntax is valid (this regular expression also allows dashes in the url)
        //     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
        //         $websiteErr = "Invalid URL";
        //     }
        // }

        // Processing website url v2.0
        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
            if (!filter_var($website, FILTER_VALIDATE_URL)) {
                $websiteErr = "Invalid URL";
            }
        }

        // Processing comment
        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        // Processing gender
        if (empty($_POST["gender"])) {
            $genderErr = 'Gender is required';
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div class="txt-heading">
        <h2>PHP Form Validation</h2>
    </div>


    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <span class="error">* required field</span><br><br>
        <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
        <label class="error" for="name">* <?php echo $nameErr; ?></label>

        <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>

        <input type="text" name="website" placeholder="Website Link" value="<?php echo $website; ?>">
        <span class="error"><?php echo $websiteErr; ?></span>

        <textarea name="comment" rows="5" placeholder="Comment here!" cols="40"><?php echo $comment; ?></textarea>


        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "prefer not to say") echo "checked"; ?> value="prefer not to say">Prefer not to say
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Your Input:</h2>
    <div class = "output">
        <?php
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        if (!empty($_POST["website"])) {
            echo "<a href='$website'>$website</a>";
            echo "<br>";
        }
        echo $comment;
        echo "<br>";
        echo $gender;
        ?>
    </div>

</body>

</html>