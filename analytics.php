<?php

include "auth/database.php";
$query = "select bill_id from orders group by bill_id";
$result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="https://kit.fontawesome.com/d455f30832.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>


<body>


<div class="container-fluid px-4 mt-3">
					<div class="d-flex justify-content-between align-content-center align-items-center">
					<div class="bg2" style="width: 320px;">
						<p class="ml-1 font-weight-bold cl text-right" style="font-size:2rem">داواکارییەکان</p>
					</div>

					<button id="back-button" onclick="toDashboard()" class="btn btn-outline-primary "><i class="fa-solid fa-right-to-bracket"></i> گەڕانەوە </button>
					</div>



				</div>

    <main>
    </main>
    <div class="d-none" id="bill_print" style="width:200px;"></div>

    <script>
        function print(divID) {
            //Get the HTML of div
            $.when(
                $.ajax({
                    url: "bill_print.php",
                    method: "POST",
                    data: {
                        table_id: divID
                    },
                    success: function($resul) {

                        $("#bill_print").html($resul);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                })
            ).then(
                function() {
                    var tab = document.getElementById('bill-template');
                    var win = window.open('', '', 'height=800,width=800');
                    win.document.write(tab.outerHTML);
                    win.document.close();
                    win.print();
                }
            )
        }

        $(document).ready(function() {
            $.ajax({
                url: "date.php",
                method: "POST",
                data: {
                    date: "all"
                },
                cache: false,
                success: function($result) {
                    $("main").html($result);
                }
            });
        })

        $(document).on("change", "#date", function() {
            $.ajax({
                url: "date.php",
                method: "POST",
                data: {
                    date: $("#date").val()
                },
                cache: false,
                success: function($result) {
                    $("main").html($result);
                }
            });
        });

        function toDashboard() {
			window.location.href = "dashboard.php";
		}

    </script>
</body>

</html>