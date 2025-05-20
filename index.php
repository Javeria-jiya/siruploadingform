<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Job Application</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-header bg-muted text-center">
            <h4 class="mb-0">Apply Now</h4>
          </div>
          <div class="card-body">
            <form action="process.php" method="POST" enctype="multipart/form-data">

              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select" required>
                  <option value="">-- Select Gender --</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>


              <div class="mb-3">
                <label class="form-label">Position</label>
                <select name="position" class="form-select" required>
                  <option value="">-- Select Position --</option>
                  <option value="Frontend Developer">Frontend Developer</option>
                  <option value="Backend Developer">Backend Developer</option>
                  <option value="Full Stack Developer">Full Stack Developer</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Upload CV (PDF only)</label>
                <input type="file" name="cv" class="form-control" accept=".pdf" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Upload Profile Picture (JPG, PNG)</label>
                <input type="file" name="profile_picture" class="form-control" accept=".jpg, .jpeg, .png" required>
              </div>


              <div class="d-grid">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>