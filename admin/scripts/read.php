<?php
function getAll($tbl){
        $pdo = Database::getInstance()->getConnection();

        $queryAll = 'SELECT * FROM '.$tbl;
        $results = $pdo->query($queryAll);

        if($results){
            return $results;
        }else{
            return 'There is a problem in returning the info';
        }
        };

        function getSingleMovie($tbl, $col, $id){
            $pdo = Database::getInstance()->getConnection();

            $queryAll = 'SELECT * FROM ' . $tbl .' WHERE '.$col.' = '.$id;

            $results = $pdo->query($queryAll);

            if($results){
                return $results;
            }
            else{
                return 'there was a problem in accesing the info';
            }

        }
        function getMoviesByFilter($args){
            $pdo = Database::getInstance()->getConnection();

            $queryAll = 'SELECT * FROM ' . $args['tbl'].'AS t, ';
            $queryAll = ' ' . $args['tbl2'].'AS t2, ';
            $queryAll = ' ' . $args['tbl3'].'AS t3, ';
            $queryAll = 'WHERE t. ' . $args['col'].' = t3.'.$args['col'];
            $queryAll = 'AND t2. ' . $args['col2'].' = t3.'.$args['col'];
            $queryAll = 'AND t3. ' . $args['col3'].' = "'.$args['filter'].'"';
           


            $results = $pdo->query($queryAll);

            if($results){
                return $results;
            }
            else{
                return 'there was a problem in accesing the info';
            }
        }
?>