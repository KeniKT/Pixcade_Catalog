
<?php



class GameController
{
    private $gameClass;
    private $db;

    public function __construct(Game $gameClass, DatabaseCreator $db)
    {
        $this->gameClass = $gameClass;
    }

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
