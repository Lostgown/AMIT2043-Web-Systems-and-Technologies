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


    .box-demo {
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
                    <div class="box-demo">
                        <h2>Cosmic Club</h2>
                        <p>Welcome to cosmic club! everyone that is registered for this club are given with one free
                            telesscope for </p>
                        <button class="deleteBtn">Delete</button>
                    </div>
                    <div class="box-demo">
                        <h2>Cosmic Club</h2>
                        <p>Welcome to cosmic club! everyone that is registered for this club are given with one free
                            telesscope for </p>
                        <button class="deleteBtn">Delete</button>
                    </div>
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

        var deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.className = "delete-btn";
        deleteButton.addEventListener("click", function() {
            if (confirm("Are you sure you want to delete this event?")) {
                dashboard.removeChild(eventBox);
            }
        });

        eventContent.appendChild(deleteButton);
        eventBox.appendChild(eventContent);
        dashboard.appendChild(eventBox);
    }

    function deleteBox(event) {
        // Get the parent div of the delete button
        var box = event.target.closest('.box-demo');

        // Check if the parent div exists
        if (box) {
            // Remove the parent div
            box.remove();
        }
    }

    // Add event listener to delete buttons
    var deleteButtons = document.querySelectorAll('.deleteBtn');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', deleteBox);
    });
    </script>

</html>