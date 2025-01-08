// script.js
const typedText = document.getElementById('typed-text');
const textToType = typedText.textContent;
typedText.textContent = "";

function typeText() {
    let charIndex = 0;
    typedText.classList.remove("hidden");
    const typingInterval = setInterval(() => {
        if (charIndex < textToType.length) {
            typedText.textContent += textToType.charAt(charIndex);
            charIndex++;
        } else {
            clearInterval(typingInterval);
            setTimeout(() => {
                typedText.textContent = "";
                typedText.classList.add("hidden");
                setTimeout(typeText, 1000);
            }, 2000);
        }
    }, 50);
}

typeText();