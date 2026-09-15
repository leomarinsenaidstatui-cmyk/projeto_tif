$(document).ready(function () {
    $('#salvar_mensagem').click(function () {
        const botao = $(this);

        botao.prop('disabled', true).text('Salvando...');

        $.ajax({
            url: '/api/mensagens-boas-vindas',
            method: 'POST',
            data: {
                nome: $('#nome').val(),
                mensagem: $('#mensagem').val(),
            },
            success: function (response) {
                $('#nome').val('');
                $('#mensagem').val('');

                Swal.fire({
                    icon: 'success',
                    title: 'Obrigado pela visita!',
                    text: response.mensagem,
                }).then(() => {
                    window.location.href = '/cadastro_usuario';
                });
            },
            error: function (xhr) {
                const erros = xhr.responseJSON?.errors;
                const mensagem = erros
                    ? Object.values(erros).flat().join('\n')
                    : 'Não foi possível salvar sua mensagem.';

                Swal.fire({
                    icon: 'error',
                    title: 'Confira os dados',
                    text: mensagem,
                });
            },
            complete: function () {
                botao.prop('disabled', false).text('Enviar mensagem');
            },
        });
    });
});
