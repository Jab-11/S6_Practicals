var uname = document.getElementById('name');
var dob = document.getElementById('dob');
var email = document.getElementById('email');
var mobile = document.getElementById('mobile');
var address = document.getElementById('address');
var state = document.getElementById('state');
var img = document.getElementById('img');
var imgSrc = img.files.length > 0 ? window.URL.createObjectURL(img.files[0]) : '';

function toggleVisibility() {
    var gender = document.querySelectorAll('input[name="gender"]');
    var gendervalue;
    for (const g of gender){
        if(g.checked){
            gendervalue = g;
        }
    }
    var education = document.querySelectorAll('input[name="education"]');
    var ed_value = '';
    for (const e of education) {
        if (e.checked) {
            ed_value += e.id + ', ';
        }
    }

    //Validation
    var nameValidMessage = document.getElementById('name_valid');
    var dobValidMessage = document.getElementById('dob_valid');
    var genderValidMessage = document.getElementById('gender_valid');
    var emailValidMessage = document.getElementById('email_valid');
    var mobileValidMessage = document.getElementById('mobile_valid');
    var addressValidMessage = document.getElementById('address_valid');
    var stateValidMessage = document.getElementById('state_valid');
    var edValidMessage = document.getElementById('ed_valid');
    var imgValidMessage = document.getElementById('img_valid');
    
    //name validation
    if (uname.value.trim() === '') {
        uname.style.border = '1px solid red';
        nameValidMessage.textContent = '*Name is required';
        nameValidMessage.style.display = 'block';
        return;
    } else {
        uname.style.border = '1px solid black';
        nameValidMessage.style.display = 'none';
    }
    
    //dob validation
    var currentDate = new Date();
    var inputDate = new Date(dob.value);
    var age = currentDate.getFullYear() - inputDate.getFullYear();
    if (dob.value.trim() === '') {
        dob.style.border = '1px solid red';
        dobValidMessage.textContent = '*Date of birth is required';
        dobValidMessage.style.display = 'block';
        return;
    } else if (age < 16) {
        dob.style.border = '1px solid red';
        dobValidMessage.textContent = '*Age must be greater than 16';
        dobValidMessage.style.display = 'block';
        return;
    } else {
        dob.style.border = '1px solid black';
        dobValidMessage.style.display = 'none';
    }

    //gender validation    
    if (gendervalue === undefined){
        genderValidMessage.textContent = '*Gender is required';
        genderValidMessage.style.display = 'block';
        return;
    } else {
        genderValidMessage.textContent = '*Gender is required';
        genderValidMessage.style.display = 'none';
    }

    //email validation
    if (email.value === '') {
        email.style.border = '1px solid red';
        emailValidMessage.textContent = '*Email is required';
        emailValidMessage.style.display = 'block';
        return;
    } else {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
     
        if (!emailRegex.test(email.value)) {
            email.style.border = '1px solid red';
            emailValidMessage.textContent = '*Invalid email format. Please use the format example@example.com';
            emailValidMessage.style.display = 'block';
            return;
        } else {
            email.style.border = '1px solid black';
            emailValidMessage.style.display = 'none';
        }
    }

    //mobile validation
    if(mobile.value === ''){
        mobile.style.border = '1px solid red';
        mobileValidMessage.textContent = '*Mobile No. is required';
        mobileValidMessage.style.display = 'block';
        return;
    }else{
        var mobileregex = /^[\d]{10}$/;

        if(!mobileregex.test(mobile.value)){
            mobile.style.border = '1px solid red';
            mobileValidMessage.textContent = '*Invalid mobile number. Please enter a 10-digit number.';
            mobileValidMessage.style.display = 'block';
            return;
        }else{
            mobile.style.border = '1px solid black';
            mobileValidMessage.style.display = 'none';
        }
    }

    //address validation
    if (address.value.trim() === '') {
        address.style.border = '1px solid red';
        addressValidMessage.textContent = '*Address is required';
        addressValidMessage.style.display = 'block';
        return;
    } else {
        address.style.border = '1px solid black';
        addressValidMessage.style.display = 'none';
    }

    //state validation
    if (state.value.trim() === '') {
        state.style.border = '1px solid red';
        stateValidMessage.textContent = '*State is required';
        stateValidMessage.style.display = 'block';
        return;
    } else {
        state.style.border = '1px solid black';
        stateValidMessage.style.display = 'none';
    }

    //education validation
    if(ed_value === ''){
        // educatio.style.border = '1px solid red';
        edValidMessage.textContent = '*Education is required';
        edValidMessage.style.display = 'block';
        return;
    }else{
        edValidMessage.style.display = 'none';
    }

    //image validation
    console.log(imgSrc);
    console.log(img);
    if(img.files.length === 0){
        console.log(imgSrc);
        console.log("VALIDATIon img");
        imgValidMessage.textContent = '*Image is required';
        imgValidMessage.style.display = 'block';
        return;
    }else{
        imgValidMessage.style.display = 'none';
    }

    console.log("VALIDATION COMPLETE");
    document.getElementById("name_info").textContent = uname.value;
    document.getElementById("dob_info").textContent = dob.value;
    document.getElementById("gender_info").textContent = gendervalue.value;
    document.getElementById("mail_info").textContent = email.value;
    document.getElementById("mobile_info").textContent = mobile.value;
    document.getElementById("address_info").textContent = address.value;
    document.getElementById("state_info").textContent = state.value;
    document.getElementById("education_info").textContent = ed_value;
    document.getElementById("uimg").src = URL.createObjectURL(img.files[0]);   
    
    var form = document.getElementById('form');
    var info = document.getElementById('info');

    form.style.display = 'none';
    info.style.display = 'block';

    info.innerHTML = displayText;
}