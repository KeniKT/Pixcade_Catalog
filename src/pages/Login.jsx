import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";

function LoginPage() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const navigate = useNavigate();

  const handleLogin = async (e) => {
    e.preventDefault();
    try {
      const response = await fetch("http://localhost:8000/api/user/login/", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ email, password }),
      });
      if (response.ok) {
        const data = await response.json();
        sessionStorage.setItem("access_token", data.access);
        sessionStorage.setItem("user_id", data.user_id);
        sessionStorage.setItem("user_email", data.user_email);
        sessionStorage.setItem("is_admin", data.is_admin);
        navigate(data.is_admin ? "/add-game" : "/home");
      } else {
        console.error("Login failed");
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
          <p className="text-white text-3xl">Sign In</p>
          <form
            onSubmit={handleLogin}
            className="flex flex-col w-full items-center space-y-10"
          >
            <input
              type="email"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              className="bg-white rounded w-[100%] h-12 px-5"
              placeholder="Email"
              required
            />
            <input
              type="password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              className="bg-white rounded w-[100%] h-12 px-5"
              placeholder="Password"
              required
            />
            <button
              type="submit"
              className="bg-red rounded px-5 text-white h-10"
            >
              LOGIN
            </button>
            <Link
              to="/register"
              className="text-base text-white hover:text-red"
            >
              Create an Account?
            </Link>
          </form>
        </div>
      </div>
    </>
  );
}

export default LoginPage;
