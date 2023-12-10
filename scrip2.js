function validateForm() {
  const numriTelefonitInput = document.querySelector('input[name="numri_telefonit"]');
  const emailInput = document.querySelector('input[name="email"]');
  const passwordInput = document.getElementById('password');

  const numriTelefonitValue = numriTelefonitInput.value.trim();
  const emailValue = emailInput.value.trim();

  
    // Verifikimi i plotësisë së fushave
    if (numriTelefonitValue === '' && emailValue === '') {
      alert("Ju lutem plotësoni të dhënat!");
      return;
    }

  // Validimi i numrit të telefonit
  if (numriTelefonitValue.length < 9) {
    alert("Numeri i telefonit duhet të ketë të paktën 9 numra.");
    return;
  }

  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  // password
  if (!passwordInput.value) {
    return alert('Ju lutem plotesoni fjalekalimin!')
  }
  if (passwordInput.value.length < 6) {
      alert("Fjalekalimi duhet te kete se paku 7 karaktere!");
      return;
  }
  // Validimi i emailit
  if (!validateEmail(emailValue)) {
    alert("Emaili nuk është valid.");
    return;
  }

  // Nëse arrin këtu, të gjitha fushat janë valide
  alert("Forma u dërgua me sukses!");
}





