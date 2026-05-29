<?php
    require_once('session.php');
// Check if 'cuid' parameter is set in the URL
if (isset($_GET['cuid'])) {
    // Get the cuid parameter from the URL
    $cuid = $_GET['cuid'];

    // Perform the delete operation
    $deleteQuery = mysqli_query($conn, "DELETE FROM `tb_user` WHERE cuid = '$cuid'");

    if ($deleteQuery) {
        // Successful deletion
        header("Location: /newbie/member.php"); // Redirect to the page where your table is displayed
        exit();
    } else {
        // Error in deletion
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    // If 'cuid' parameter is not set, redirect to the index page
    header("Location: index.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>