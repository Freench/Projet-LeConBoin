
// Partie administrateur : Ajout Catégorie
let btn_new_line = document.getElementById('btn-new-line');
let numero = 1;
if(btn_new_line){
    console.log("le btn est là")
    btn_new_line.addEventListener("click", function(){
        addLine(numero);
        console.log("on clique pour add des lignes")

        numero+=1;
    })
}

function addLine(numero){
    form = document.getElementById('add-categorie');
    span1 = document.createElement('span');
    span1.innerText = "Numéro d'ordre :";
    input1 = document.createElement('input');
    input1.type = "number";
    input1.name = "order[]";
    input1.value= numero;

    span2 = document.createElement('span');
    span2.innerText = "Nom critère :";
    input2 = document.createElement('input');
    input2.type = "text";
    input2.name = "values[]";
    input2.placeholder= "Nom critère";
    lineBreak = document.createElement('br');


    form.appendChild(span1);
    form.appendChild(input1);
    form.appendChild(span2);
    form.appendChild(input2);
    form.appendChild(lineBreak);
}


//Ajax
function ajax(url, params, jsFunction, jsFunctionParameters){
    var httpRequest;
    console.log(url)
    makeRequest(url, params);


    function makeRequest(url, params){
        httpRequest = new XMLHttpRequest();
        if(!httpRequest){
            console.log('Abandon: ( Impossible de créer unt instance de XMLHTTP');
            return false;
        }
        httpRequest.onreadystatechange = alertContents;
        httpRequest.open('POST', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('params=' + encodeURIComponent(params));
    }


    function alertContents(){
        try {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    var response = JSON.parse(httpRequest.responseText);
                    console.log(response, jsFunction ,jsFunctionParameters)
                    jsFunction(jsFunctionParameters, response);


                } else {
                    console.log('Il y a eu un problème avec la requête.');
                }
            }
        }
        catch(e){
            console.log("Une exception s’est produite : " + e.description);
        }
    }
};


// Générateur de sélecteur de catégorie
ajax('ajax/selectAllCategories.php', [], genererCategorieSelelecteur, document.getElementById('categorie'))

// genererCategorieSelelecteur(document.getElementById('categorie'), );


function genererCategorieSelelecteur(node, allCategories){
    let selecteur = document.createElement('select');
    selecteur.id = "selector";
    selecteur.name = "categorie";
    selecteur.innerText = "Catégorie";

    for(let cat of allCategories){
        selecteur.appendChild(categorieLine(cat['id_categorie'], cat['nom_categorie']))
    }
    node.appendChild(selecteur);

    let selector = document.getElementById('selector');
    console.log("le new selector", selector)

    selector.addEventListener("change", function(){
        let specificitiesSection = document.getElementById('specificites-section');
        if(specificitiesSection != undefined){
            specificitiesSection.innerHTML = "";
            ajax('ajax/selectSpecificityOfCategory.php',  selector.options[selector.selectedIndex].value, genereFormSpecificite, document.getElementById('specificites-section') );
        }
    })
}


function categorieLine(id, value){
    let option = document.createElement('option');
    option.value = id;
    option.innerText = value;
    return option;
}


// Modification du formulaire en fonction de la catégorie
// let selector = document.getElementById('#categorie');
// console.log(selector);
// if(selector != null){
    
// }



function genereFormSpecificite(node , specificites){
    for(let specificite of specificites){
        let input = document.createElement('input');
        input.placeholder = specificite['nom_data'];
        input.name = "valuesSpecificities[]";
        node.appendChild(input)
    }
}