function togglePassword(checkboxId, inputId) {
    const checkbox = document.getElementById(checkboxId);
    const input = document.getElementById(inputId);

    if (!checkbox || !input) return; // safety check

    checkbox.addEventListener("change", function () {
        input.type = this.checked ? "text" : "password";
    });
}