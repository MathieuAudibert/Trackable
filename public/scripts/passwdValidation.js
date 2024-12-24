function validatePasswords() {
    const password = document.getElementById("password").value.trim();
    const confirmPassword = document.getElementById("confirm-password").value.trim();

    if (password !== confirmPassword) {
        alert("Les mots de passe ne correspondent pas !");
        document.getElementById("confirm-password").classList.add("invalid");
        return false;
    } else {
        document.getElementById("confirm-password").classList.remove("invalid");
    }
    return true;
}

function validateCurrentPage(pageIndex) {
    const pages = document.querySelectorAll(".form-page");
    const inputs = pages[pageIndex].querySelectorAll("[required]");
    let isValid = true;

    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add("invalid");
        } else {
            input.classList.remove("invalid");
        }
    });
    if (pageIndex === 2) {
        isValid = isValid && validatePasswords();
    }

    return isValid;
}
