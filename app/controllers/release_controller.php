<?php
require_once '../models/dbconfig/dbcreator.php';
require_once '../models/release.php';

class ReleaseController
{

    public static function getReleases()
    {
        if (isset($_SESSION['releases'])) {
            $releases = $_SESSION['releases'];
            unset($_SESSION['releases']);
            return $releases;
        } else {
            return null;
        }
    }
    public static function getReleasesByUserId($databaseCreator, $userId)
    {
        $conn = $databaseCreator->getConnection();
        $releases = array();


        $stmt = $conn->prepare("SELECT * FROM release WHERE userId = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $release = new Release(
                    $row['releaseId'],
                    $row['gameId'],
                    $row['userId']
                );


                $releases[] = $release;
            }
        }

        return $releases;
    }
}
?>

