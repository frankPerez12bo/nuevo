let productos = [
    {
        id : 1,
        nombre : "Obra Juanito",
        descripcion : "Obra literaria de una aventura.",
        cantidad : 570,
        precio : 12.50,
        img : "https://images.playground.com/82a1886689d24e9cbf92a863de8bbf90.jpeg"
    },
    {
        id : 2,
        nombre : "Obra Napoleon",
        descripcion : "Obra literaria de la guerra de la revolucion en Francia.",
        cantidad : 770,
        precio : 10.50,
        img : "https://images.playground.com/523c84800e454ac0a7016b7286abda87.jpeg"
    },
    {
        id : 3,
        nombre : "Obra Platero y Yo",
        descripcion : "Obra literaria de las aventuras de un español con su mejor amigo que es asno.",
        cantidad : 220,
        precio : 18.50,
        img : "https://images.playground.com/80630b17f13c46b88a1dc6d54c27bd25.jpeg"
    },
    {
        id : 4,
        nombre : "Cien años de soledad",
        descripcion : "Publicado en 1967,esta novela es un pilar del realismo mágico y narra la historia de la famila Buendía en el el pueblo ficticio de Maconodo.",
        cantidad : 220,
        precio : 20.50,
        img : "https://images.playground.com/d82be9889b7f41c4b3602cc9a0a4db8a.jpeg"
    },
    {
        id : 5,
        nombre : "Matar a un ruiseñor",
        descripcion : "Publicado en 1960,es una novela distópica sobre un futuro totalario donde el gobierno controla todos los aspectos de la vida y la verdad es manipulada.",
        cantidad : 20,
        precio : 7.50,
        img : "https://tse3.mm.bing.net/th?id=OIP.rWhbY2uEzJH1xuR_lDsbegHaD5&pid=Api&P=0&h=180"
    },
    {
        id : 6,
        nombre : "En busca del Tiempo perdido",
        descripcion : "Publicado entre 1913 u 1927,esta serie de siete volúmenes explora la memoria,el tiempo y la experencia personal a través de la vida del narrador.",
        cantidad : 75,
        precio : 8.90,
        img : "https://images.playground.com/325ef2cf02f04b15a6bceed3e04e84c5.jpeg"
    },
    {
        id : 7,
        nombre : "La Odisea",
        descripcion : "Un poema épico griego,escrito alradedor del siglo VIII a.C.,que narra las aventuras de Odiseo(Ulises) en su regreso a casa después de la Guerra de Troya.",
        cantidad : 55,
        precio : 18.90,
        img : "https://images.playground.com/d6d4e2fc8a31420d8b5e20eb8d5b8c24.jpeg"
    },
    {
        id : 8,
        nombre : "El Gran Gatsby",
        descripcion : "Publicado en 1925,esta novela examina el sueño americano y la decandencia moral a través de la vida del enigmático Jay Gatsby y su amor por Daisy Buchanan.",
        cantidad : 95,
        precio : 11.90,
        img : "https://images.playground.com/5c4673639f6144f4a86fa1996ca44d16.jpeg"
    },
    {
        id : 9,
        nombre : "El metamorfosis",
        descripcion : "Publicado en 1915,es una novela corta sobre Gregor Samsa,quien se despierta ina mañana convertido en un insecto gigante,explorando temas de alienación y deshumanización.",
        cantidad : 155,
        precio : 21.70,
        img : "https://tse4.mm.bing.net/th?id=OIP.i7Co-_uepnqacgo9X7Lp2wHaMI&pid=Api&P=0&h=180"
    },
    {
        id : 10,
        nombre : "El señor de los anillos",
        descripcion : "Publicado en 1954 y 1955,es una trilogía de fantasia épica sobre la lucha contra el mal en la tierra media,centrada en él viaje del hobbot Frodo Bolsón para destuir el anillo Unico.",
        cantidad : 555,
        precio : 55.20,
        img : "https://images.playground.com/2c45bf3c01b547b7b13a0c8c5f453b98.jpeg"
    },
    {
        id : 11,
        nombre : "Los miserables",
        descripcion : "Publicado en 1862,esta novela épica sigui las vidas de varios personajes,particularmente Jean Valjean,en la Francia del siglo XIX,y aborda temas de justicia,amor y redención.",
        cantidad : 37,
        precio : 10.10,
        img : "https://tse1.mm.bing.net/th?id=OIP.61nESaZm7Wu3QOdXzBBomwAAAA&pid=Api&P=0&h=180"
    },
    {
        id : 12,
        nombre : "Las mil y una noches",
        descripcion : "Una colección de cuentos populares del Medio Oriente,recopilados durante la Edad de Oro Islámica,que incluyeb historias famosas como 'Aladino y lámpara maravillosa' y 'Simbad ul marino'.",
        cantidad : 557,
        precio : 40.10,
        img : "https://tse2.mm.bing.net/th?id=OIP.Lt7I0mBzOYmLxk2x0F0IMAHaEK&pid=Api&P=0&h=180"
    },
    {
        id : 13,
        nombre : "La divina comedia",
        descripcion : "Escrito en siglo XIV,es unpoema épico que describe el viaje del autor a través del infierno,el Purgatorio y el Paraiso,y es una alegoría de la vida después de la muerte.",
        cantidad : 28,
        precio : 9.70,
        img : "https://tse1.mm.bing.net/th?id=OIP.UxVuai1FoJdpdHPiXHz-MAHaLi&pid=Api&P=0&h=180"
    },
    {
        id : 14,
        nombre : "El retrato de Dorian Gray",
        descripcion : "Publicada en 1890,cuenta la historia de Dorian Gray ,un joven cuya belleza se preservera mientras un retrato suyo envejece y se corrompe,explorando temas de hedonismo y moralidad.",
        cantidad : 78,
        precio : 7.70,
        img : "https://images.playground.com/36a5243fdfbc405b91fbf28ce7abc5c5.jpeg"
    },
    {
        id : 15,
        nombre : "Las uvas de la ira",
        descripcion : "Publicada en 1939,narra la historia de la Familia Joad durante la Gran Depresión ,mientras migran de Oklhoma a California en bisca de una vida mejor.",
        cantidad : 81,
        precio : 5.20,
        img : "https://tse4.mm.bing.net/th?id=OIP.pmqPlK_9FSzmYpZBTTgabwAAAA&pid=Api&P=0&h=180"
    },
    {
        id : 16,
        nombre : "Lolita",
        descripcion : "Publicada en 1955,es una contrvertida novela sobre Humbert Humbert,un hombre de mediana edad obsesionado con una niña de doce años llamada Dolores Haze,a quien apoda 'Lolita'.",
        cantidad : 18,
        precio : 22.20,
        img : "https://images.playground.com/d60e57d341d0481dadfa9a490e7b093d.jpeg"
    },
    {
        id : 17,
        nombre : "El ruido de la furia",
        descripcion : "Publicada en 1929,es una novela compleja que utiliza múltiples perspectivas para cantar de decadencia de la familia Compson en el sue de Estados Unidos.",
        cantidad : 8,
        precio : 8.20,
        img : "https://tse1.mm.bing.net/th?id=OIP.Dxnm17uJQEdwpTLBd0JWQAHaMD&pid=Api&P=0&h=180"
    },
    {
        id : 18,
        nombre : "A sangre fria",
        descripcion : "Publicada en 19,es una novela de no ficción que narra el brutal asesinato de una familia en Kansas y las consecuencias para los asesinos,explorando el impacto del crimen en la comunidad.",
        cantidad : 78,
        precio : 18.70,
        img : "https://images.playground.com/b12afaee248a46adb3cc503ee29280ed.jpeg"
    }
];