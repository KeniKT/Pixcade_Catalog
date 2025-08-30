# Pixcade: An Online Game Catalog and Review Portal

Pixcade is an innovative online platform designed for video game enthusiasts to catalog, review, and discover new games. Inspired by the community-driven model of platforms like Letterboxd for film, Pixcade aims to create a vibrant space where gamers can share their experiences, opinions, and recommendations.

## Table of Contents

- [Overview](#overview)
- [Key Features](#key-features)
- [Technology Stack](#technology-stack)
- [Database Schema](#database-schema)
- [API Endpoints](#api-endpoints)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
- [Contributors](#contributors)

## Overview

The platform offers a comprehensive and regularly updated database of video games, rich user-generated content, and personalized features to enhance the gaming experience. Users can catalog the games they've played, create custom lists, write detailed reviews, and connect with a community of fellow gamers. The backend is designed with a Service-Oriented Architecture (SOA) to ensure scalability, maintainability, and flexibility.

## Key Features

-   **User Profiles**: Personalized spaces for users to manage their game collections, reviews, ratings, and wishlists.
-   **Comprehensive Game Database**: A rich database including game details, developer information, release dates, genres, platforms, screenshots, and aggregated ratings.
-   **Discovery & Recommendations**: A powerful recommendation engine, curated lists (e.g., "Best Indie Games"), and trending sections to help users discover new titles.
-   **Robust Review & Rating System**: Users can write in-depth reviews, provide simple numerical ratings, and use a user-generated tagging system to categorize games.
-   **Social Features**: Functionality to follow other users, view their activity feeds, and engage in discussions.
-   **Custom Lists & Collections**: Create and share public or private lists of games, such as "Favorite Games of All Time" or "Games to Play Next."

## Technology Stack

This project is built using a modern web development stack:

-   **Frontend**: React, Vite, Tailwind CSS
-   **Routing**: React Router
-   **Styling**: Tailwind CSS with custom theme configurations.
-   **Linting**: ESLint with plugins for React and React Hooks.

## Database Schema

The database is designed to manage all aspects of the platform, from users and games to reviews and social interactions. Below is a high-level overview of the schema.

![Database Schema](https://i.imgur.com/vG3gD0B.png )

### Core Entities:
- **User**: Stores user profile information, credentials, and user type.
- **Game**: Contains all details about a game, including title, description, price, release date, and developer.
- **Review**: Holds user-submitted reviews, including text and rating.
- **Rating**: Stores numerical ratings for games.
- **Purchase**: Tracks games purchased by users.
- **Wishlist**: Manages games a user wants to play.
- **Bundle**: Groups games together for special offers.
- **Platform, Genre, Tag**: Taxonomies for categorizing and discovering games.

## API Endpoints

The backend is divided into multiple services, each with its own set of responsibilities and endpoints.

| Service                          | Endpoint                                       | Method | Description                                      |
| -------------------------------- | ---------------------------------------------- | ------ | ------------------------------------------------ |
| **User Management**              | `/users/register`                              | POST   | Register a new user.                             |
|                                  | `/users/login`                                 | POST   | Authenticate a user and provide a token.         |
|                                  | `/users/{userId}`                              | GET    | Retrieve user profile information.               |
|                                  | `/users/{userId}`                              | PUT    | Update user profile information.                 |
| **Game Database**                | `/games`                                       | GET    | Retrieve a list of games with optional filtering.|
|                                  | `/games/{gameId}`                              | GET    | Retrieve detailed information for a game.        |
| **Review and Rating**            | `/games/{gameId}/reviews`                      | GET    | Retrieve reviews for a specific game.            |
|                                  | `/games/{gameId}/reviews`                      | POST   | Submit a new review for a specific game.         |
| **List and Collection**          | `/users/{userId}/lists`                        | GET    | Retrieve a user's custom game lists.             |
|                                  | `/users/{userId}/lists`                        | POST   | Create a new custom game list.                   |
| **Search**                       | `/search`                                      | GET    | Perform a search across games, users, etc.     |
| **Content Management**           | `/games/{gameId}/media`                        | POST   | Upload a new media asset for a game.             |

## Project Structure

The frontend codebase is organized as follows:
/
├── public/
├── src/
│   ├── components/
│   ├── pages/
│   ├── assets/
│   ├── App.jsx
│   └── main.jsx
├── .eslintrc.cjs
├── .gitignore
├── index.html
├── package.json
├── postcss.config.js
├── tailwind.config.js
└── vite.config.js