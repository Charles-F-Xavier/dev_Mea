/* Version 1.21.3 */
function revisarDigito(dvr) {
    dv = dvr + "";
    if (
            dv != "0" &&
            dv != "1" &&
            dv != "2" &&
            dv != "3" &&
            dv != "4" &&
            dv != "5" &&
            dv != "6" &&
            dv != "7" &&
            dv != "8" &&
            dv != "9" &&
            dv != "k" &&
            dv != "K"
            ) {
        Swal.fire({
            title: "Ops...",
            text: "Debe ingresar un dígito verificador válido",
            icon: "error",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok!",
        });
        return false;
    }
    return true;
}

function revisarDigito2(crut, inputId) {
    largo = crut.length;
    if (largo < 6 && largo > 0) {
        Swal.fire({
            title: "Ops...",
            text: "Debe ingresar el RUT completo",
            icon: "error",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok!",
        });
        document.getElementById(inputId).classList.remove("correct");
        document.getElementById(inputId).classList.add("incorrect");
        document.getElementById(inputId).value="";
        return false;
    }else if(largo===0){
        document.getElementById(inputId).classList.remove("incorrect");
        return true;
    }
    if (largo > 2)
        rut = crut.substring(0, largo - 1);
    else
        rut = crut.charAt(0);
    dv = crut.charAt(largo - 1);
    if (!revisarDigito(dv))
        return false;

    if (rut == null || dv == null)
        return 0;

    var dvr = "0";
    suma = 0;
    mul = 2;

    for (i = rut.length - 1; i >= 0; i--) {
        suma = suma + rut.charAt(i) * mul;
        if (mul == 7)
            mul = 2;
        else
            mul++;
    }
    res = suma % 11;
    if (res == 1)
        dvr = "k";
    else if (res == 0)
        dvr = "0";
    else {
        dvi = 11 - res;
        dvr = dvi + "";
    }
    if (dvr != dv.toLowerCase()) {
        Swal.fire({
            title: "Ops...",
            text: "El RUT ingresado no es válido, por favor verifícalo",
            icon: "error",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok!",
        });
        document.getElementById(inputId).classList.remove("correct");
        document.getElementById(inputId).classList.add("incorrect");
        document.getElementById(inputId).value="";
        return false;
    }
    return true;
}

function validarRut(inputId) {
    var texto = document.getElementById(inputId).value;
    var tmpstr = "";
    for (i = 0; i < texto.length; i++)
        if (
                texto.charAt(i) != " " &&
                texto.charAt(i) != "." &&
                texto.charAt(i) != "-"
                )
            tmpstr = tmpstr + texto.charAt(i);
    texto = tmpstr;
    largo = texto.length;

    if (largo >= 1 && largo <= 6) {
        Swal.fire({
            title: "Ops...",
            text: "El RUT ingresado es muy corto, por favor ingresa el RUT completo",
            icon: "error",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok!",
        });
        document.getElementById(inputId).classList.remove("correct");
        document.getElementById(inputId).classList.add("incorrect");
        document.getElementById(inputId).focus();
        document.getElementById(inputId).value="";
        document.getElementById(inputId).select();
        return false;
    }
    if (largo<=0){
        document.getElementById(inputId).classList.remove("incorrect");
        document.getElementById(inputId).focus();
        document.getElementById(inputId).value="";
        document.getElementById(inputId).select();
        return true;
    }

    for (i = 0; i < largo; i++) {
        if (
                texto.charAt(i) != "0" &&
                texto.charAt(i) != "1" &&
                texto.charAt(i) != "2" &&
                texto.charAt(i) != "3" &&
                texto.charAt(i) != "4" &&
                texto.charAt(i) != "5" &&
                texto.charAt(i) != "6" &&
                texto.charAt(i) != "7" &&
                texto.charAt(i) != "8" &&
                texto.charAt(i) != "9" &&
                texto.charAt(i) != "k" &&
                texto.charAt(i) != "K"
                ) {
            Swal.fire({
                title: "Ops...",
                text: "El valor ingresado no corresponde a un R.U.T válido",
                icon: "error",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Ok!",
            });
            document.getElementById(inputId).classList.add("incorrect");
            document.getElementById(inputId).value = "";
            return false;
        }
    }

    var invertido = "";
    for (i = largo - 1, j = 0; i >= 0; i--, j++)
        invertido = invertido + texto.charAt(i);
    var dtexto = "";
    dtexto = dtexto + invertido.charAt(0);
    dtexto = dtexto + "-";
    cnt = 0;

    for (i = 1, j = 2; i < largo; i++, j++) {
        if (cnt == 3) {
            dtexto = dtexto + ".";
            j++;
            dtexto = dtexto + invertido.charAt(i);
            cnt = 1;
        } else {
            dtexto = dtexto + invertido.charAt(i);
            cnt++;
        }
    }

    invertido = "";
    for (i = dtexto.length - 1, j = 0; i >= 0; i--, j++)
        invertido = invertido + dtexto.charAt(i);

    document.getElementById(inputId).value = invertido.toUpperCase();
    document.getElementById(inputId).classList.remove("incorrect");
    document.getElementById(inputId).classList.add("correct");

    if (revisarDigito2(texto, inputId))
        return true;
    return false;
}