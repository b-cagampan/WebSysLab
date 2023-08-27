document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("form");
    const submitButton = document.getElementById("submit-btn");

    form.addEventListener("submit", function(event) {
        if (!submitButton.clicked) {
            event.preventDefault(); // Prevent form submission
            console.log("Submit button was not clicked.");
        }
    });

    submitButton.addEventListener("click", function() {
        submitButton.clicked = true; // Set a flag indicating the button was clicked
        console.log("Submit button clicked.");
    });
});