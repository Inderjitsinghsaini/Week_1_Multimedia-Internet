<?php
   require_once 'load.php';
    
    if(isset($_GET['id'])){
        $movie_table = 'tbl_movies';
        $id = $_GET['id'];
        $col = 'movies_id';


        $getMovies = getSingleMovie($movie_table, $col, $id);

        //testing code
        //var_dump($getMovies);
      //exit;
    }


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
<?php include 'templates/header.php';?>

<?php while($row = $getMovies->fetch(PDO::FETCH_ASSOC)):?>
<div class="movie_item">
    <img src="images/<?php echo $row['movies_cover'];?>" alt="<?php echo $row['movies_title'];?>"/>
    <h2><?php echo $row['movies_title'];?></h2>
    <h2><?php echo $row['movies_year'];?></h2>

        </div>
<?php endwhile; ?>  
<?php include 'templates/footer.php';?>  
</body>
</html>