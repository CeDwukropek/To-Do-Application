<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color-picker.css">
    <title>To Do App</title>
</head>
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
                        <input type="datetime" name="datetime" id="dateCreator">
                    </div>
                    <div class="navigationDot flexBlock" id="1">
                        <img src="images/icons/row-top-light.png" alt="arrow">
                    </div>
                </div>
            </div>
        </div>

        <div class="stickyNote flexBlock">
            <div class="head"></div>
            <div class="body">
                <div class="content">
                    <p>
                        Przykładowy tekst.
                    </p>
                </div>
                <div class="flexBlock bottom">
                    <div class="date">
                        14.01.2023
                    </div>
                    <div class="navigationDot flexBlock" id="2">
                        <img src="images/icons/row-top-light.png" alt="arrow">
                    </div>
                </div>
            </div>
        </div>

        <div class="stickyNote flexBlock">
            <div class="head"></div>
            <div class="body">
                <div class="content" id="colorPicker">
                </div>
                <div class="flexBlock bottom">
                    <div class="date">
                        14.01.2023
                    </div>
                    <div class="navigationDot flexBlock" id="3">
                        <img src="images/icons/row-top-light.png" alt="arrow">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/calendar.js"></script>
<script src="js/stickyNotes.js"></script>
<script src="js/color-picker.js"></script>
</html>
