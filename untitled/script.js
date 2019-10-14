let tab = new Array('leo@orange.fr','lina@hotmail.fr','bernard@orange.fr','kirl@gmail.com','jacquie@gmail.com','patrick@hotmail.fr','michel@gmail.com');

let hebergeur = prompt('Nom de l\'hébergeur : ');
let regex = new RegExp("*@"+hebergeur+"\.*");
alert(tab.filter(value => regex));