<!DOCTYPE html>
<html>
    <head>
        <title>Music Map</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style></style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body style ="background-image: url(images/pulp_fiction.gif)" onload="getMessages()">
        <select id="messages">
            <option>Hello</option>
            <option>World</option>
        </select>
        <form action="admin_work.php" class="center-img" method="post"> 
            <input type="submit" name="delete" value="Delete">
            <input type="submit" name="apply" value="Apply">
        </form>
        <script>
            function getMessages() {
                var selector=document.getElementById("messages");
                $.ajax({
                    type: "POST",
                    url: "admin_work.php",
                    data: {},
                    success: function (result) {
                        if (result !== false)
                        {
                            var messages=JSON.parse(result);
                            selector.options[0]=new Option("Hello");                           
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
