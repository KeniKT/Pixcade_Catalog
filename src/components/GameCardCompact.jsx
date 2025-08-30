import RatingJoysticks from "./RatingJoysticks";
import GenreTag from "./GenreTag";
import { useNavigate } from "react-router-dom";

function GameCardCompact(props) {
  const navigate = useNavigate();

  const handleClick = () => {
    navigate(`/game/${props.id}`);
  };
  return (
    <>
      <div className="group flex flex-col">
        <div className="relative">
          <img className="rounded" src={props.bannerImage} />
          <div className="absolute rounded inset-0 bg-gradient-to-t from-blue to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          <div className="absolute rounded bottom-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <GenreTag genreText={props.gameGenre} />
          </div>
        </div>
        <div className="border-b-2 border-red pt-2"></div>
        <div className="flex flex-row items-center justify-between w-full h-full py-2 px-3 space-x-5">
          <a
            href=""
            onClick={handleClick}
            className="text-blue text-base truncate text-ellipsis hover:text-red"
          >
            {props.gameTitle}
          </a>
          <RatingJoysticks rating={props.averageRating} />
        </div>
      </div>
    </>
  );
}

export default GameCardCompact;
