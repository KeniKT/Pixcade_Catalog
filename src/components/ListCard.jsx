import { BsEyeFill } from "react-icons/bs";
import { BsEyeSlashFill } from "react-icons/bs";

function ListCard(props) {
  return (
    <>
      <div className="flex flex-col font-electrolize space-y-2">
        <div className="flex flex-row border-b-2 border-red items-end justify-between py-2">
          <div className="flex flex-col">
            <a href="" className="text-2xl hover:text-red">List Title</a>
            <p className="text-sm">Game count</p>
          </div>
          <BsEyeFill size={24} />
        </div>
        <p className="text-base text-blue font-lato font-bold">
          List Description
        </p>
      </div>
    </>
  );
}

export default ListCard;
