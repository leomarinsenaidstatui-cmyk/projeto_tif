$(document).ready(function () {
    $('#cadastro_local').click(function () {
        $.ajax({
            url: '/api/cadastrar_local',
            method: 'POST',
            data: {
                nome: $('#nome').val(),
                setor: $('#setor').val(),
                descricao: $('#descricao').val(),
                tipo: $('#tipo').val(),
                status: $('#status').val(),
            },
            success: function (response) {
                if (response.erro === 'n') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Cadastro realizado com sucesso!',
                        text: response.mensagem,
                    }).then(() => {
                        window.location.href = '/local';
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
