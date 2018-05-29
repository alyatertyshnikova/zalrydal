<!DOCTYPE html>
<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('Location: index.php');
    exit;
}
?>
<html>
    <head>
        <title>Music Map</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body style ="background-image: url(../images/pulp_fiction.gif)" onload="getMessages()">
        <select name="messages" id="messages">
        </select>
        <input type="submit" name="delete" value="Delete" onclick="deleteMessage()">
        <input type="submit" name="apply" value="Apply" onclick="addMessage()">
        <input type="submit" id="listen" value="Play" onclick="listen()">
        <script>
            var audio;
            function listen() {
                if (document.getElementById("listen").value == "Stop") {
                    audio.controls = false;
                    audio.pause();
                    document.getElementById("listen").value = "Play";
                } else {
                    var selector = document.getElementById("messages");
                    var index = selector.selectedIndex;
                    var result = parseOption(selector.options[index]);
                    $.ajax({
                        type: "POST",
                        url: "listen.php",
                        data: {data: result},
                        success: function (path) {
                            audio = new Audio(path);
                            audio.controls = true;
                            document.body.appendChild(audio);
                            audio.play();
                            document.getElementById("listen").value = "Stop";
                        }
                    });
                }
            }

            function deleteMessage() {
                var selector = document.getElementById("messages");
                var index = selector.selectedIndex;
                var result = parseOption(selector.options[index]);
                $.ajax({
                    type: "POST",
                    url: "remove.php",
                    data: {data: result},
                    success: function () {
                        selector.remove(index);
                    }
                });
            }

            function addMessage() {
                var selector = document.getElementById("messages");
                var index = selector.selectedIndex;
                var result = parseOption(selector.options[index]);
                $.ajax({
                    type: "POST",
                    url: "add.php",
                    data: {data: result},
                    success: function () {
                        selector.remove(index);
                    }
                });
            }

            function parseOption(arg) {
                var data = [];
                var year = arg.text.split(",");
                data[0] = year[1];
                var country = year[2].split(":");
                data[1] = country[0];
                var song = country[1].split(" - ");
                data[2] = song[0];
                var author = song[1].split(" by ");
                data[3] = author[0];
                data[4] = year[0];
                return data;
            }

            function getMessages() {
                var selector = document.getElementById("messages");
                $.ajax({
                    type: "POST",
                    url: "get_messages.php",
                    data: {},
                    success: function (result) {
                        if (result !== false)
                        {
                            var messages = JSON.parse(result);
                            selector.size = messages.length;
                            for (var i = 0; i < messages.length; i++) {
                                selector.options[i] = new Option(
                                        messages[i][7] + "," +
                                        messages[i][4] + "," + messages[i][3] + ":" +
                                        messages[i][1] + " - " + messages[i][2] +
                                        " by " + messages[i][5]);
                            }
                        } else
                        {
                            alert("No messages");
                        }
                    }
                });

            }
        </script>
    </body>
</html>
