require('./bootstrap');

document.getElementById("registerBtn").setAttribute("disabled", true);
let privacyChk = document.getElementById("privacyPolicy");

document.getElementById("privacyPolicy").addEventListener("click", function() {
    let isChecked = privacyChk.checked;
    if (isChecked) {
        document.getElementById("registerBtn").removeAttribute("disabled");
    } else {
        document.getElementById("registerBtn").setAttribute("disabled", true);
    }
});
