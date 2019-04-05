<!-- 구글 검색 : galley board css => CSS Only Pinterest-like Responsive Board Layout - Boardz.css | CSS ... -->
<!-- 출처 : https://www.cssscript.com/css-pinterest-like-responsive-board-layout-boardz-css/ -->

<!doctype html>
<?php
$connect = mysql_connect("localhost","kdk","1111");
$db_con = mysql_select_db("kdk_db", $connect);

$sql = "select * from boardz;";
$result = mysql_query($sql);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Boardz Demo</title>
    <meta name="description" content="Create Pinterest-like boards with pure CSS, in less than 1kB.">
    <meta name="author" content="Burak Karakan">
    <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
    <link rel="stylesheet" href="src/boardz.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wingcss/0.1.8/wing.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<div class="seventyfive-percent  centered-block">
    <!-- Sample code block -->
    <div>
        <hr class="seperator">

        <!-- Example header and explanation -->
        <div class="text-center">
            <h2>Beautiful <strong>Boardz</strong></h2>
            <div style="display: block; width: 50%; margin-right: auto; margin-left: auto; position: relative;">
                <form class="example" method="post" action="board.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <!--            $data = mysql_result($result, $i, $j)  -->
        <!--<hr class="seperator fifty-percent">-->
        <!-- Example Boardz element. -->
        <?php
        $sql = "select * from boardz where title like '%$_POST[search]%' ";
        $researchResult = mysql_query($sql,$connect);
        $records = mysql_num_rows($researchResult);
        $recordsNormal = mysql_num_rows($result);
        $isSearch = false;
        ?>
        <div class="boardz centered-block beautiful">
            <?php
           // $row = mysql_fetch_array($result);//전체
            //$researchRow = mysql_fetch_array($researchResult);
            $count = 0;

            //검색모드
            if($_POST[search]) {
               // echo "검색모드";
            if($records < 4) {
                $numOf_ul = $records;
            }
            else {
                $numOf_ul = 3; //이중 반복문
            }
            while($numOf_ul){
                echo "<ul>";
                while($researchRow = mysql_fetch_array($researchResult)){
                    echo "
                       <li>
                        <h1>$researchRow[title]</h1>
                        $researchRow[contents]  
                        <img src='$researchRow[image_url]' alt='demo image'/>
                       </li>
                    ";
                    if(++$count == 1) {
                        $count = 0;
                        break;
                    }
                }
                echo "</ul>";
                $numOf_ul--;
            }
            }
            else {//검색값이 없을때(기본 출력)
                if($recordsNormal < 4) {
                    $numOf_ul = $recordsNormal;
                }
                else {
                    $numOf_ul = 3; //이중 반복문
                }
                while($numOf_ul){
                    echo "<ul>";
                    while($row = mysql_fetch_array($result)){
                        echo "
                       <li>
                        <h1>$row[title]</h1>
                        $row[contents]  
                        <img src='$row[image_url]' alt='demo image'/>
                       </li>
                    ";
                        if($numOf_ul == 2){//두번째 ul에서는 li가 3개
                            if (++$count == 3) {
                                $count = 0;
                                break;
                            }
                        }
                        else {
                            if (++$count == 2) {
                                $count = 0;
                                break;
                            }
                        }
                    }
                    echo "</ul>";
                    $numOf_ul--;
                }

            }
            mysql_close();
            ?>


        </div>
    </div>

    <hr class="seperator">

</div>
</body>
</html>