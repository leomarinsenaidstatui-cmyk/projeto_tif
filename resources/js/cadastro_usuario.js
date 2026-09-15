$(document).ready(function () {
    $('#cadastro_usuario').click(function () {
        $.ajax({
            url: '/api/cadastrar_usuario',
            method: 'POST',
            data: {
                nome: $('#nome').val(),
                email: $('#email').val(),
                senha: $('#senha').val(),
                telefone: $('#telefone').val(),
                data_nascimento: $('#data_nascimento').val(),
                cpf: $('#cpf').val(),
            },
            success: function (response) {
                if (response.erro === 'n') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Cadastro realizado com sucesso!',
                        text: response.mensagem,
                    }).then(() => {
                        window.location.href = '/login';
                    });

                    return;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: response.mensagem,
                });
            },
            error: function (xhr) {
                const erros = xhr.responseJSON?.errors;
                const mensagem = erros
                    ? Object.values(erros).flat().join('\n')
                    : 'Não foi possível realizar o cadastro.';

                Swal.fire({
                    icon: 'error',
                    title: 'Confira os dados',
                    text: mensagem,
                });
            },
        });
    });
});
