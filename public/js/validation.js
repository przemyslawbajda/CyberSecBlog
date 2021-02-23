function checkField(fieldId,objRegex) {
    const objField = document.getElementById(fieldId);
    return objRegex.test(objField.value);
}

function checkRadio(radioName) {
    const obj = document.getElementsByName(radioName);
    for(let i=0;i<obj.length;i++){
        const chosen = obj[i].checked;
        if(chosen)
            return true;
    }
    return false;
}

function checkBox(boxId) {
    const obj = document.getElementById(boxId);
    return !!obj.checked;
}

function whichRadio(radioName) {
    const obj = document.getElementsByName(radioName);
    let i = 0;
    let chosen = false;
    while (i<obj.length && !chosen){
        chosen=obj[i].checked;
        if(chosen)
            return obj[i].value;
        else
            i++;
    }
}

function whichCheckBox(checkboxName) {
    const obj = document.getElementsByName(checkboxName);
    let i = 0;
    let chosen = false;
    let str = "";
    while (i<obj.length){
        chosen=obj[i].checked;
        if(chosen)
            str+=obj[i].value+" ";
        i++;
    }
    return str;
}

function checkBirthDate() {
    const form = document.getElementById('form1');
    const birthDate = form.inputBirthDate.value;
    const ageRE = new RegExp("^((((19|20)[0-9][0-9]))-(0[1-9]|1[0-2])-((0|1)[0-9]|2[0-9]|3[0-1]))$");

    if(checkField('inputBirthDate',ageRE)){
        const parts = birthDate.split("-");
        const year=parts[0];
        const month=parts[1];
        const day=parts[2];
        const currentData=new Date();

        if (currentData.getFullYear() - year < 18)
            return false;
        else if (currentData.getFullYear() - year === 18) {
            //for example: 2018-06-11 and 2000-07-15, will turned 18 on 2018-07-15
            if (currentData.getMonth() < month-1)
                return false;
            else if (currentData.getMonth() === month-1) {
                //for example: 2018-06-11 and 2000-06-15, will turned 18 on 2018-06-15
                if (currentData.getDate() < day)
                    return false;
            }
        }
        return true;
    }
}

function checkIfCorrect() {
    let ok = true;

    const name = new RegExp("(^([A-ZĄĆÓŁŃĘŻŹ][a-ząćółężź]{1,20})$)|(^([A-ZĄĆÓŁŃĘŻŹ][a-ząćółężź]{1,20} [A-ZĄĆÓŁŃĘŻŹ][a-ząćółężź]{1,20})$)");
    const surname=new RegExp("(^([A-ZĄĆÓŁŃĘŻŹ][a-ząćółężź]{1,30})$)|(^([A-ZĄĆÓŁŃĘŻŹ][a-ząćółężź]{1,30}-[A-ZĄĆÓŁŃĘŻŹ][a-ząćółężź]{1,30})$)");
    const email=new RegExp("^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+");
    const phoneNumber=new RegExp("^[0-9]{9}$");

    let caption = "";

    const inputName = document.getElementById('inputName').value;
    const inputSurname=document.getElementById('inputSurname').value;
    const inputEmail=document.getElementById('inputEmail').value;
    const inputPhoneNumber=document.getElementById('inputPhoneNumber').value;

    if(!checkField('inputName',name) && inputName!==""){
        ok=false;
        caption+="imię\n";
    }

    if(!checkField('inputSurname',surname) && inputSurname!==""){
        ok=false;
        caption+="nazwisko\n";
    }

    if(!checkField('inputEmail',email) && inputEmail!==""){
        ok=false;
        caption+="adres e-mail\n";
    }

    if(!checkField('inputPhoneNumber',phoneNumber) && inputPhoneNumber!==""){
        ok=false;
        caption+="numer telefonu\n";
    }

    if(!checkBirthDate()){
        ok=false;
        caption+="data urodzenia - musisz mieć ukończone 18 lat!\n";
    }

    if(!ok){
        alert("Następujące pola wypełniłeś/aś niepoprawnie:\n"+caption);
        return false;
    }

    return true;
}

function checkIfMissing() {
    let ifCheckbox1 = false;
    let ok = true;

    const form = document.getElementById('form1');
    const checkbox = document.getElementsByName('interests');

    let caption = "";

    if(form.inputName.value===""){
        caption+="imię\n";
        ok=false;
    }

    if(form.inputSurname.value===""){
        caption+="nazwisko\n";
        ok=false;
    }

    if(form.inputBirthDate.value===""){
        caption+="data urodzenia\n";
        ok=false;
    }

    if(form.inputEmail.value===""){
        caption+="adres e-mail\n";
        ok=false;
    }

    if(form.inputPhoneNumber.value===""){
        caption+="numer telefonu\n";
        ok=false;
    }

    if(form.inputMessage.value===""){
        caption+="wiadomość\n";
        ok=false;
    }

    for(let i=0;i<checkbox.length;i++){
        if(checkBox(checkbox[i].value)){
            ifCheckbox1=true;
        }
    }

    if(!checkRadio('help')){
        caption+="ile razy w tygodniu możesz pomóc\n";
        ok=false;
    }

    if(!checkBox('customCheck1')){
        caption+="czy zapoznałeś/aś się z regulaminem\n";
        ok=false;
    }

    if(!ifCheckbox1){
        caption+="zainteresowania\n";
        ok=false;
    }

    if(!ok){
        alert("Nie wypełniłeś/aś następujących pól:\n"+caption);
        return false;
    }

    return true;
}

function showData() {
    if(checkIfMissing()){
        if(checkIfCorrect()){
            const form = document.getElementById('form1');

            let caption="Na pewno chcesz wyslać poniższe dane?\n";

            caption+="Imię: "+form.inputName.value+"\n";
            caption+="Nazwiskp: "+form.inputSurname.value+"\n";
            caption+="Data urodzenia: "+form.inputBirthDate.value+"\n";
            caption+="Adres e-mail: "+form.inputEmail.value+"\n";
            caption+="Numer telefonu: "+form.inputPhoneNumber.value+"\n";
            caption+="Wiadomość: "+form.inputMessage.value+"\n";
            caption+="Zainteresowania: "+whichCheckBox('interests')+"\n";
            caption+="Ile razy w tygodniu możesz pomóc: "+whichRadio('help')+"\n";
            caption+="Czy zapoznałeś/aś się z regulaminem: "+whichCheckBox('customCheck1')+"\n";

            if(window.confirm(caption)){
                saveLocal();
                let el = document.getElementById('showLocalStorage');
                el.innerHTML="";
                return true;
            }
        }
    }
    return false;
}

function saveLocal() {
    localStorage.clear();
    const item = {};

    item.inputName=document.getElementById('inputName').value;
    item.inputSurname=document.getElementById('inputSurname').value;
    item.inputBirthDate=document.getElementById('inputBirthDate').value;
    item.inputEmail=document.getElementById('inputEmail').value;
    item.inputPhoneNumber=document.getElementById('inputPhoneNumber').value;
    item.inputMessage=document.getElementById('inputMessage').value;
    item.help=whichRadio('help');
    item.interests=whichCheckBox('interests');
    item.customCheck1=whichCheckBox('customCheck1');


    let list = JSON.parse(localStorage.getItem('form'));

    if(list===null)
        list=[];

    list.push(item);
    localStorage.setItem('form',JSON.stringify(list));
}

function showLocal() {
    let str = "<h5>Dane z formularza</h5>";
    let el = document.getElementById('showLocalStorage');
    const list = JSON.parse(localStorage.getItem('form'));

    if(list===null)
        str+="Nie przesłałeś/aś jeszcze wypełnionego formularza!<br/>";
    else{
        str+="Imię: "+list[0].inputName+"<br/>";
        str+="Nazwisko: "+list[0].inputSurname+"<br/>";
        str+="Data urodzenia: "+list[0].inputBirthDate+"<br/>";
        str+="Adres e-mail: "+list[0].inputEmail+"<br/>";
        str+="Numer telefonu: "+list[0].inputPhoneNumber+"<br/>";
        str+="Zainteresowania: "+list[0].interests+"<br/>";
        str+="Mogę pomóc: "+list[0].help+" razy w tygodniu<br/>";
        str+="Inne uwagi: "+list[0].inputMessage+"<br/>";
        str+="Czy zapoznałem/am się z regulaminem: "+list[0].customCheck1+"<br/>";

        str+="<br/><button class=\"btn btn-lg btn-primary btn-block text-uppercase\" onclick=\"editLocal()\">EDYTUJ DANE</button>";
        str+="<br/><button class=\"btn btn-lg btn-primary btn-block text-uppercase\" onclick=\"deleteLocal()\">USUŃ DANE</button><br/>";
    }

    el.innerHTML=str;
}

function editLocal() {
    if(confirm("Edytować dane?")){
        let list = JSON.parse(localStorage.getItem('form'));

        document.getElementById('inputName').value=list[0].inputName;
        document.getElementById('inputSurname').value=list[0].inputSurname;
        document.getElementById('inputBirthDate').value=list[0].inputBirthDate;
        document.getElementById('inputEmail').value=list[0].inputEmail;
        document.getElementById('inputPhoneNumber').value=list[0].inputPhoneNumber;
        document.getElementById('inputMessage').value=list[0].inputMessage;

        if(list[0].customCheck1==="wybrany ")
            document.getElementById('customCheck1').checked=true;

        const interests = list[0].interests;
        const parts=interests.split(" ");

        document.getElementById('zwierzeta').checked=false;
        document.getElementById('film').checked=false;
        document.getElementById('sport').checked=false;
        document.getElementById('inne').checked=false;

        for(let i=0;i<parts.length;i++){
            switch (parts[i]) {
                case 'zwierzeta':
                    document.getElementById('zwierzeta').checked=true;
                    break;
                case 'film':
                    document.getElementById('film').checked=true;
                    break;
                case 'sport':
                    document.getElementById('sport').checked=true;
                    break;
                case 'inne':
                    document.getElementById('inne').checked=true;
                    break;
            }
        }

        switch (list[0].help) {
            case '1-2':
                document.getElementById('help1').checked=true;
                break;
            case '3-4':
                document.getElementById('help2').checked=true;
                break;
            case '5-7':
                document.getElementById('help3').checked=true;
                break;
        }

        list.splice(0,1);
        let str = "<h5>Dane z formularza</h5>";
        let el = document.getElementById('showLocalStorage');
        str+="Właśnie edytujesz dane z formularza!<br/>";
        el.innerHTML=str;

        localStorage.setItem('form',JSON.stringify(list));
        if (localStorage.getItem('form')==="[]")
            localStorage.clear();
    }
}

function deleteLocal() {
    localStorage.clear();
    showLocal();
}
































