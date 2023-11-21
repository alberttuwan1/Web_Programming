<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</head>
<body class='px-5'>
    <h1 class='text-center'>Mahasiswa Data</h1>

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">Name</th>
      <th scope="col">DOB</th>
      <th scope="col">Major</th>
      <th scope="col">Faculty</th>
      <th scope="col">GPA</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($mahasiswa_read as $i)
    <tr>
        <th scope="row">{{$i->student_id}}</th>
        <td>{{$i->name}}</td>
        <td>{{$i->DOB}}</td>
        <td>{{$i->major}}</td>
        <td>{{$i->faculty}}</td>
        <td>{{$i->GPA}}</td>
        <td>
            <form action="/delete_mahasiswa" method="post">
                @csrf
                <input type="hidden" name="id" value={{$i->student_id}}>
                <button type='submit' class='btn'>
                    🗑️
                </button>
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class='text-center'>
    {{$mahasiswa_read->links()}}
</div>
</body>
</html>