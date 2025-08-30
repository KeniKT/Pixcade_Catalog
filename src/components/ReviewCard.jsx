import RatingJoysticks from "./RatingJoysticks";

function ReviewCard(props) {
  return (
    <>
      <div className="flex flex-col font-electrolize w-full">
        <div className="flex flex-row items-end justify-between border-b-2 border-red py-2">
          <div className="flex flex-row space-x-5">
            {/* <img
              src={props.profileImage}
              className="w-[48px] h-[48px] rounded"
            /> */}
            <div className="flex flex-col min-h-full justify-between">
              {/* <p className="text-blue text-2xl">{props.username}</p> */}
              <p className="text-blue text-sm">{props.reviewDate}</p>
            </div>
          </div>
          <RatingJoysticks rating={props.ratingValue} />
        </div>
        <p className="text-base text-blue font-lato font-bold py-2">
          {props.reviewText}
        </p>
      </div>
    </>
  );
}

export default ReviewCard;
