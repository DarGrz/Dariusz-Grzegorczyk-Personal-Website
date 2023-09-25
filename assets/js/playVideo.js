const playBtn = document.getElementById("playButton");
const myVideo = document.getElementById("myVideo");
const hideElement = document.querySelector(".hide-element");
const hideElement2 = document.querySelector(".hide-element2");
const siteHeader = document.querySelector(".site-header");
const siteFooter = document.querySelector(".site-footer");
const mainContainer = document.getElementById("main-container");

function playVideo() {
  console.log("ok");
  if (myVideo.paused) {
    myVideo.play();
    hideElement.style.visibility = "hidden";
    hideElement2.style.visibility = "hidden";
    siteHeader.style.visibility = "hidden";
    siteFooter.style.visibility = "hidden";
    mainContainer.classList.remove("align-self-center");
    mainContainer.classList.add("align-self-end");
    playBtn.innerText = "Pauza / Menu";
  } else {
    myVideo.pause();
    playBtn.innerText = "Kontynuuj";
    hideElement.style.visibility = "visible";
    hideElement2.style.visibility = "visible";
    siteHeader.style.visibility = "visible";
    siteFooter.style.visibility = "visible";
  }
}
