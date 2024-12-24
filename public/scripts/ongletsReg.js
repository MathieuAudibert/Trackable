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

    return isValid;
}

function showPage(pageIndex) {
    if (pageIndex > 0 && !validateCurrentPage(currentPage)) {
        alert("Veuillez remplir les champs."); 
        return;
    }

    const pages = document.querySelectorAll(".form-page");
    pages.forEach((page, index) => {
        page.style.display = index === pageIndex ? "block" : "none";
    });

    currentPage = pageIndex;

    document.getElementById("prev-btn").style.display = pageIndex === 0 ? "none" : "inline-block";
    document.getElementById("next-btn").style.display = pageIndex === pages.length - 1 ? "none" : "inline-block";
    document.getElementById("submit-btn").style.display = pageIndex === pages.length - 1 ? "inline-block" : "none";
}

let currentPage = 0;

document.addEventListener("DOMContentLoaded", () => {
    showPage(currentPage);
});
