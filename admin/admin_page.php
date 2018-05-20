<!DOCTYPE html>
<html>
    <head>
        <title>Music Map</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style></style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body style ="background-image: url(../images/pulp_fiction.gif)">
        <select name="messages" id="messages">
        </select>
        <input type="submit" name="delete" value="Delete" onclick="deleteMessage()">
        <input type="submit" name="apply" value="Apply" onclick="addMessage()">
        <input type="submit" name="get" value="Get" onclick="getMessages()">
        <script>
            function deleteMessage() {
                var selector = document.getElementById("messages");
                var index=selector.selectedIndex;
                var result=selector.options[index].text.split(",");
                $.ajax({
                    type: "POST",
                    url: "remove.php",
                    data: {index:result[0]},
                    success: function(){
                        selector.remove(index);
                    }
                });
            }

            function addMessage() {
                var selector = document.getElementById("messages");
                var index=selector.selectedIndex;
                var result=selector.options[index].text.split(",");
                $.ajax({
                    type: "POST",
                    url: "add.php",
                    data: {id:result[0]},
                    success:function(){
                        deleteMessage();
                    }
                });
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
                                selector.options[i] = new Option(messages[i]);
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
