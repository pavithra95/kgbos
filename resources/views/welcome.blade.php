<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Center Cards with Blurred Background</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
 <style>
    body {
      background: url("Images/college.avif") no-repeat center center / cover;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      overflow-x: hidden;
      position: relative;
    }

    /* Background blur effect */
    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background: inherit;
      filter: blur(5px);
      z-index: -1;
    }

    /* Header */
    .hero-header {
      height: 80px;
      background: white;
      display: flex;
      align-items: center;
      padding: 0 2rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .hero-header img {
      height: 60px;
    }

    /* Main Content */
    .main-content {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      gap: 2rem;
      flex-wrap: wrap;
      min-height: calc(100vh - 80px);
    }

    /* Cards Area */
    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 1.5rem;
      width: 100%;
      max-width: 1000px;
    }

    .card-item {
      background-color: white;
      border-radius: 16px;
      padding: 1.5rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      color: #0d47a1;
      font-weight: bold;
      font-size: 1.1rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 180px;
      text-decoration: none;
      text-align: center;
    }

    .card-item:hover {
  transform: rotateX(0deg) rotateY(0deg) scale(1.05);
  box-shadow: 0 12px 25px #0d47a1;
}


    /* Colored Corner */
    .card-item::before {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      width: 50px;
      height: 50px;
      background: #0d47a1;
      clip-path: polygon(100% 0, 0 0, 100% 100%);
    }

    /* Icon Styling */
    .card-item i {
      font-size: 2.5rem;
      margin-bottom: 10px;
      color: #0d47a1;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .cards-container {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      }
    }
 </style>
</head>

<body>

  <!-- Header -->
  <header class="hero-header d-flex justify-content-between align-items-center">
  <img src="./Images/logo/KGM_KGCAS_HEADER_LOGO.png" alt="Brand Logo">

  <!-- Login Button -->
  <a href="/login" class="btn btn-success">
    Login
  </a>
</header>

  <!-- Main Content -->
  <main class="main-content">

    <!-- Cards Grid -->
    <div class="cards-container">
   <a href="/document" class="card-item">
    <i class="fas fa-home"></i>
    Home
  </a>
  <a href="/curriculum" class="card-item">
    <i class="fas fa-book-open"></i>
    Curriculum
  </a>
  <a href="/theory" class="card-item">
    <i class="fas fa-chalkboard-teacher"></i>
    Theory
  </a>
  <a href="/lab" class="card-item">
    <i class="fas fa-flask"></i>
    Lab
  </a>
  <a href="/internal" class="card-item">
    <i class="fas fa-clipboard-check"></i>
    Assessment
  </a>
  <a href="/merge" class="card-item">
    <i class="fas fa-file-upload"></i>
    Upload PDF
  </a>
  <!-- <a href="/verify/create" class="card-item">
    <i class="fas fa-file-upload"></i>
    Verify
  </a> -->
</div>

    </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
