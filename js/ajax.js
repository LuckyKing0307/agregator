const agent_button = document.querySelector('.agent_button');
const checker = document.querySelector('.checker1');
const agent = document.querySelector('.agent');
const me1 = document.querySelector('#me1');
checker.style.outline = 'none';
agent_button.addEventListener('click',(e)=>{
    e.preventDefault();
    console.log('aaaaaaaaaa');
    let ajax = new XMLHttpRequest();
    let method = "GET";
    let url = "../register/master_key.php";
    ajax.open(method, url, true);
    ajax.send();
    ajax.onreadystatechange = function(){
        if (this.readyState == 4&& this.status == 200) {
                console.log(this.responseText);
            if (checker.value==this.responseText) {
                document.querySelector('.check_img').style.display = 'inline';
                me1.setAttribute('checked','');
                checker.style.border = '1px solid green';
            }
            else{
                me1.removeAttribute('checked');
                checker.style.border = '1px solid red';
            }
        }
        else{
        }
    }
});


























function Agent(){
    let box = document.querySelector('.agent_check');
    if (box.checked) {
    checker.setAttribute('disabled', '');
    document.querySelector('.checker_img').style.display = 'none';
    }else{
    checker.removeAttribute('disabled');
    document.querySelector('.checker_img').style.display = 'inline';
    }
};

function myFunction() {
              // Get the checkbox
              let checkBox = document.querySelector("#me");
              // Get the output text
                let surname = document.querySelector('.surname');
                let place = document.querySelector('.place');
                let reg = document.querySelector('.reg');
                let name = document.querySelector('.name2');
                let fathername = document.querySelector('.fathername');
                let pass = document.querySelector('.pass');
                let day_pass = document.querySelector('.day_pass');
                let vu = document.querySelector('.vu');
                let day_vu = document.querySelector('.day_vu');

                let surname1 = document.querySelector('.surname1');
                let place1 = document.querySelector('.place1');
                let reg1 = document.querySelector('.reg1');
                let name1 = document.querySelector('.name1');
                let fathername1 = document.querySelector('.fathername1');
                let pass1 = document.querySelector('.pass1');
                let day_pass1 = document.querySelector('.day_pass1');
                let vu1 = document.querySelector('.vu1');
                let day_vu1 = document.querySelector('.day_vu1');
              // If the checkbox is checked, display the output text
              if (checkBox.checked){
                document.querySelector('.check_img').style.display = 'inline';
                surname1.value = surname.value;
                place1.value = place.value;
                reg1.value = reg.value;
                name1.value = name.value;
                fathername1.value = fathername.value;
                pass1.value = pass.value;
                day_pass1.value = day_pass.value;
                vu1.value = vu.value;
                day_vu1.value = day_vu.value;
              } else {
                document.querySelector('.check_img').style.display = 'none';
                surname1.value ='';
                place1.value = '';
                reg1.value = '';
                name1.value ='';
                fathername1.value ='';
                pass1.value ='';
                day_pass1.value ='';
                vu1.value ='';
                day_vu1.value ='';
              }
}