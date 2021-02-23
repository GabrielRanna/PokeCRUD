const capitalize = (s) => {
    if (typeof s !== 'string') return ''
    return s.charAt(0).toUpperCase() + s.slice(1)
  }
  

function titleCase(str) {
    var splitStr = str.toLowerCase().split(' ');
    for (var i = 0; i < splitStr.length; i++) {
        // You do not need to check if i is larger than splitStr length, as your for does that for you
        // Assign it back to the array
        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
    }
    // Directly return the joined string
    return splitStr.join(' '); 
}
 

let tipo1 = capitalize($(".tipo1").attr("value"));
let tipo2 = capitalize($(".tipo2").attr("value"));

let opcao1 = $(".tipo1").prop('value', tipo1);
if ($(".tipo1 option").val() == tipo1){
    $(this).attr("selected", "selected");
}

if ( $(".shiny-pokemon").attr('value') == "sim" ){
    $(".shiny-pokemon .shiny").attr("selected", "selected");
}
else{
    $(".shiny-pokemon .not-shiny").attr("selected", "selected");
}

let opcao2 = $(".tipo2").prop('value', tipo2);
if ($(".tipo1 option").val() == tipo2){
    $(this).attr("selected", "selected");
}

let sexo = capitalize($(".sexo-pokemon").attr("value"));
console.log(sexo)
let sexo_opcao = $(".sexo-pokemon").prop('value', sexo)
if ($(".sexo-pokemon option").val() == sexo){
    $(this).attr("selected", "selected");
}

function createCORSRequest(method, url) {
    var xhr = new XMLHttpRequest();
    if ("withCredentials" in xhr) {
      // XHR for Chrome/Firefox/Opera/Safari.
      xhr.open(method, url, true);
    } else if (typeof XDomainRequest != "undefined") {
      // XDomainRequest for IE.
      xhr = new XDomainRequest();
      xhr.open(method, url);
    } else {
      // CORS not supported.
      xhr = null;
    }
    return xhr;
  }

  function getTitle(text) {
    return text.match("<title>(.*)?</title>")[1];
  }
  // Make the actual CORS request.
  function makeCorsRequest() {
    // This is a sample server that supports CORS.
    var url =
      "http://html5rocks-cors.s3-website-us-east-1.amazonaws.com/index.html";
    var xhr = createCORSRequest("GET", url);
    if (!xhr) {
      alert("CORS not supported");
      return;
    }
    // Response handlers.
    xhr.onload = function() {
      var text = xhr.responseText;
      var title = getTitle(text);
      alert("Response from CORS request to " + url + ": " + title);
    };
    xhr.onerror = function() {
      alert("Woops, there was an error making the request.");
    };
    xhr.send();
  }

 $(".nome-input").change(function(){
    var url = "https://pokeapi.co/api/v2/pokemon/" + $(".nome-input").val().toLowerCase();
    var urldescription = "https://pokeapi.co/api/v2/pokemon-species/" + $(".nome-input").val().toLowerCase();
      $.ajax({
        url: url,
        dataType: "json",
        method: "GET",
        success: function(data) {
          name = data.forms[0].name,
          foto = data.sprites.front_default,
          id = data.id,
          types = [],
          abilities = [];
          for (var i = 0; i < data.types.length; i++) {
              var type = data.types[i].type.name;
              types.push(type);
          }

          for (var i = 0; i < data.abilities.length; i++) {
            var ability = data.abilities[i].ability.name;
            abilities.push(ability);
          }

          var newValue = titleCase(abilities[0].replace('-', ' '));
          
          console.log(newValue)
          $('input[name ="photo"]').val(foto);
          $('input[name ="id_pokedex"]').val(id);
          $('input[name ="habilidade"]').val(newValue);
          tipo1 = capitalize(types[0])
          console.log(tipo1)
          tipo2 = capitalize(types[1])
          $('.tipo1 .'+tipo1+' ').attr("selected", "selected");
          if(types.length > 1) $('.tipo2 .'+tipo2+' ').attr("selected", "selected");
          else{
            $('.tipo2 ').attr("selected", "");
          }
  
      }
      });
      $.ajax({
        url: urldescription,
        dataType: "json",
        method: "GET",
        success: function(data) {
            descriptions = [];
          for (var i = 0; i < data.flavor_text_entries.length; i++) {
            if (data.flavor_text_entries[i].language.name == "en"){
                var description = data.flavor_text_entries[i].flavor_text;
                descriptions.push(description);
            }
                
          }


          console.log(descriptions[0]);
          $('textarea[name ="descricao"]').val(descriptions[0]);
         
  
      }
      });

             
  });

  
  $(".shiny-pokemon").change(function(){
    var url = "https://pokeapi.co/api/v2/pokemon/" + $(".nome-input").val().toLowerCase();
    var shiny = $( ".shiny-pokemon option:selected" ).text();
    if(shiny == "Sim"){
        $.ajax({
            url: url,
            dataType: "json",
            method: "GET",
            success: function(data) {
              foto = data.sprites.front_shiny,
              $('input[name ="photo"]').val(foto);
      
            }
          });
    }
  });

  
  