import ListCard from "../components/ListCard";
import Navbar from "../components/Navbar";

function ProfilePage() {
  return (
    <>
      <Navbar />
      <div className="flex flex-col font-electrolize text-blue items-center">
        <div className="flex flex-col p-5 min-w-[60%] space-y-10">
          <div className="flex flex-col space-y-2">
            <p className="text-blue text-2xl underline decoration-red">
              PROFILE
            </p>
            <div className="flex flex-row border-b-2 border-red py-5 justify-between items-end">
              <div className="flex flex-row space-x-5 items-end">
                <img
                  src="src\assets\TestImages\profile.jpg"
                  alt=""
                  className="w-[256px] h-[256px] rounded"
                />
                <div className="flex flex-col space-y-2">
                  <p className="text-3xl">Username</p>
                  <p className="text-base">Firstname Lastname</p>
                  <p className="text-base">Email</p>
                  <p className="text-base">date of birth</p>
                </div>
              </div>
              <div className="flex flex-col space-y-5">
                <div className="flex flex-row space-x-2">
                  <p className="text-base">Total Reviews</p>
                  <p className="text-base text-red">00</p>
                </div>
              </div>
            </div>
          </div>
          <div className="flex flex-col space-y-5">
            <p className="text-blue text-2xl underline decoration-red">LISTS</p>
            <div className="grid grid-cols-3 gap-10">
              <ListCard />
              <ListCard />
              <ListCard />
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default ProfilePage;
