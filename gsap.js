document.getElementById('nextPageBtn').addEventListener('click', () => {
    // GSAP animation to fade out the entire page
    gsap.to("body", {
        opacity: 0,
        duration: 1,
        onComplete: () => {
            // Redirect to the next page after the animation completes
            window.location.href = 'contact.html'; // Replace with your next page URL
        }
    });
});