const form = document.getElementById("form");
const password1 = document.getElementById("password1");
const password2 = document.getElementById("password2");

form.addEventListener("submit", e => {
    e.preventDefault();
    validateInputs();
});

const setError = (Element, message) => {
    const inputControl = Element.parentElement;
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = message;
    inputControl.classList.add("error");
    inputControl.classList.remove("success");
}
const setSuccess = Element => {
    const inputControl = Element.parentElement;
    const errorDisplay = inputControl.querySelector(".error");

    errorDisplay.innerText = "";
    inputControl.classList.add("success");
    inputControl.classList.remove("error");
};

const validateInputs = () => {
    const password1value = password1.value.trim();
    const password2value = password2.value.trim();
    0
    if (password1value === "") {
        setError(password1, "Password is required");
    } else {
        setSuccess(password1);
    }

    if (password2value === "") {
        setError(password2, "Confirm your password");
    } else if (password2value !== password1value) {
        setError(password2, "Passwords doesn't match");
    } else {
        setSuccess(password2);
    }
}