function GenreTag(props) {
  return (
    <>
      <div className="flex flex-col bg-red px-5 rounded items-center justify-center  h-8">
        <a
          href="#"
          className="text-white align-middle font-electrolize text-sm"
        >
          {props.genreText}
        </a>
      </div>
    </>
  );
}

export default GenreTag;
