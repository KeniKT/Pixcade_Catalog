import Navbar from "../components/Navbar";
import RatingJoysticksActive from "../components/RatingJoysticksActive";
import RatingJoysticks from "../components/RatingJoysticks";
import ReviewCard from "../components/ReviewCard";
import GenreTag from "../components/GenreTag";
import PlatformIcons from "../components/PlatformIcons";
import TagCard from "../components/TagCard";
import Footer from "../components/Footer";
import React, { useState, useEffect } from "react";
import { useParams } from "react-router-dom";

function GameDetails(props) {
  const [rating, setRating] = useState(0);
  const { id } = useParams();
  const [game, setGame] = useState(null);
  const [reviewText, setReviewText] = useState("");
  const [genreName, setGenreName] = useState("");
  const [tags, setTags] = useState([]);
  const [platforms, setPlatforms] = useState([]);
  const [reviews, setReviews] = useState([]);
  const [trailerLink, setTrailerLink] = useState("");

  const handleReviewTextChange = (e) => {
    setReviewText(e.target.value);
  };

  const fetchReviews = async () => {
    try {
      const response = await fetch(`http://localhost:8001/api/game/${id}/`);
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      const data = await response.json();
      setReviews(data.reviews);
    } catch (error) {
      console.error("Error fetching reviews:", error);
    }
  };

  const handleSubmitReview = async (e) => {
    e.preventDefault();
    try {
      const response = await fetch(
        "http://localhost:8002/api/review/reviews/",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            id: 0,
            user_id: parseInt(sessionStorage.getItem("user_id")),
            game_id: game?.id,
            review_text: reviewText,
            review_date: new Date().toISOString().split("T")[0],
          }),
        }
      );
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      console.log("Review submitted successfully");

      setReviewText("");
      setRating(0);
      fetchReviews();
    } catch (error) {
      console.error("Error submitting review:", error);
    }
  };

  const handleRatingChange = (newRating) => {
    setRating(newRating);
    console.log("New rating:", newRating);
  };

  useEffect(() => {
    const fetchGameDetails = async () => {
      try {
        const response = await fetch(`http://localhost:8001/api/game/${id}/`);
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        const data = await response.json();
        setGame(data);
        setReviews(data.reviews);
        setTrailerLink(data.trailer_link);
        console.log(data.trailer_link);

        if (data.genre) {
          const platformResponse = await fetch(
            `http://localhost:8001/api/game_platform/${data.id}/platforms/`
          );
          if (!platformResponse.ok) {
            throw new Error("Network response was not ok");
          }
          const platformData = await platformResponse.json();
          setPlatforms(platformData);

          const genreResponse = await fetch(
            `http://localhost:8001/api/genre/${data.genre}/`
          );
          if (!genreResponse.ok) {
            throw new Error("Network response was not ok");
          }
          const genreData = await genreResponse.json();
          setGenreName(genreData.genre_name);

          const tagResponse = await fetch(
            `http://localhost:8001/api/game_tag/${data.id}/tags/`
          );
          if (!tagResponse.ok) {
            throw new Error("Network response was not ok");
          }
          const tagData = await tagResponse.json();
          setTags(tagData);
        }
      } catch (error) {
        console.error("Error fetching game details:", error);
      }
    };

    fetchGameDetails();
  }, [id]);

  const extractYouTubeVideoID = (url) => {
    const regex =
      /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    const match = url.match(regex);
    return match ? match[1] : null;
  };

  const videoID = extractYouTubeVideoID(trailerLink);

  return (
    <>
      <Navbar />
      <div className="flex flex-col font-electrolize text-blue items-center">
        <div className="flex flex-row p-5 w-[70%] space-x-5">
          <div className="flex flex-col w-4/6 h-full space-y-10">
            <div className="space-y-2">
              <img src={game?.banner} className="w-full rounded" />
              <div className="flex flex-row border-b-2 border-red items-center justify-between">
                <p className="text-blue text-3xl">{game?.title}</p>
                <RatingJoysticks rating={game?.average_rating} />
              </div>
              <div className="flex flex-row items-center justify-between">
                <div className="flex flex-row space-x-5 items-center">
                  <GenreTag genreText={genreName} />
                  <PlatformIcons size="24" platforms={platforms} />
                </div>
                <p className="text-base text-blue">{game?.release_date}</p>
              </div>
              <div className="flex flex-col h-full justify-between space-y-10">
                <p className="text-base text-blue font-lato font-bold">
                  {game?.description}
                </p>
                <div className="flex flex-row space-x-2">
                  {tags.map((tag) => (
                    <TagCard key={tag.id} tagText={tag.tag_name} />
                  ))}
                </div>
              </div>
            </div>
            <div className="flex flex-col w-full space-y-10">
              {videoID && (
                <div className="relative w-full pb-[56.25%] h-0">
                  <iframe
                    className="absolute top-0 left-0 w-full h-full"
                    src={`https://www.youtube.com/embed/${videoID}`}
                    title="YouTube video player"
                    frameBorder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowFullScreen
                  ></iframe>
                </div>
              )}
              <form
                onSubmit={handleSubmitReview}
                className="flex flex-col w-full items-center space-y-2"
              >
                <textarea
                  value={reviewText}
                  onChange={handleReviewTextChange}
                  rows={5}
                  placeholder="Write a review..."
                  className="bg-white font-lato border-2 border-blue focus:outline-none focus:ring-0 rounded w-full resize-none p-2"
                ></textarea>
                <div className="flex flex-row w-full items-center justify-between">
                  <RatingJoysticksActive
                    size={30}
                    userId={sessionStorage.getItem("user_id")}
                    gameId={game?.id}
                    onRatingChange={handleRatingChange}
                  />
                  <button
                    type="submit"
                    className="text-base bg-red max-w-fit text-white py-3 px-5 rounded"
                  >
                    SUBMIT REVIEW
                  </button>
                </div>
              </form>
              <p className="text-blue text-2xl underline decoration-red">
                REVIEWS
              </p>
              <div className="grid grid-cols-2 gap-10">
                {reviews.map((review) => (
                  <ReviewCard
                    key={review.id}
                    ratingValue={review.rating_value}
                    profileImage="src/assets/TestImages/banner.png" // Update with real profile images if available
                    username={review.user_id} // Modify to get the username if available
                    reviewDate={new Date(
                      review.review_date
                    ).toLocaleDateString()} // Format the review date
                    reviewText={review.review_text}
                  />
                ))}
              </div>
            </div>
          </div>
          <div className="flex flex-col space-y-5 w-2/6 h-full">
            <img
              src={game?.screenshots?.[0]?.image}
              className="w-full rounded"
            />
            <img
              src={game?.screenshots?.[1]?.image}
              className="w-full rounded"
            />
            <img
              src={game?.screenshots?.[2]?.image}
              className="w-full rounded"
            />
          </div>
        </div>
      </div>
      <div className="pb-[1px]">
        <Footer />
      </div>
    </>
  );
}

export default GameDetails;
