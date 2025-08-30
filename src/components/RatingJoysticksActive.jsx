import { useState, useEffect } from "react";
import { LuJoystick } from "react-icons/lu";
import { FiX } from "react-icons/fi";

function RatingJoysticksActive({ size, userId, gameId, onRatingChange }) {
  const [rating, setRating] = useState(0);

  // Function to handle the POST request
  const sendRatingToServer = async (ratingValue) => {
    try {
      const response = await fetch(`http://localhost:8002/api/rate/rates/`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          user_id: userId,
          game_id: gameId,
          rating_value: ratingValue,
        }),
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      // Optionally, handle the response here
      const data = await response.json();
      console.log("Rating submitted successfully:", data);
    } catch (error) {
      console.error("Error submitting rating:", error);
    }
  };

  // Update rating and send POST request when rating changes
  useEffect(() => {
    if (rating > 0) {
      sendRatingToServer(rating);
    }
  }, [rating]);

  // Handle click events for joystick and X icon
  const handleClick = (value) => {
    setRating(value);
    if (onRatingChange) {
      onRatingChange(value);
    }
  };

  return (
    <div className="flex flex-row space-x-1">
      <FiX
        color={rating === 0 ? "#F95142" : "#84A3A5"}
        size={size}
        onClick={() => handleClick(0)}
        className="cursor-pointer"
      />
      {[1, 2, 3, 4, 5].map((value) => (
        <LuJoystick
          key={value}
          color={value <= rating ? "#F95142" : "#84A3A5"}
          size={size}
          onClick={() => handleClick(value)}
          className="cursor-pointer"
        />
      ))}
    </div>
  );
}

export default RatingJoysticksActive;
