
<?php

require_once '../models/game.php';


class GameController
{
    private $localhost = "localhost";
    private $username = "root";
    private $password = "";
    private $databaseName = "script";

    private $db = new DatabaseCreator($localhost, $username, $password, $databaseName);



    public function index()
    {
        $sql = 'SELECT * FROM games';

        $games = $this->db->query($sql);

        return $this->serialize($games);
    }

    public function show($id)
    {
        $sql = 'SELECT * FROM games WHERE gameId = :id';

        $game = $this->db->find($sql, [':id' => $id]);

        if (!$game) {
            return null;
        }

        return $this->serialize($game);
    }

    public function createGame()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $id=$_POST["id"];
            $title=$_POST["title"];
            $caption=$_POST["caption"];
            $description=$_POST["discription"];
            $price=$_POST["price"];
            $discount=$_POST["discount"];
            $releaseDate=$_POST["releaseDate"];
            $status=$_POST["status"];
            $visibility=$_POST["visibility"];
            $genreId=$_POST["genreId"];
            $developerId=$_POST["developerId"];
        }
        $game = new Game($id,$title, $caption, $description, $price, $discount,$releaseDate,$status,$visibility,$genreId,$developerId);
        $sql = 'INSERT INTO games (gameId, title, caption, description, price, discount, releaseDate, status, visibility, genreId, developerId) VALUES (:gameId, :title, :caption, :description, :price, :discount, :releaseDate, :status, :visibility, :genreId, :developerId)';
        $this->db->query(
        $sql, [
            ':gameId' => $game->getId(),
            ':title' => $game->getTitle(),
            ':caption' => $game->getCaption(),
            ':description' => $game->getDescription(),
            ':price' => $game->getPrice(),
            ':discount' => $game->getDiscount(),
            ':releaseDate' => $game->getReleaseDate(),
            ':status' => $game->getStatus(),
            ':visibility' => $game->getVisibility(),
            ':genreId' => $game->getGenreId(),
            ':developerId' => $game->getUserId(),
            ] );
    }

    private function serialize($game)
    {
        return [
            'id' => $game->gameId,
            'title' => $game->title,
            'caption' => $game->caption,
            'description' => $game->description,
            'price' => $game->price,
            'discount' => $game->discount,
            'releaseDate' => $game->releaseDate,
            'status' => $game->status,
            'visibility' => $game->visibility,
            'genreId' => $game->genreId,
            'developerId' => $game->developerId,
        ];
    }
}


?>
