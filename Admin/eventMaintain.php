<?php
    session_start();
    include('../Sys/authCheck.php');
    // validMember();
    // include ('../Sys/connection.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Menu</title>
    <link rel='stylesheet' type='text/css' href='../css/main.css'>
    <link rel='stylesheet' type='text/css' href='../css/menuMember.css'>

    <style>
    .container {
        display: flex;
        flex-wrap: wrap;
    }


    .box {
        width: 35rem;
        height: 20rem;
        background-color: #ccc;
        margin: 15px;
        padding: 10px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        border-radius: 12px;
    }

    .dashboard {
        padding: 50px;
        margin: 0;
        width: 120rem;
        /* width: relative; */
        height: 45rem;
        background-color: #282A2C;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        border-radius: 12px;
        overflow: auto;
        overflow-x: hidden;
        display: grid;
        grid-template-columns: 300px 1fr;
        grid-template-rows: 60px 1fr;
        display: flex;
        flex-wrap: wrap;

    }
    </style>

    <head>

        <header class="heading" style="display:block;">
            <?php include('../lib/navbar.php'); ?>
        </header>

    <body>


        <main>
            <div class="content">

                <div style="display:inline-block;">
                    <h1 style="color:#555555;margin-top:30px;font-weight: 400px;
                    font-size: 30px;text-decoration: none;text-align: center;">Admin Event Maintenance<h1>
                </div>
                <!-- <div class="container"> -->
                <div id="container" class="container">
                    <button id="createEventBtn">create event</button>
                </div>

                <div id="dashboard" class="dashboard">

                </div>

            </div>
        </main>
    </body>
    <!-- <footer> -->
    <footer style="padding-bottom: 2.5rem; position: absolute; bottom: 0; width: 100%; height: 2.5rem;">
        <?php include('../lib/footer.php'); ?>
    </footer>
    <script>
    document.getElementById("createEventBtn").addEventListener("click", function() {
        createEventBox();
    });

    function createEventBox() {
        var dashboard = document.getElementById("dashboard");
        var eventBox = document.createElement("div");
        eventBox.className = "box";

        var eventName = prompt("Enter event name:");
        var eventDetails = prompt("Enter event details:");

        var eventContent = document.createElement("div");
        eventContent.innerHTML = "<h3>" + eventName + "</h3><p>" + eventDetails + "</p>";

        var viewButton = document.createElement("button");
        viewButton.textContent = "View";
        viewButton.addEventListener("click", function() {
            alert("View button clicked for: " + eventName);
            // Add your view event logic here
        });

        eventContent.appendChild(viewButton);
        eventBox.appendChild(eventContent);
        dashboard.appendChild(eventBox);

    }
    </script>

</html>