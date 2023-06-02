import React from "react";
import ReactDOM from "react-dom";
import "./index.css";

function Hello({ library, message, number }) {
  return (
    <div>
      <h1>Welcome to {library}!</h1>
      <p>{message}</p>
      <p>{number} Props Total</p>
    </div>
  );
}

ReactDOM.render(
  <Hello
    library="React"
    message="add dynamic data!"
    number={3}
  />,
  document.getElementById("root")
);
