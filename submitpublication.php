<?php
// Include the database connection
require_once '../connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $pub_date = mysqli_real_escape_string($link, $_POST['pub_date']);
    $total_citation = mysqli_real_escape_string($link, $_POST['total_citation']);
    $research_domain = mysqli_real_escape_string($link, $_POST['research_domain']);

    // Handle file upload
    $fileContent = file_get_contents($_FILES["file"]["tmp_name"]);
    $fileContentEscaped = mysqli_real_escape_string($link, $fileContent);

    // Insert form data and file content into the database
    $query = "INSERT INTO publication (publication_title, publication_authors, publication_date, publication_citation, publication_domain, paper_of_publication) 
          VALUES ('$title', '$author', '$pub_date', '$total_citation', '$research_domain', '$fileContentEscaped')";

    if (mysqli_query($link, $query)) {
        // Success message
        echo "Publication added successfully.";
    } else {
        // Database insert error
        echo "Error: " . mysqli_error($link);
    }
} else {
    // Invalid request method
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($link);
?>


