import RatingJoysticks from "./RatingJoysticks";
import GenreTag from "./GenreTag";
import PlatformIcons from "./PlatformIcons";
import { useNavigate } from "react-router-dom";
import TagCard from "./TagCard";

function GameCardWide(props) {
  const navigate = useNavigate();

  const handleClick = () => {
    navigate(`/game/${props.id}`);
  };
  return (
    <>
      <div className="flex fex-row w-full py-2 space-x-5">
        <div className="flex flex-col space-y-2 min-w-fit">
          <img src={props.bannerImage} className="w-[400px] rounded" />
        </div>
        <div className="flex flex-col grow space-y-2">
          <div className="flex flex-row border-b-2 border-red items-center justify-between">
            <a
              href=""
              onClick={handleClick}
              className="text-blue text-3xl hover:text-red"
            >
              {props.gameTitle}
            </a>
            <RatingJoysticks rating={props.averageRating} />
          </div>
          <div className="flex flex-row items-center justify-between">
            <div className="flex flex-row space-x-5 items-center">
              <GenreTag genreText={props.gameGenre} />
              {/* <PlatformIcons size="24" /> */}
            </div>
            <p className="text-base text-blue">{props.releaseDate}</p>
          </div>
          <div className="flex flex-col h-full justify-between">
            <p className="text-base text-blue font-lato font-bold">
              {props.gameCaption}
            </p>
            {/* <div className="flex flex-row space-x-2">
              <TagCard tagText="Space" />
              <TagCard tagText="Economy" />
              <TagCard tagText="Strategy" />
            </div> */}
          </div>
        </div>
      </div>
    </>
  );
}

export default GameCardWide;
