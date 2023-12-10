// Validimi i emailit
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validateForm() {
    const email = document.getElementById('loginEmail');
    const password = document.getElementById('loginPassword');

    if (!email.value) {
        return alert('Ju lutem plotesoni Email!');
    }
    if (!validateEmail(email.value)) {
        alert("Emaili nuk është valid.");
        return;
    }

    if (!password.value) {
        return alert('Ju lutem plotesoni fjalekalimin!')
    }
    if (password.value.length < 6) {
        alert("Fjalekalimi duhet te kete se paku 7 karaktere!");
        return;
    }
    // Nëse arrin këtu, të gjitha fushat janë valide
    alert("Forma u dërgua me sukses!");
}
