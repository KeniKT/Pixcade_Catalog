import LoginPage from "../pages/Login";
import RegistrationPage from "../pages/Register";
import HomePage from "../pages/Homepage";
import EditGame from "../pages/EditGame";
import GameDetails from "../pages/GameDetails";
import AddGame from "../pages/AddGame";
import Profile from "../pages/Profile";

import React, { useEffect } from "react";
import {
  BrowserRouter as Router,
  Routes,
  Route,
  Navigate,
} from "react-router-dom";

const isAuthenticated = () => {
  return sessionStorage.getItem("access_token") !== null;
};

const ProtectedRoute = ({ element }) => {
  return isAuthenticated() ? element : <Navigate to="/login" />;
};

const AppRoutes = () => {
  return (
    <Router>
      <Routes>
        <Route path="/login" element={<LoginPage />} />
        <Route path="/register" element={<RegistrationPage />} />
        <Route
          path="/home"
          element={<ProtectedRoute element={<HomePage />} />}
        />
         <Route
          path="/profile"
          element={<ProtectedRoute element={<Profile />} />}
        />
        <Route
          path="/edit-game"
          element={<ProtectedRoute element={<EditGame />} />}
        />
        <Route
          path="/add-game"
          element={<ProtectedRoute element={<AddGame />} />}
        />
        <Route
          path="/game/:id"
          element={<ProtectedRoute element={<GameDetails />} />}
        />
        <Route
          path="/"
          element={<Navigate to={isAuthenticated() ? "/home" : "/login"} />}
        />
        <Route path="*" element={<Navigate to="/" />} />
      </Routes>
    </Router>
  );
};

export default AppRoutes;
