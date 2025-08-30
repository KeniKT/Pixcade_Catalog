import React, { useState, useEffect } from "react";
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import { FaChevronLeft, FaChevronRight } from "react-icons/fa";
import GameCardWide from "../components/GameCardWide";
import GameCardCompact from "../components/GameCardCompact";

function Homepage() {
  const [currentSlide, setCurrentSlide] = useState(0);
  const [allReleases, setAllReleases] = useState([]);
  const [genreMap, setGenreMap] = useState({});
  const [ratingsMap, setRatingsMap] = useState({});
  const [recentlyPopular, setRecentlyPopular] = useState([]);

  const fetchGenres = async (ids) => {
    try {
      const fetchPromises = ids.map((id) =>
        fetch(`http://localhost:8001/api/genre/${id}/`)
          .then((response) => response.json())
          .then((data) => ({ id: data.id, name: data.genre_name }))
      );

      const genreData = await Promise.all(fetchPromises);
      const genreMap = genreData.reduce((acc, genre) => {
        acc[genre.id] = genre.name;
        return acc;
      }, {});

      setGenreMap(genreMap);
    } catch (error) {
      console.error("Error fetching genres:", error);
    }
  };

  const fetchRatings = async (ids) => {
    try {
      const fetchPromises = ids.map((id) =>
        fetch(`http://localhost:8001/api/game/${id}/`)
          .then((response) => response.json())
          .then((data) => ({ id: data.id, rating: data.average_rating }))
      );

      const ratingData = await Promise.all(fetchPromises);
      const ratingsMap = ratingData.reduce((acc, rating) => {
        acc[rating.id] = rating.rating;
        return acc;
      }, {});
      setRatingsMap(ratingsMap);
    } catch (error) {
      console.error("Error fetching ratings:", error);
    }
  };

  useEffect(() => {
    const fetchGames = async () => {
      try {
        const [popularResponse, releasesResponse] = await Promise.all([
          fetch("http://localhost:8001/api/game/latest/"),
          fetch("http://localhost:8001/api/game/"),
        ]);

        if (!popularResponse.ok)
          throw new Error("Failed to fetch popular games");
        if (!releasesResponse.ok) throw new Error("Failed to fetch all games");

        const [popularData, releasesData] = await Promise.all([
          popularResponse.json(),
          releasesResponse.json(),
        ]);

        setRecentlyPopular(popularData);
        setAllReleases(releasesData);

        const genreIds = [...new Set(releasesData.map((game) => game.genre))];
        fetchGenres(genreIds);

        const gameIds = [...new Set(releasesData.map((game) => game.id))];
        fetchRatings(gameIds);
      } catch (error) {
        console.error("Error fetching games:", error);
      }
    };

    fetchGames();
  }, []);

  const handlePrev = () => {
    setCurrentSlide((prev) => Math.max(prev - 1, 0));
  };

  const handleNext = () => {
    setCurrentSlide((prev) => Math.min(prev + 1, recentlyPopular.length - 1));
  };

  const getGenreName = (id) => {
    return genreMap[id] || "Unknown Genre";
  };

  const getRatingValue = (id) => {
    return ratingsMap[id] || "0";
  };

  const handleDotClick = (index) => {
    setCurrentSlide(index);
  };

  return (
    <>
      <Navbar />
      <div className="flex flex-col w-full items-center pb-16">
        <div className="flex flex-col w-[70%] space-y-20">
          <div className="flex flex-col font-electrolize text-2xl space-y-5">
            <p className="text-blue underline decoration-red mx-24">
              RECENT RELEASES
            </p>
            <div className="flex flex-row items-center space-x-16">
              <button onClick={handlePrev} disabled={currentSlide === 0}>
                <FaChevronLeft color="#F95142" />
              </button>

              <div className="w-full overflow-hidden relative">
                <div
                  className="flex transition-transform duration-300"
                  style={{ transform: `translateX(-${currentSlide * 100}%)` }}
                >
                  {recentlyPopular.map((game) => (
                    <div key={game.id} className="flex-shrink-0 w-full">
                      <GameCardWide
                        key={game.id}
                        id={game.id}
                        gameTitle={game.title}
                        gameGenre={getGenreName(game.genre)}
                        bannerImage={game.banner}
                        averageRating={getRatingValue(game.id)}
                        // releaseDate={game.release_date}
                        gameCaption={game.caption}
                      />
                    </div>
                  ))}
                </div>
              </div>

              <button
                onClick={handleNext}
                disabled={currentSlide === recentlyPopular.length - 1}
              >
                <FaChevronRight color="#F95142" />
              </button>
            </div>
            <div className="flex justify-center space-x-5 mt-4">
              {recentlyPopular.map((_, index) => (
                <div
                  key={index}
                  className={`w-2 h-2 rounded-full cursor-pointer ${
                    index === currentSlide ? "bg-red" : "bg-blue"
                  }`}
                  onClick={() => handleDotClick(index)}
                ></div>
              ))}
            </div>
          </div>
          <div className="flex flex-col font-electrolize text-2xl space-y-5">
            <p className="text-blue underline decoration-red mx-24">
              ALL RELEASES
            </p>
            <div className="grid grid-cols-3 gap-x-10 gap-y-10 mx-24">
              {allReleases.map((game) => (
                <GameCardCompact
                  key={game.id}
                  id={game.id}
                  averageRating={getRatingValue(game.id)}
                  bannerImage={game.banner}
                  gameTitle={game.title}
                  gameGenre={getGenreName(game.genre)}
                />
              ))}
            </div>
          </div>
        </div>
      </div>
      <div className="pb-[1px]">
        <Footer />
      </div>
    </>
  );
}

export default Homepage;
