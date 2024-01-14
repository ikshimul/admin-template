const input = document.querySelector("#phone");
const iti = window.intlTelInput(input, {
    autoPlaceholder: "aggressive",
    hiddenInput: "phone_number",
    initialCountry: "my",
    separateDialCode: true,
    utilsScript: "../assets/libs/intlTelInput/js/utils.js",
    customPlaceholder: function (
        selectedCountryPlaceholder,
        selectedCountryData
    ) {
        return "e.g. " + selectedCountryPlaceholder;
    },
});
const button = document.querySelector("#card-button");
// function checkForm() {
//     if (input.value.trim()) {
//         if (iti.isValidNumber()) {
//             $("#phone-number-invalid-message").text("");
//             var ChangeGetCode = iti.getSelectedCountryData();
//             console.log(ChangeGetCode.dialCode);
//             @this.set('dialCode', ChangeGetCode.dialCode);
//             return true;
//         } else {
//             $("#phone-number-invalid-message").text("Phone number invalid");
//             return false;
//         }
//     }
// }
$("#phone").blur(function () {
    checkForm();
});
document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook("message.processed", (message, component) => {
        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
            autoPlaceholder: "aggressive",
            hiddenInput: "phone_number",
            initialCountry: "my",
            separateDialCode: true,
            utilsScript: "../assets/libs/intlTelInput/js/utils.js",
            customPlaceholder: function (
                selectedCountryPlaceholder,
                selectedCountryData
            ) {
                return "e.g. " + selectedCountryPlaceholder;
            },
        });
        const button = document.querySelector("#card-button");
        // function checkForm() {
        //     if (input.value.trim()) {
        //         if (iti.isValidNumber()) {
        //             $("#phone-number-invalid-message").text("");
        //             const valid_number = document.querySelector(
        //                 "input[name=phone_number]"
        //             ).value;
        //             console.log(valid_number);
        //             return true;
        //         } else {
        //             $("#phone-number-invalid-message").text(
        //                 "Phone number invalid"
        //             );
        //             return false;
        //         }
        //     }
        // }
        $("#phone").blur(function () {
            checkForm();
        });
    });
});
