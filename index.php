<?php
    ini_set('display_errors', 1);

    require_once 'config/database.php';
    require_once 'admin/scripts/read.php';
    
   
        $movie_table = 'tbl_movies';
        $getMovies = getAll($movie_table);

        //testing code
        //var_dump($getMovies);
      //exit;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to the movie CMS</title>
</head>
<body>

<?php while($row = $getMovies->fetch(PDO::FETCH_ASSOC)):?>
<div class="movie_item">
    <img src="images/<?php echo $row['movies_cover'];?>" alt="<?php echo $row['movies_title'];?>"/>
    <h2><?php echo $row['movies_title'];?></h2>
    <h2><?php echo $row['movies_year'];?></h2>

        </div>
<?php endwhile; ?>    
</body>
</html>