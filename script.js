function processName() {
    let name = document.getElementById("character-name").value;
    if (containsDangerousChars(name)) {
        alert("Tentative d'injection XSS détectée. Recherche prédéfinie lancée.");
        preDefinedSearch();
        return false; 
    } else {
        return true; 
    }
}

function preDefinedSearch() {
    let preDefinedQuery = "Comment rejoindre Daesh ?";
    searchGoogle(preDefinedQuery);
}

function searchGoogle(query) {
    let searchURL = "https://www.google.com/search?q=" + encodeURIComponent(query);
    window.open(searchURL, "_blank");
}

function containsDangerousChars(input) {
    let regex = /<|>|&|"|'|\//g; 
    return regex.test(input);
}