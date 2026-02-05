import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("cadastro-empresa");
    if (!form) return;

    const nomeInput = form.querySelector('input[name="nome"]');
    const cnpjInput = form.querySelector('input[name="cnpj"]');
    const icmsPagoInput = form.querySelector('input[name="icms_pago"]');
    const creditosPossiveisInput = form.querySelector(
        'input[name="creditos_possiveis"]',
    );

    const loading = form.querySelector("#loading");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        loading.style.display = "flex";
        try {
            const response = await axios.post(
                "/api/empresa",
                JSON.stringify({
                    nome: nomeInput.value,
                    cnpj: cnpjInput.value,
                    icms_pago: icmsPagoInput.value.replace(/\D/g, ""),
                    creditos_possiveis: creditosPossiveisInput.value.replace(
                        /\D/g,
                        "",
                    ),
                }),
                {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                },
            );

            if (response.ok) {
                alert("Enviado com sucesso!");
            }
        } catch (error) {
            alert("Ocorreu um erro ao enviar o formulário.");
        }

        loading.style.display = "none";
    });

    function maskCNPJ(value) {
        return value
            .replace(/\D/g, "")
            .replace(/^(\d{2})(\d)/, "$1.$2")
            .replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
            .replace(/\.(\d{3})(\d)/, ".$1/$2")
            .replace(/(\d{4})(\d)/, "$1-$2")
            .slice(0, 18);
    }

    if (cnpjInput) {
        cnpjInput.addEventListener("input", (e) => {
            e.target.value = maskCNPJ(e.target.value);
        });
    }

    function maskMoney(value) {
        const numeric = value.replace(/\D/g, "");
        const number = (Number(numeric) / 100).toFixed(2);

        return number.replace(".", ",").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function applyMoneyMask(input) {
        if (!input) return;

        input.addEventListener("input", (e) => {
            let valor = input.value.replace(/\D/g, "");
            if (!valor) {
                input.value = "R$ 0,00";
                return;
            }

            valor = (parseInt(valor, 10) / 100).toFixed(2);
            valor = valor.replace(".", ",");
            valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            input.value = `R$ ${valor}`;
        });
    }

    applyMoneyMask(icmsPagoInput);
    applyMoneyMask(creditosPossiveisInput);
});
