document.getElementById('recherche-btn').addEventListener('click', function () {
    const nom = document.getElementById('recherche').value.toLowerCase();
    const villeDep = document.getElementById('ville-dep').value.toLowerCase();
    const villeArr = document.getElementById('ville-arr').value.toLowerCase();
    const dateDep = document.getElementById('date-dep').value;
    const dateArr = document.getElementById('date-arr').value;
    const cartes = document.querySelectorAll('.carte');
    cartes.forEach(carte => {
        const carteNom = carte.getAttribute('data-nom');
        const carteVilleDep = carte.getAttribute('data-ville-dep');
        const carteVilleArr = carte.getAttribute('data-ville-arr');
        const carteDateDep = carte.getAttribute('data-date-dep');
        const carteDateArr = carte.getAttribute('data-date-arr');
        const matchNom = !nom || carteNom.includes(nom);
        const matchVilleDep = !villeDep || carteVilleDep.includes(villeDep);
        const matchVilleArr = !villeArr || carteVilleArr.includes(villeArr);
        const matchDateDep = !dateDep || carteDateDep >= dateDep;
        const matchDateArr = !dateArr || carteDateArr <= dateArr;
        if (matchNom && matchVilleDep && matchVilleArr && matchDateDep && matchDateArr) {
            carte.style.display = 'block';
        } else {
            carte.style.display = 'none';
        }
    });
});

