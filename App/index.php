<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>To Do App</title>
</head>

<?php
    $conn = mysqli_connect('localhost', 'root', '', 'to-do-application');

    if (!$conn) {
        echo "Błąd połączenia";
    } else {
        $gmail = 'emilkopytek@gmail.com';
        $password = '1234';

/*         $gmail = $_POST['email'];
        $password = $_POST['password'];
 */
        $find_user = mysqli_query($conn, "SELECT id FROM user WHERE email = '$gmail' AND password = '$password'");
        $result = mysqli_fetch_array($find_user);

        $notes = mysqli_query($conn, "SELECT * FROM note WHERE user_id = $result[id] ORDER BY date");

        class note {
            public $id;
            public $content;
            public $date;
            public $color;
            public $user_id;

            function __construct($a, $b, $c, $d, $e) {
                $this->id = $a;
                $this->content = $b;
                $this->date = $c;
                $this->color = $d;
                $this->user_id = $e;
            }

            function getContent() {
                return $this->content;
            }
        }

        $notesArray = array();
        $notes_number = 0;
    }
?>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
    
    function sendForm() {
        const content = document.getElementById('textAreaContent').value
        let inputDate = document.getElementById('dateCreator').value.split('-')
    
        let date = inputDate[0] + '-' + inputDate[1] + '-' + inputDate[2]
        
        <?php
            echo "let id = $result[id];";
            //INSERT INTO `note`(`id`, `content`, `date`, `color`, `user_id`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
        ?>
        
        var sqlQuery = "INSERT INTO note(`content`, `date`, `color`, `user_id`) VALUES ('" + content + "', '" + `${date}` + "', '#fff' ," + id + ")"

        // Wywołaj zapytanie AJAX
        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: {query: sqlQuery},
            dataType: 'json',
            success: function(response) {},
            error: function(xhr, status, error) {}
        });

        location.reload();
    }

</script>

<body>
    <div class="calendarContainer">
        <div class="namesOfDays">
            <p class="flexBlock">Pn</p>
            <p class="flexBlock">Wt</p>
            <p class="flexBlock">Śr</p>
            <p class="flexBlock">Czw</p>
            <p class="flexBlock">Pt</p>
            <p class="flexBlock">Sb</p>
            <p class="flexBlock">Nd</p>
        </div>
        <div class="calendar"></div>
    </div>
    <div class="notesContainer">
        <div class="stickyNote flexBlock" id="noteCreator">
            <div class="head"></div>
            <div class="body">
                <div class="content">
                    <textarea placeholder="Zacznij pisać tutaj..." id="textAreaContent"></textarea>
                </div>
                <div class="flexBlock bottom">
                    <div class="date">
                        <input type="date" name="datetime" id="dateCreator">
                    </div>
                    <div onclick="sendForm()">
                        <p id="send">Zatwierdź</p>
                    </div>
                </div>
            </div>
        </div>

        <?php
            while($row = $notes -> fetch_assoc()) { 
                $notesArray[$notes_number] = new note($row['id'], $row['content'], date("d.m.Y", strtotime($row['date'])), $row['color'], $row['user_id']);
                echo '
                <div class="stickyNote flexBlock">
                    <div class="head"></div>
                    <div class="body">
                        <div class="content">';
                        echo $notesArray[$notes_number]->content;
                    echo'</div>
                        <div class="flexBlock bottom">
                            <div class="date">';
                            echo $notesArray[$notes_number]->date;
                    echo '</div>
                        </div>
                    </div>
                </div>';
                $notes_number++;
            }
        ?>

    </div>
</body>
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/stickyNotes.js"></script>
<script src="js/calendar.js"></script>
</html>