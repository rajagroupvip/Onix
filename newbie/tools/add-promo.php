<?php
    require_once('session.php');

    // Mengganti $users dan $author menjadi 'Webmaster'
    $users = 'Webmaster';
    $author = 'Webmaster';

    $title = str_replace(array("’", "'"), "&apos;", $_POST['title']);
    $slugs = preg_replace("/[^a-zA-Z0-9]/", "-", $title);
    $slug = strtolower($slugs);
    $content = str_replace(array("’", "'"), "&apos;", $_POST['content']);
    $persen = $_POST['persen'];
    $min_to = $_POST['min_to'];
    $satuan = $_POST['satuan'];
    $kategori = $_POST['kategori'];
    $postID = $_POST['postID'];
    $date = date('Y-m-d');

    if ($postID == '') {
        // Assuming 'image' is the link to the image
        $imageLink = $_POST['image'];

        $query = mysqli_query($conn, "INSERT INTO `tb_post` (`slug`, `title`, `persen`, `min_to`, `satuan`, `image`, `content`, `author`, `kategori`, `created_date`, `last_update`, `user`, `status`) VALUES ('$slug','$title','$persen','$min_to','$satuan','$imageLink','$content','$author','$kategori','$date','$date','$users', 1)") or die(mysqli_error());

        header('location:../promosi.php?do=add&notif=1');
        exit();
    } else {
        $query = mysqli_query($conn, "UPDATE `tb_post` SET `slug` = '$slug', `title` = '$title', `persen` = '$persen', `min_to` = '$min_to', `satuan` = '$satuan', `image` = '$imageLink', `content` = '$content', `author` = '$author', `kategori` = '$kategori', `last_update` = '$date', `user` = '$users' WHERE cuid = '$postID'") or die(mysqli_error());

        header('location:../promosi.php?do=add&postID=' . $postID . '&notif=1');
        exit();
    }
?>
