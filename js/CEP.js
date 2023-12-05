document.addEventListener('DOMContentLoaded', function () {
    // Adiciona um listener para o evento input no campo de CEP
    document.getElementById('inputCEP').addEventListener('input', function (event) {
        // Obtém o valor atual do campo de CEP
        let cepValue = event.target.value;

        // Remove qualquer caractere que não seja número
        cepValue = cepValue.replace(/\D/g, '');

        // Adiciona a formatação desejada (por exemplo, "12345-678")
        if (cepValue.length > 5) {
            cepValue = cepValue.substring(0, 5) + '-' + cepValue.substring(5, 8);
        }

        // Atualiza o valor do campo com o CEP formatado
        event.target.value = cepValue;
    });
});