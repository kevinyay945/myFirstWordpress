<?php
    class Futures
    {
        private $dbConn;

        public function __construct($conn)
        {
            $this->dbConn = $conn;
        }

        public function searchCatNamesIds()
        {
            try
            {
                $sql = "SELECT future_category_id, name FROM FuturesCategory";
                $stmt=$this->dbConn->prepare($sql);

                $stmt->bindParam(":name", $catName);
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll();

                return $result;
            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
        }
/*
        public function searchCatIdByName($catName)
        {
            try
            {
                $sql = "SELECT future_category_id FROM FuturesCategory WHERE FuturesCategory.name=:name";
                $stmt=$this->dbConn->prepare($sql);

                $stmt->bindParam(":name", $catName);
                $stmt->execute();

                $result = current($stmt->fetch());

                if($result)
                {
                    return $result;
                }
                else
                {
                    return;
                }
            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
        }
*/
        public function searchFutureIdsNamesByCatId($catId)
        {
            try
            {
                $sql = "SELECT future_id, name FROM FuturesList WHERE future_category_id = :catId";
                $stmt = $this->dbConn->prepare($sql);

                $stmt->bindParam(":catId", $catId);
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll();
                
                return $result;
            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
        }

        public function searchFutureDataidTimesById($fuId)
        {
            try
            {
                $sql = "SELECT futures_data_id, time FROM FuturesData WHERE future_id = :fuId";
                $stmt = $this->dbConn->prepare($sql);

                $stmt->bindParam(":fuId", $fuId);
                $stmt->execute();
                
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll();

                return $result;
            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
        }

        public function searchFutureDataByDataid($dataId)
        {
            try
            {
                $sql = "SELECT * FROM FuturesData WHERE futures_data_id = :dataId";
                $stmt = $this->dbConn->prepare($sql);

                $stmt->bindParam(":dataId", $dataId);
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll();

                return $result;
            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
        }
/*
        public function searchFutureIdByCatIdFutureName()
        {

        }
        public function searchFutureTimeById()
        {

        }

        public function searchDataByFutureIdTime()
        {

        }

        public function searchFutureIdByCatId($categoryId)
        {
            try
            {
                $sql = "SELECT future_id FROM FuturesList WHERE category = :category";
                $stmt = $this->dbConn->prepare($sql);

                $stmt->bindParam(":category", $categoryId);
                $stmt->execute();

                $result = current($stmt->fetch());

                if($result)
                {
                    return $result;
                }
                else
                {
                    return;
                }
            }
        }
*/
    }
?>