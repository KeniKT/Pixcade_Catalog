<?php
require_once '../models/dbconfig/dbcreator.php';
require_once '../models/wishlist.php';

class WishlistController
{

    public static function getWishlist()
    {
        if (isset($_SESSION['wishlist'])) {
            $wishlist = $_SESSION['wishlist'];
            unset($_SESSION['wishlist']);
            return $wishlist;
        } else {
            return null;
        }
    }
    public static function getWishlistByUserId($databaseCreator, $userId)
    {
        $conn = $databaseCreator->getConnection();
        $wishlist = array();


        $stmt = $conn->prepare("SELECT * FROM wishlist WHERE userId = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $wishlistItem = new Wishlist(
                    $row['wishlistId'],
                    $row['userId']
                );


                $items = WishlistController::getWishlistItemsByWishlistId($databaseCreator, $wishlistItem->getId());


                $wishlistItem->setWishlistItems($items);


                $wishlist[] = $wishlistItem;
            }
        }

        return $wishlist;
    }

    public static function getWishlistItemsByWishlistId($databaseCreator, $wishlistId)
    {
        $conn = $databaseCreator->getConnection();
        $items = array();


        $stmt = $conn->prepare("SELECT * FROM wishlist_items WHERE wishlistId = ?");
        $stmt->bind_param("i", $wishlistId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $wishlistItem = new WishlistItem(
                    $row['wishlistId'],
                    $row['gameId']
                );
                $wishlistItem->setId($row['wishlistItemId']);


                $items[] = $wishlistItem;
            }
        }

        return $items;
    }
}
?>

