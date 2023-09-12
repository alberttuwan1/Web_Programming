<!--  
Albert Gabriel Tuwan    - 2502001353
Erin Kumala Aliwarga    - 2502003775
Glory Daniella          - 2502003895
Jason Adriel            - 2501985451
Shelly Alfianda         - 2501972625
-->

<!DOCTYPE html>
<html lang="en">
<head>
</head>

<style>
    .error {
        color: #FF0000;
    }

    .hidden {
        position: absolute;
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
        gap: 1rem;
    }

    input[type=text] {
        width: 24rem;
    }

    textarea {
        width: 24.1rem;
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

        // Processing website URL v2.0 using filter_var() instead
        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
            if (!filter_var($website, FILTER_VALIDATE_URL)) {
                $websiteErr = "&nbspInvalid URL";
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
        <span class="error">*: required field</span>
        <div>
            <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
            <label class="error hidden" for="name">&nbsp;*
                <?php echo $nameErr; ?>
            </label>
        </div>
        <div>
            <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
            <span class="error hidden">&nbsp;*
                <?php echo $emailErr; ?>
            </span>
        </div>
        <div>
            <input type="text" name="website" placeholder="Website Link" value="<?php echo $website; ?>">
            <span class="error hidden">
                <?php echo $websiteErr; ?>
            </span>
        </div>

        <textarea name="comment" rows="5" placeholder="Comment here!" cols="40"><?php echo $comment; ?></textarea>

        <div>
            Gender
            <span class="error">&nbsp;*
                <?php echo $genderErr; ?>
            </span>
            <div>
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Female")
                    echo "checked"; ?>
                    value="Female">Female<br>
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Male")
                    echo "checked"; ?>
                    value="Male">Male<br>
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "Prefer not to say")
                    echo "checked"; ?> value="Prefer not to say">Prefer not to say
            </div>
            <br>
        </div>

        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Your Input:</h2>
    <div class="output">
        <?php
        if (!empty($_POST["name"]) && !empty($_POST["email"]) && isset($gender) && !empty($gender)) {
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
        }

        ?>
    </div>

</body>

</html>