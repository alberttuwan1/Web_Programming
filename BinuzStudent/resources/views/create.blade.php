<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body class="p-5">
    <h1 class='text-center'>Insert Mahasiswa</h1><br>

    @if ($errors->any())
    <div style="color: red;">
        <strong>Validation errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="/insert_mahasiswa">
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Use Full Name">
        </div>

        <div class="form-group">
            <label for="inputMajor">Major</label>
            <select id="inputMajor" class="form-control" name="major">
                <option selected value="Computer Science and Mathematics">Computer Science and Mathematics</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Data Science">Data Science</option>
                <option value="Visual Communication Design">Visual Communication Design</option>
                <option value="Interior Design">Interior Design</option>
                <option value="Film">Film</option>
            </select>
        </div>

        <div class="form-group">
            <label for="inputDOB">Date of Birth</label>
            <input type="date" class="form-control" id="inputDOB" name="DOB">
        </div>

        <div class="form-group">
            <label for="inputGPA">Grade Point Average (GPA)</label>
            <input type="number" step=0.01 class="form-control" id="inputGPA" name="GPA" placeholder="format:#.##, e.g., 3.99">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Insert Student</button>
    </form>

    <div class='text-center'>
        <a href="/" class="btn btn-primary">Back to Home Page</a>
    </div>
</body>

</html>