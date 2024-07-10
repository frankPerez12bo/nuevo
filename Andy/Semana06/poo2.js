class Persona{
    constructor(dni,nom,ape,correo){
        this.id=dni;
        this.nombre=nom;
        this.apellido=ape;
        this.email=correo;
    }

    trabajar(){
        return "Trabaja en AACD";
    }

}

let personaje1= new Persona(75990566,"Juan","Adarmes","juan@gmail.Com");

document.write(personaje1.nombre);
document.write(personaje1.trabajar());

let.personaje2= new Persona(78990655,"Andre","Sosa","andre@gamil.como");
document.write(personaje2.nombre);
document.write(personaje1.trabajar());