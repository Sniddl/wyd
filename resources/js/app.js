import "../css/app.css";
import "./bootstrap";

import page from "./components/page";
import collapse from "./components/collapse";

document.addEventListener("alpine:init", () => {
  Alpine.data("page", page);
  Alpine.data("collapse", collapse);
});
