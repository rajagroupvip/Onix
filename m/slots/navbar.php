<div style="overflow:hidden;width:100%;" class="scroller">
<?php
// Fetch data from the tb_wprovider table
$query = "SELECT * FROM provider where provider_type ='sl' and provider_status =1";
$result = mysqli_query($conn, $query);
// Check if the query was successful
if ($result) {
    echo '<div class="row no-gutters text-center slider-content">';

    // Loop through the rows of the result set
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col">';
        echo '<a class="btn-box" href="/m/slots/game/?provider=' . $row['provider_code'] . '" rel="opener">';
        echo '<img alt="" src="' . $row['image'] . '" data-src="' . $row['image'] . '" height="70" />';
        echo '<div class="text-center fs-md game-title">' . $row['provider_name'] . '</div>';
        echo '</a>';
        echo '</div>';
    }

    echo '</div>';
} else {
    // Handle database query error
    echo 'Error executing query: ' . mysqli_error($conn, $query);
}

?>

</div>