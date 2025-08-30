import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";

function RegistrationPage() {
  const [first_name, setFirstName] = useState("");
  const [last_name, setLastName] = useState("");
  const [user_name, setUsername] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [rePassword, setRePassword] = useState("");
  const navigate = useNavigate();

  const handleRegister = async (e) => {
    e.preventDefault();
    if (password !== rePassword) {
      alert("Passwords do not match");
      return;
    }
    try {
      const response = await fetch("http://localhost:8000/api/user/create/", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          first_name,
          last_name,
          user_name,
          email,
          password,
        }),
      });
      if (response.ok) {
        navigate("/login");
      } else {
        console.error("Registration failed");
      }
    } catch (error) {
      console.error("Error:", error);
    }
  };

  return (
    <>
      <div className="font-electrolize flex flex-row items-center w-screen h-screen justify-center space-x-10">
        <div className="flex flex-col items-end min-w-[25%]">
          <p className="text-blue text-6xl">PIXCADE</p>
          <p className="font-lato text-red text-xl">Explore and Discover!</p>
        </div>
        <div className="flex flex-col bg-blue min-w-[30%] px-14 py-20 items-center justify-center space-y-10 rounded">
          <p className="text-white text-3xl">Sign Up</p>
          <form
            onSubmit={handleRegister}
            className="flex flex-col w-full items-center space-y-10"
          >
            <input
              type="text"
              value={first_name}
              className="bg-white rounded w-[100%] h-12 px-5"
              onChange={(e) => setFirstName(e.target.value)}
              placeholder="Firstname"
              required
            />
            <input
              type="text"
              value={last_name}
              className="bg-white rounded w-[100%] h-12 px-5"
              onChange={(e) => setLastName(e.target.value)}
              placeholder="Lastname"
              required
            />
            <input
              type="text"
              value={user_name}
              className="bg-white rounded w-[100%] h-12 px-5"
              onChange={(e) => setUsername(e.target.value)}
              placeholder="Username"
              required
            />
            <input
              type="email"
              value={email}
              className="bg-white rounded w-[100%] h-12 px-5"
              onChange={(e) => setEmail(e.target.value)}
              placeholder="Email"
              required
            />
            <input
              type="password"
              value={password}
              className="bg-white rounded w-[100%] h-12 px-5"
              onChange={(e) => setPassword(e.target.value)}
              placeholder="Password"
              required
            />
            <input
              type="password"
              value={rePassword}
              className="bg-white rounded w-[100%] h-12 px-5"
              onChange={(e) => setRePassword(e.target.value)}
              placeholder="Re-enter Password"
              required
            />
            <button
              type="submit"
              className="bg-red rounded px-5 text-white h-10"
            >
              REGISTER
            </button>
            <Link to="/" className="text-base text-white hover:text-red">
              Already Have an Account?
            </Link>
          </form>
        </div>
      </div>
    </>
  );
}

export default RegistrationPage;
