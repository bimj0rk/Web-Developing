document.addEventListener("DOMContentLoaded", function(){
    const form = document.getElementById("registration");
    const name = document.getElementById("name");
    const user = document.getElementById("user");
    const password = document.getElementById("password");
    const confirm = document.getElementById("confirm");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");
    const gender = document.querySelectorAll("gender");

    form.addEventListener("submit", function(event){
        let error = [];

        if(name.value === "") error.push("Name musn't be empty!");
        if(user.value === "") error.push("Username musn't be empty!");
        if(password.value === "") error.push("Password musn't be empty!");
        if(confirm.value === "") error.push("Confirm password musn't be empty!");
        if(email.value === "") error.push("Email musn't be empty!");
        if(phone.value === "") error.push("Phone no. musn't be empty!");

        if(password.value !== confirm.value) error.push("Passwords MUST match.");

        let genderIsSelected = false;
        gender.forEach(input => {
            if(input.checked){
                genderIsSelected = true;
            }
        });

        if(!genderIsSelected) error.push("Select a gender, you cannot be genderless you bafoon.");

        const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if(emailRegex.test(email.value)) error.push("Email is not an email you blithering idiot.");

        const phoneRegex = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/;
        if(phoneRegex.test(phone.value)) error.push("Phone no. does not seem to be in a phone no. shape, discombobulated monkey.");

        if(error.length > 0){
            event.preventDefault();
            alert(error.join("\n"));
        }
    });
});