function CheckIfGood(){
    const name = document.getElementById("name").value;
    const user = document.getElementById("user").value;
    const password = document.getElementById("password").value;
    const confirm = document.getElementById("confirm").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;

    if(name === ""){
        alert("Name musn't be empty!");
        return false;
    }

    if(user === ""){
        alert("Username musn't be empty!");
        return false;
    }

    if(password === ""){
        alert("Password musn't be empty!");
        return false;
    }

    if(confirm === ""){
        alert("Confirm password musn't be empty!");
        return false;
    }

    if(password !== confirm){
        alert("Passwords MUST match.");
        return false;
    }

    if(email === ""){
        alert("Email musn't be empty!");
        return false;
    }

    if(phone === ""){
        alert("Phone no. musn't be empty!");
        return false
    }
    const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    if(emailRegex.test(email.value)){
        alert("Email is not an email.");
        return false;
    }

    const phoneRegex = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/;
    if(phoneRegex.test(phone.value)){
        alert("Phone number does not seem to be in a phone number shape.");
        return false;
    }

    let genderIsSelected = false;
    gender.forEach(input => {
        if(input.checked){
            genderIsSelected = true;
        }
    });

    if(!genderIsSelected){
        alert("Select a gender.");
        return false;
    } 
    
    return true;
}