import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import "../scss/app.scss";

import * as bootstrap from "bootstrap";

import Inputmask from "inputmask";

document.addEventListener("DOMContentLoaded", function () {
    var phoneInput = document.getElementById("phone");

    console.log(phoneInput);

    if (phoneInput != null || phoneInput.textContext == "") {
        Inputmask("(99) 99999-9999").mask(phoneInput);
    }

    var cpfInput = document.getElementById("cpf");
    if (cpfInput != null) {
        Inputmask("999.999.999-99").mask(cpfInput);
    }

    var cepInput = document.getElementById("cep");
    if (cepInput != null) {
        Inputmask("99999-999").mask(cepInput);
    }
});
