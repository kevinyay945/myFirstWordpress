<?php
error_reporting(0);
    require_once("connect.php");
    require_once("Futures.php");

    $conn = connect();

    if($conn)
    {
        $futures = new Futures($conn);

        $type = $_POST["type"];
        $category = $_POST["category"];
        $name = $_POST["name"];

        $dataId1 = $_POST["dataId1"];
        $dataId2 = $_POST["dataId2"];

        if($type)
        {
            if($type === "Futures")
            {

                if($category)
                {
                    
                    if($name)
                    {
                        $futureTimes = $futures->searchFutureDataidTimesById($name);

                        echo json_encode($futureTimes);
                    }
                    else
                    {
                        $futureIdsNames = $futures->searchFutureIdsNamesByCatId($category);

                        echo json_encode($futureIdsNames);
                    }
                }
                else
                {
                    $catIdsNames = $futures->searchCatNamesIds();

                    echo json_encode($catIdsNames);
                }
            }
        }
        else
        {
            if($dataId1 && $dataId2)
            {
                $data1 = $futures->searchFutureDataByDataid($dataId1);
                $data2 = $futures->searchFutureDataByDataid($dataId2);

                echo json_encode(array($data1[0], $data2[0]));
            }            
        }
    }
    else
    {

    }

?>