import "./bootstrap";

function isValidCNPJ(cnpj) {
    cnpj = cnpj.replace(/\D/g, "");
    if (cnpj.length !== 14 || /^(\d)\1+$/.test(cnpj)) return false;

    const calc = (len) => {
        let sum = 0;
        let weight = len - 7;

        for (let i = 0; i < len; i++) {
            sum += cnpj[i] * weight--;
            if (weight < 2) weight = 9;
        }

        const mod = sum % 11;
        return mod < 2 ? 0 : 11 - mod;
    };

    return calc(12) == cnpj[12] && calc(13) == cnpj[13];
}

const wait = (seconds) =>
    new Promise((resolve) => setTimeout(resolve, seconds * 1000));

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
    const error = form.querySelector("#error");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        error.textContent = "";
        error.style.display = "none";

        if (!isValidCNPJ(cnpjInput.value)) {
            error.textContent =
                "CNPJ inválido. Por favor, verifique o número e tente novamente.";
            error.style.display = "block";
            return;
        }

        loading.style.display = "flex";
        await wait(2);
        try {
            const response = await axios.post(
                "/api/empresas",
                JSON.stringify({
                    nome: nomeInput.value,
                    cnpj: cnpjInput.value,
                    icms_pago: parseInt(icmsPagoInput.value.replace(/\D/g, "")),
                    creditos_possiveis: parseInt(
                        creditosPossiveisInput.value.replace(/\D/g, ""),
                    ),
                }),
                {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                },
            );

            if (response.status === 201) {
                const data = response.data;
                window.location.href = `/empresas/${data.id}`;
            } else {
                error.textContent =
                    "Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.";
                error.style.display = "block";
            }
        } catch (err) {
            error.textContent =
                "Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.";
            error.style.display = "block";
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
