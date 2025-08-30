import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import React, { useState, useEffect } from "react";

function AddGame() {
  const [options, setOptions] = useState([]);
  const [tags, setTags] = useState([]);
  const [formData, setFormData] = useState({
    title: "",
    genre: "",
    caption: "",
    description: "",
    developer: "",
    release_date: "",
    trailer_link: "",
  });
  const [platformData, setPlatformData] = useState([]);
  const [bannerImage, setBannerImage] = useState(null);
  const [screenshotImages, setScreenshotImages] = useState([null, null, null]);
  const [tagsData, setTagsData] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch("http://localhost:8001/api/genre/");
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        const data = await response.json();
        const fetchedOptions = data.map((item) => ({
          id: item.id,
          genre_name: item.genre_name,
        }));
        setOptions(fetchedOptions);

        const tagResponse = await fetch("http://localhost:8001/api/tag/");
        if (!tagResponse.ok) {
          throw new Error("Network response was not ok");
        }
        const tagData = await tagResponse.json();
        const fetchedTags = tagData.map((item) => ({
          id: item.id,
          tag_name: item.tag_name,
        }));
        setTags(fetchedTags);
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    };

    fetchData();
  }, []);

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  const handleCheckboxChange = (e) => {
    const { value, checked } = e.target;
    setPlatformData((prevData) =>
      checked
        ? [...prevData, { platform_id: value }]
        : prevData.filter((item) => item.platform_id !== value)
    );
  };

  const handleBannerChange = (e) => {
    setBannerImage(e.target.files[0]);
  };

  const handleScreenshotChange = (index) => (e) => {
    const newScreenshots = [...screenshotImages];
    newScreenshots[index] = e.target.files[0];
    setScreenshotImages(newScreenshots);
  };

  const handleTagChange = (e) => {
    const selectedOptions = Array.from(e.target.selectedOptions, (option) => ({
      tag_id: option.value,
      game_id: formData.game_id, // Use game ID when available
    }));

    setTagsData(selectedOptions);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await fetch("http://localhost:8001/api/game/", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
      });
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      const gameData = await response.json();

      // Submit platform data
      for (const platform of platformData) {
        await fetch("http://localhost:8001/api/game_platform/", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            game_id: gameData.id,
            platform_id: platform.platform_id,
          }),
        });
      }

      // Submit tags data
      for (const tag of tagsData) {
        await fetch("http://localhost:8001/api/game_tag/", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            tag_id: tag.tag_id,
            game_id: gameData.id,
          }),
        });
      }

      if (bannerImage) {
        const bannerFormData = new FormData();
        bannerFormData.append("banner", bannerImage);

        const bannerResponse = await fetch(
          `http://localhost:8001/api/game/${gameData.id}/upload-banner/`,
          {
            method: "POST",
            body: bannerFormData,
          }
        );

        if (!bannerResponse.ok) {
          throw new Error("Banner upload failed");
        }

        console.log("Banner uploaded successfully");
      }

      for (const screenshot of screenshotImages) {
        if (screenshot) {
          const screenshotFormData = new FormData();
          screenshotFormData.append("image", screenshot);

          const screenshotResponse = await fetch(
            `http://localhost:8001/api/game/${gameData.id}/upload-screenshot/`,
            {
              method: "POST",
              body: screenshotFormData,
            }
          );

          if (!screenshotResponse.ok) {
            throw new Error("Screenshot upload failed");
          }

          console.log("Screenshot uploaded successfully");
        }
      }

      setFormData({
        title: "",
        genre: "",
        caption: "",
        description: "",
        developer: "",
        release_date: "",
        trailer_link: "",
      });

      setPlatformData([]);
      setBannerImage(null);
      setScreenshotImages([null, null, null]);
      setTagsData([]);

      console.log("Game added successfully:", gameData);
    } catch (error) {
      console.error("Error adding game:", error);
    }
  };

  return (
    <>
      <Navbar />
      <div className="flex flex-col font-electrolize text-blue items-center">
        <div className="flex flex-col p-5 w-[60%] space-y-5">
          <p className="text-blue underline decoration-red font-electrolize text-2xl">
            ADD GAME
          </p>
          <form onSubmit={handleSubmit} className="flex flex-col space-y-5">
            <div className="grid grid-cols-2 w-full gap-5">
              <input
                type="text"
                name="title"
                placeholder="Game Title"
                className="border-2 border-red rounded bg-white h-12 px-5"
                value={formData.title}
                onChange={handleChange}
              />
              <select
                name="genre"
                className="border-2 border-red rounded bg-white h-12 px-5"
                value={formData.genre}
                onChange={handleChange}
              >
                <option value="" disabled>
                  Genre
                </option>
                {options.map((option) => (
                  <option key={option.id} value={option.id}>
                    {option.genre_name}
                  </option>
                ))}
              </select>
              <textarea
                name="caption"
                rows={5}
                className="border-2 py-5 border-red rounded bg-white px-5 resize-none"
                placeholder="Caption"
                value={formData.caption}
                onChange={handleChange}
              ></textarea>
              <textarea
                name="description"
                rows={5}
                className="border-2 py-5 border-red rounded bg-white px-5 resize-none"
                placeholder="Description"
                value={formData.description}
                onChange={handleChange}
              ></textarea>
              <input
                type="text"
                name="developer"
                placeholder="Developer"
                className="border-2 border-red rounded bg-white h-12 px-5"
                value={formData.developer}
                onChange={handleChange}
              />
              <input
                type="date"
                name="release_date"
                placeholder="Release Date"
                className="border-2 border-red rounded bg-white h-12 px-5"
                value={formData.release_date}
                onChange={handleChange}
              />
            </div>
            <input
              type="text"
              name="trailer_link"
              placeholder="Trailer Link"
              className="border-2 border-red rounded bg-white h-12 px-5"
              value={formData.trailer_link}
              onChange={handleChange}
            />
            <p className="text-blue underline decoration-red font-electrolize text-2xl">
              TAGS
            </p>
            <select
              name="tags"
              className="border-2 border-red rounded bg-white py-5 px-5"
              multiple={true}
              onChange={handleTagChange}
            >
              {tags.map((option) => (
                <option className="py-2" key={option.id} value={option.id}>
                  {option.tag_name}
                </option>
              ))}
            </select>

            <p className="text-blue underline decoration-red font-electrolize text-2xl">
              PLATFORMS
            </p>
            <div className="flex flex-row justify-between">
              <div className="flex flex-row items-center space-x-5">
                <input
                  className="h-5 w-5 accent-red"
                  type="checkbox"
                  id="Windows"
                  value="1"
                  onChange={handleCheckboxChange}
                />
                <label htmlFor="Windows">Windows</label>
              </div>
              <div className="flex flex-row items-center space-x-5">
                <input
                  className="h-5 w-5 accent-red"
                  type="checkbox"
                  id="Mac"
                  value="2"
                  onChange={handleCheckboxChange}
                />
                <label htmlFor="Mac">Mac</label>
              </div>
              <div className="flex flex-row items-center space-x-5">
                <input
                  className="h-5 w-5 accent-red white"
                  type="checkbox"
                  id="Linux"
                  value="3"
                  onChange={handleCheckboxChange}
                />
                <label htmlFor="Linux">Linux</label>
              </div>
            </div>
            <div className="flex flex-col space-y-5">
              <p className="text-blue underline decoration-red font-electrolize text-2xl">
                IMAGES
              </p>
              <input
                type="file"
                className="border-b-2 border-red bg-white h-12 px-5"
                onChange={handleBannerChange}
              />
              <div className="flex flex-col space-x-10">
                <div className="flex flex-flex items-center space-x-5">
                  <input
                    type="file"
                    className="border-b-2 border-red bg-white h-12 px-5 w-1/3"
                    onChange={handleScreenshotChange(0)}
                  />
                  <input
                    type="file"
                    className="border-b-2 border-red bg-white h-12 px-5 w-1/3"
                    onChange={handleScreenshotChange(1)}
                  />
                  <input
                    type="file"
                    className="border-b-2 border-red bg-white h-12 px-5 w-1/3"
                    onChange={handleScreenshotChange(2)}
                  />
                </div>
              </div>
              <button className="bg-red text-white px-5 py-2 rounded">
                ADD GAME
              </button>
            </div>
          </form>
        </div>
      </div>
      <div className="pb-[1px]">
        <Footer />
      </div>
    </>
  );
}

export default AddGame;
