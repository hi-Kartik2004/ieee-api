<?php

include("config.php");
$conn = mysqli_connect(server, username, password, database);
$response = array();
if ($conn) {
    
    //================ Validating the insert request=========================
    if (isset($_GET["add"])) {
        if (isset($_GET["heading"])) {
            if (isset($_GET["subheading"])) {
                $heading = $_GET["heading"];
                $subheading = $_GET["subheading"];
                $baseInsertQuery = "INSERT INTO `event_posts` (`heading`, `subheading`) VALUES ( '$heading', '$subheading');";

                $runBaseQuery = mysqli_query($conn, $baseInsertQuery);

                if ($runBaseQuery) {
                    $response["inserted"] = array();
                    $response["inserted"][] = "heading";
                    $response["inserted"][] = "subheading";
                    $id = mysqli_insert_id($conn);
                    if (isset($_GET["form-link"])) {
                        $formLink = $_GET["form-link"];
                        $insertQuery = "UPDATE `event_posts` SET `form_link` = '$formLink' WHERE `id` = $id;";
                        $run = mysqli_query($conn, $insertQuery);

                        if ($run) {

                            $response["inserted"][] = "Form-link";
                        }
                    }

                    if (isset($_GET["last-date"])) {
                        $lastDate = $_GET["last-date"];
                        $insertQuery = "UPDATE `event_posts` SET `last_date` = '$lastDate' WHERE `id` = $id;";
                        $run = mysqli_query($conn, $insertQuery);

                        if ($run) {
                            $response["inserted"][] = "last-date";
                        }
                    }
                    if (isset($_GET["img"])) {
                        $fileLink = $_GET["img"];
                        $insertQuery = "UPDATE `event_posts` SET `images` = '$fileLink' WHERE `id` = $id;";
                        $run = mysqli_query($conn, $insertQuery);
                        if ($run) {
                            $response["inserted"][] = "img";
                        } else {
                            $response["inserted"][] = "failed to upload img";
                        }
                    } else {
                        $response["status"] = 0;
                        $response["msg"] = "No file was uploaded or an error occurred.";
                    }

                    $response["status"] = 1;
                    $response["msg"] = "Records Inserted!";
                    $jsonData = json_encode($response);
                    echo $jsonData;
                } else {
                    $response["status"] = 0;
                    $response["msg"] = "Either heading or Subheading Not found";
                    $jsonData = json_encode($response);
                    echo $jsonData;
                }
            } else {
                $response["status"] = 0;
                $response["msg"] = "Subheading Not found";
                $jsonData = json_encode($response);
                echo $jsonData;
            }
        } else {
            $response["status"] = 0;
            $response["msg"] = "Heading Not found";
            $jsonData = json_encode($response);
            echo $jsonData;
        }
    }


    // ======================== Validating the fetch details request ================
    else if (isset($_GET["fetch"])) {
        $value = $_GET["fetch"];
        if ($value == "all") {
            $selectQuery = "SELECT * FROM  `event_posts`;";
            $run = mysqli_query($conn, $selectQuery);
            if ($run) {
                $data = mysqli_fetch_all($run, MYSQLI_ASSOC);
                $response["data"] = $data;
                $run = mysqli_query($conn, $selectQuery);
                $response["status"] = 1;
                $response["msg"] = "All records fetched!";
                $jsonData = json_encode($response);
                echo $jsonData;
            } else {
                $response["status"] = 0;
                $response["msg"] = "unable to fetch all records!";
                $jsonData = json_encode($response);
                echo $jsonData;
            }
        } else {
            $selectQuery = "SELECT * FROM  `event_posts` WHERE `id` = $value;";
            $run = mysqli_query($conn, $selectQuery);

            if ($run) {
                $data = mysqli_fetch_all($run, MYSQLI_ASSOC);
                $response["data"] = $data;
                $response["status"] = 1;
                $response["msg"] = "specific record fetched!";
                $jsonData = json_encode($response);
                echo $jsonData;
            } else {
                $response["status"] = 0;
                $response["msg"] = "Unable to fetch specific record!";
                $jsonDate = json_encode($response);
                echo $jsonData;
            }
        }
    }

    // ================== Updating a column ========================
    else if (isset($_GET["update"])) {
        if (isset($_GET["id"])) {
            $value = $_GET["id"];
            if (isset($_GET["heading"])) {
                $heading = $_GET["heading"];
                $selectQuery = "UPDATE `event_posts` SET `heading` = '$heading' WHERE `id` = $value;";
                $run = mysqli_query($conn, $selectQuery);

                if ($run) {
                    if (mysqli_affected_rows($conn) > 0) {
                        $response["status"] = 1;
                        $response["msg"] = "Record updated successfully";
                    }
                } else {
                    $response["status"] = 0;
                    $response["msg"] = "Unable to modify specific record!";
                }
            }

            if (isset($_GET["subheading"])) {
                $subheading = $_GET["subheading"];
                $selectQuery = "UPDATE `event_posts` SET `subheading` = '$subheading' WHERE `id` = $value;";
                $run = mysqli_query($conn, $selectQuery);

                if ($run) {
                    if (mysqli_affected_rows($conn) > 0) {
                        $response["status"] = 1;
                        $response["msg"] = "Record updated successfully";
                    }
                } else {
                    $response["status"] = 0;
                    $response["msg"] = "Unable to modify specific record!";
                }
            }

            if (isset($_GET["form-link"])) {
                $formLink = $_GET["form-link"];
                $selectQuery = "UPDATE `event_posts` SET `form_link` = '$formLink' WHERE `id` = $value;";
                $run = mysqli_query($conn, $selectQuery);

                if ($run) {
                    if (mysqli_affected_rows($conn) > 0) {
                        $response["status"] = 1;
                        $response["msg"] = "Record updated successfully";
                    }
                } else {
                    $response["status"] = 0;
                    $response["msg"] = "Unable to modify specific record!";
                }
            }

            if (isset($_GET["last-date"])) {
                $lastDate = $_GET["last-date"];
                $selectQuery = "UPDATE `event_posts` SET `last_date` = '$lastDate' WHERE `id` = $value;";
                $run = mysqli_query($conn, $selectQuery);

                if ($run) {
                    if (mysqli_affected_rows($conn) > 0) {
                        $response["status"] = 1;
                        $response["msg"] = "Record updated successfully";
                    }
                } else {
                    $response["status"] = 0;
                    $response["msg"] = "Unable to modify specific record!";
                }
            }

            if (isset($_GET["img"])) {
                $fileLink = $_GET["img"];
                $selectQuery = "UPDATE `event_posts` SET `images` = '$fileLink' WHERE `id` = $value;";
                $run = mysqli_query($conn, $selectQuery);

                if ($run) {
                    if (mysqli_affected_rows($conn) > 0) {
                        $response["status"] = 1;
                        $response["msg"] = "Record updated successfully";
                    }
                } else {
                    $response["status"] = 0;
                    $response["msg"] = "Unable to modify specific record!";
                }
            }
        } else {
            $response["status"] = 0;
            $response["msg"] = "Id not provided for updation!";
        }

        $jsonData = json_encode($response);
        echo $jsonData;
    } 
    // =========== Deleting a record =========
    
    else if (isset($_GET["delete"])) {
        if (isset($_GET["id"])) {
            $value = $_GET["id"];
            $deleteQuery = "DELETE FROM `event_posts` WHERE `event_posts`.`id` = $value;";
            $run = mysqli_query($conn, $deleteQuery);
            if ($run) {
                if (mysqli_affected_rows($conn) > 0) {
                    $response["status"] = 1;
                    $response["msg"] = "Record deleted successfully";
                } else {
                    $response["status"] = 0;
                    $response["msg"] = "Record Not found!";
                }
            } else {
                $response["status"] = 1;
                $response["msg"] = "Unable to delete records!";
            }
        } else {
            $response["status"] = 0;
            $response["msg"] = "Id not provided for updation!";
        }

        $jsonData = json_encode($response);
        echo $jsonData;
    }
} else {
    echo "Failed to connect with the database";
}
