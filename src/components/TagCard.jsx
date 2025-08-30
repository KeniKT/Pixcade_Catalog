function TagCard(props) {
  return (
    <>
      <div className="flex flex-col bg-blue px-2 rounded items-center justify-center h-8">
        <a
          href="#"
          className="text-white align-middle font-electrolize text-xs"
        >
          {props.tagText}
        </a>
      </div>
    </>
  );
}

export default TagCard;
