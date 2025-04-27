const cities = ["Paris", "Lyon", "Marseille", "Nice", "Bordeaux", "Toulouse", "Nantes", "Lille", "Strasbourg", "Montpellier"]; // Liste des villes

function searchCity() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const suggestionsList = document.getElementById('suggestionsList');
    suggestionsList.innerHTML = ''; // Réinitialiser la liste à chaque nouvelle saisie

    console.log("Input:", input); // Vérifier la saisie

    if (input) {
        const filteredCities = cities.filter(city => city.toLowerCase().includes(input));
        console.log("Filtered cities:", filteredCities); // Afficher les villes filtrées dans la console

        filteredCities.forEach(city => {
            const listItem = document.createElement('li');
            listItem.textContent = city;
            listItem.onclick = () => {
                document.getElementById('searchInput').value = city; // Mettre le nom de la ville dans le champ
                suggestionsList.innerHTML = ''; // Vider les suggestions après le choix
            };
            suggestionsList.appendChild(listItem);
        });
    }
}
