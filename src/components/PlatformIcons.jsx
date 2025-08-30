import { FaWindows, FaApple, FaLinux } from "react-icons/fa";

function PlatformIcons({ size, platforms = [] }) {
  const renderIcon = (platformName) => {
    switch (platformName) {
      case "Windows":
        return <FaWindows color="#1F2F49" size={size} />;
      case "Mac":
        return <FaApple color="#1F2F49" size={size} />;
      case "Linux":
        return <FaLinux color="#1F2F49" size={size} />;
      default:
        return null;
    }
  };

  return (
    <div className="flex flex-row space-x-2">
      {platforms.map((platform) => (
        <div key={platform.id}>{renderIcon(platform.platform_name)}</div>
      ))}
    </div>
  );
}

export default PlatformIcons;
