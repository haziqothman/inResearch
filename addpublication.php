<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>InResearch</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      .main {
        padding: 20px;
        background-color: #e8f0fe;
        min-height: 100vh;
      }
      .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .container h2 {
        text-align: center;
        margin-bottom: 20px;
      }
      .form-group {
        margin-bottom: 15px;
      }
      .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
      }
      .form-group input,
      .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      .form-group button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        cursor: pointer;
      }
      .form-group button:hover {
        background-color: #0056b3;
      }
    </style>
  </head>
  <body>
    <nav class="sidebar">
      <a href="#" class="logo">InResearch<img src="logo3.png" alt="Logo" width="60"></a>
      <div class="menu-content">
        <ul class="menu-items">
          <li class="item">
            <div class="submenu-item">
              <span>Profile</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                Profile
              </div>
              <li class="item">
                <a href="#">Add profile</a>
              </li>
              <li class="item">
                <a href="#">View profile</a>
              </li>
              <li class="item">
                <a href="#">Profile report</a>
              </li>
            </ul>
          </li>
          <li class="item">
            <div class="submenu-item">
              <span>Expert Domain</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                Expert Domain
              </div>
              <li class="item">
                <a href="#">Add Expert Domain</a>
              </li>
              <li class="item">
                <a href="#">View Expert Domain</a>
              </li>
              <li class="item">
                <a href="#">Expert Domain Report</a>
              </li>
            </ul>
          </li>
          <li class="item">
            <div class="submenu-item">
              <span>Publication</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                Publication
              </div>
              <li class="item">
                <a href="addpublication.php">Add Publication</a>
              </li>
              <li class="item">
                <a href="#">View Publication</a>
              </li>
              <li class="item">
                <a href="#">Publication Report</a>
              </li>
            </ul>
          </li>
          <li class="item">
            <div class="submenu-item">
              <span>Platinum Progress</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>
            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                Platinum Progress
              </div>
              <li class="item">
                <a href="#">Add Expert Domain</a>
              </li>
              <li class="item">
                <a href="#">View Expert Domain</a>
              </li>
              <li class="item">
                <a href="#">Expert Domain Report</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <nav class="navbar">
      <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>
    <main class="main">
      <div class="container">
        <h2>Add a New Publication</h2>
        <form action="submitpublication.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
          </div>
          <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
          </div>
          <div class="form-group">
            <label for="pub_date">Publication Date:</label>
            <input type="date" id="pub_date" name="pub_date" required>
          </div>
          <div class="form-group">
             <label for="citation">Total Citations:</label>
            <input type="text" id="total_citations" name="total_citation" required>
          </div>
		  <div class="form-group">
             <label for="research">Research Domain</label>
            <input type="text" id="research_domain" name="research_domain" required>
          </div>
		  <div class="form-group">
            <label for="file">Upload File:</label>
            <input type="file" id="file" name="file" accept=".pdf,.doc,.docx" required>
            <small>Accepted formats: PDF, DOC, DOCX</small>
          </div>
          <div class="form-group">
            <button type="submit">Submit</button>
          </div>
        </form>
      </div>
    </main>
    <script src="script.js"></script>
  </body>
</html>
