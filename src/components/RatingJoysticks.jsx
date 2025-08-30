import { BiJoystick } from "react-icons/bi";

function RatingJoysticks(props) {
  // Round the rating to the nearest integer

  // console.log(props.rating);
  const roundedRating = Math.round(props.rating);

  return (
    <div className="flex flex-row space-x-1">
      {[...Array(5)].map((_, index) => (
        <BiJoystick
          key={index}
          color={index < roundedRating ? "#F95142" : "#1F2F49"}
          size={20}
        />
      ))}
    </div>
  );
}

export default RatingJoysticks;
