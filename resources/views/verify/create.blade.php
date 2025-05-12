<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Employee Details Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f3f3f3;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #555;
    }

    input[type="text"],
    input[type="file"],select {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    @media (max-width: 600px) {
      .container {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Upload For Verification</h2>
    <form action="/verify" method="POST" enctype="multipart/form-data">
    @csrf
      <label for="emp_id">Employee ID</label>
      <input type="text" id="emp_id" name="emp_id" required />

      <label for="name">Name</label>
      <input type="text" id="name" name="name" required />
      <label for="name">Email</label>
      <input type="text" id="email" name="email" required />

      <label for="department">Department</label>
      <select id="department" name="department" required>
        <option value=""></option>
        @foreach($departments as $department)
        <option value="{{$department->id}}">{{$department->name}}</option>
        @endforeach
      </select>
    

      <label for="hod_name">HOD Name</label>
      <input type="text" id="hod_name" name="hod_name" required />
      <input type="hidden" name="hod_id" id="hod_id" />

      <label for="dean_name">Dean Name</label>
      <select name="dean_name" id="" required>
        <option value=""></option>
        @foreach($dean as $d)
        <option value="{{$d->id}}">{{$d->name}}</option>
        @endforeach
      </select>
      <!-- <input type="text" id="dean_name" name="dean_name" required /> -->

      <label for="file">Upload File</label>
      <input type="file" id="file" name="file" required />
      <input type="hidden" name="dean_id" id="dean_id" />

      <input type="submit" value="Submit" />
    </form>
  </div>


  <script>
document.getElementById('department').addEventListener('change', function () {
    const departmentId = this.value;

    if (departmentId) {
        fetch(`/get-hod-dean/${departmentId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('hod_name').value = data.hod_name;
                document.getElementById('hod_id').value = data.hod_id || '';
               
            });
    } else {
      document.getElementById('hod_name').value = '';
        document.getElementById('hod_id').value = '';
       
    }
});
</script>

</body>
</html>
