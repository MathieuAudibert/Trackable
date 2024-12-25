document.getElementById('confirm-password').addEventListener('input', function () {
    const password = document.getElementById('mdp').value;
    const confirmPassword = this.value;
    const errorSpan = document.getElementById('password-error');

    if (confirmPassword !== password) {
        errorSpan.style.display = 'block';
    } else {
        errorSpan.style.display = 'none';
    }
});