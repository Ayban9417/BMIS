<?php

    include "manage_skevent.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Event</title>
</head>
<body>

   <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="Blog Title" class="form-control my-3 bg-light text-dark text-center" name="title" required>
            <textarea name="content" class="form-control my-3 bg-light text-dark" cols="30" rows="10" required></textarea>
            <div class="form-group">
            <label for="statuss" class="control-label">Post to:</label>
            <select type="text" name="statuss"  id="statuss" class="form-control form-control-sm rounded-0 col-md-6">
                <option value="Current Sk Events">Current Sk Events</option>
                <option value="Upcoming Sk Events">Upcoming Sk Events</option>
        </select>
</div>
            <input type="file" placeholder="Image" class="form-control my-3 bg-light text-dark text-center" name="image" required>
            <button class="btn btn-dark" name="new_post">Add Post</button>
        </form>
   </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>