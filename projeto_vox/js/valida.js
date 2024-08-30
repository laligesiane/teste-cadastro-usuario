document.getElementById('cadastroForm').addEventListener('submit', function(event) {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    if (nome === '' || email === '' || senha === '') {
        alert('Todos os campos são obrigatórios!');
        event.preventDefault();
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, insira um email válido.');
        event.preventDefault();
    }

    if (senha.length < 8) {
        alert('A senha deve conter pelo menos 8 caracteres.');
        event.preventDefault();
    }
});
