import React, { useState, useEffect } from "react";
import { Link, useNavigate } from "react-router-dom";
import { IoSearch } from "react-icons/io5";

function Navbar() {
  const navigate = useNavigate();
  const [data, setData] = useState(null);

  const handleLogout = () => {
    sessionStorage.removeItem("access_token");
    sessionStorage.removeItem("user_id");
    sessionStorage.removeItem("user_email");
    sessionStorage.removeItem("is_admin");
    navigate("/login");
  };

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch("http://localhost:8000/api/user/me/", {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${sessionStorage.getItem("access_token")}`,
          },
        });

        if (!response.ok) {
          throw new Error("Network response was not ok");
        }

        const jsonResponse = await response.json();
        setData(jsonResponse);
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    };

    fetchData();
  }, [sessionStorage.getItem("access_token")]);

  return (
    <>
      <div className="font-electrolize bg-blue flex flex-row justify-between py-5 px-10 m-[32px] rounded">
        <p className="text-3xl text-white content-center">PIXCADE</p>
        {/* <form action="" className="flex flex-row m-2 w-[40%]">
          <input
            type="text"
            name=""
            id=""
            className="bg-white rounded w-[100%] mx-5 h-10 px-10"
            placeholder="Search..."
          />
          <button className="bg-red rounded px-3 text-white">
            <IoSearch size={15} />
          </button>
        </form> */}
        <div className="flex flex-row">
          {/* <div className="w-14 h-14 bg-white rounded">
            <img src="" alt="" />
          </div> */}
          <div className="flex flex-col pl-2 justify-center">
            <Link to="/profile" className="text-white text-sm">Welcome {data?.user_name}</Link>
            <a href="" onClick={handleLogout} className="text-red text-sm">
              Logout
            </a>
          </div>
        </div>
      </div>
    </>
  );
}

export default Navbar;
