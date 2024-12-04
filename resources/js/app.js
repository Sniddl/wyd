import "../css/app.css";
import "./bootstrap";

import page from "./components/page";

document.addEventListener("alpine:init", () => {
  Alpine.data("page", page);
});
