const cep = document.querySelector('#cep');
const endereco = document.querySelector('#endereco');
const bairro = document.querySelector('#bairro');

cep.onblur = async () => {
    if (cep.value) {
        endereco.disabled = true;
        bairro.disabled = true;

        try {
            const response = await fetch(
                `https://viacep.com.br/ws/${cep.value}/json/`
            );
            const data = await response.json();

            endereco.value = data.logradouro || '';
            bairro.value = data.bairro || '';
        } catch (err) {
            console.error(err);
        } finally {
            endereco.disabled = false;
            bairro.disabled = false;

            endereco.focus();
        }
    }
};
