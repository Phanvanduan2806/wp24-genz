const textArray = ["Developer", "Coding", "Development"];
let textIndex = 0;
let charIndex = 0;
const writeSpeed = 150;
const eraseDelay = 3000;
const eraseSpeed = 30;

function typeWriter() {
  const animatedText = document.getElementById("animatedText");
  if (charIndex < textArray[textIndex].length) {
    animatedText.innerHTML += textArray[textIndex].charAt(charIndex);
    charIndex++;
    setTimeout(typeWriter, writeSpeed);
  } else {
    setTimeout(() => {
      eraseText();
    }, eraseDelay);
  }
}

function eraseText() {
  const animatedText = document.getElementById("animatedText");
  if (charIndex > 0) {
    animatedText.innerHTML = textArray[textIndex].substring(0, charIndex - 1);
    charIndex--;
    setTimeout(eraseText, eraseSpeed);
  } else {
    textIndex = (textIndex + 1) % textArray.length;
    setTimeout(typeWriter, writeSpeed);
  }
}

document.addEventListener("DOMContentLoaded", typeWriter);
