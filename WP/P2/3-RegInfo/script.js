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