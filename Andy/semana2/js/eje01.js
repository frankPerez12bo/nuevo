let semana=["domingo",
    "lunes",
    "martes",
    "miercoles",
    "jueves",
    "viernes",
    "sabado"
    ];
    let user=parseInt(prompt("diga un numero entre 0 a 6"));
    document.write("<br>");
    document.write("<br>");
    document.write("<br>");
    if(user == 0){
    document.write("es : "+ semana[0]);
    }else if(user ==1){
    document.write("es : "+ semana[1]);
    }else if(user ==2){
    document.write("es : "+ semana[2]);
    }else if(user ==3){
    document.write("es : "+ semana[3]);
    }else if(user ==4){
    document.write("es : "+ semana[4]);
    }else if(user ==5){
    document.write("es : "+ semana[5]);
    }else if(user ==6){
    document.write("es : "+ semana[6]);
    }else if(user > 6){
    document.write("no es un dia de la semana");
    };