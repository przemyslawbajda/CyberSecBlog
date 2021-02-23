/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function zapis(){

    let name = document.getElementById("first_name");
    let l_name = document.getElementById("last_name");
    let zdalnie = document.getElementById("zdalnie");
    let br_date = document.getElementById("br_date");
    let email = document.getElementById("email");
    let nr = document.getElementById("contact_no");
    let about = document.getElementById("about");
    let check = document.getElementById("customCheck1");
    if(name.checkValidity() && l_name.checkValidity() && zdalnie.checkValidity() && br_date.checkValidity() && email.checkValidity() && nr.checkValidity() && about.checkValidity() && check.checkValidity()){
        
    
    
    var item = {};
    
    item.name=document.getElementById("first_name").value;
    item.lname=document.getElementById("last_name").value;
    item.zdalnie=document.getElementById("zdalnie").value;
    item.br_date=document.getElementById("br_date").value;
    item.email=document.getElementById("email").value;
    item.nr=document.getElementById("contact_no").value;
    item.about=document.getElementById("about").value;
    
    
    var dane=`Następujące dane zostaną wysłane:
        Imię:${item.name}
        Nazwisko:${item.lname}
        Forma pracy:${item.zdalnie}
        Email:${item.email}
        Numer telefonu:${item.nr}
        Data:${item.br_date}
        O sobie:${item.about}
        `;
    
    
    if (window.confirm(dane))
    {
        localStorage.setItem(item.nr,JSON.stringify(item));
        return true;
    }
    else
        return false;
    }

    
}

function edycja(){
    

    var item = JSON.parse(localStorage.getItem(document.getElementById('edit_nr').value));
    
    document.getElementById("first_name").value=item.name;
    document.getElementById("last_name").value=item.lname;
    document.getElementById("zdalnie").value=item.zdalnie;
    document.getElementById("br_date").value=item.br_date;
    document.getElementById("email").value=item.email;
    document.getElementById("contact_no").value=item.nr;
    document.getElementById("about").value=item.about;
}


function usun(){
    
    localStorage.removeItem(document.getElementById('delete').value);
    document.getElementById('delete').value="";
    
}