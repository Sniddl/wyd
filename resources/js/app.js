import "../css/app.css";
import "./bootstrap";

import page from "./components/page";
import collapse from "./components/collapse";
import channelCreate from "./components/channelCreate";

document.addEventListener("alpine:init", () => {
  Alpine.data("page", page);
  Alpine.data("collapse", collapse);
  Alpine.data("channelCreate", channelCreate);
});

twemoji.parse(document.body, {
  folder: "svg",
  ext: ".svg",
});
