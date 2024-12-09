import "../css/app.css";
import "./bootstrap";

import page from "./components/page";
import collapse from "./components/collapse";
import channelCreate from "./components/channelCreate";
import post from "./components/post";

document.addEventListener("alpine:init", () => {
  Alpine.data("page", page);
  Alpine.data("collapse", collapse);
  Alpine.data("channelCreate", channelCreate);
  Alpine.data("post", post);
});

window.parseEmojis = function (el) {
  twemoji.parse(el ?? document.body, {
    folder: "svg",
    ext: ".svg",
  });
};
document.addEventListener("DOMContentLoaded", () => {
  //   document.addEventListener("livewire:navigated", () => {
  //     parseEmojis();
  //   });

  //   Livewire.hook("component.initialized", (event) => {
  //     console.log("loaded");
  //   });

  //   Livewire.hook("component.update", (event) => {
  //     console.log("loaded");
  //   });

  Livewire.hook("morphed", ({ el, component }) => {
    parseEmojis();
  });

  parseEmojis();
});
