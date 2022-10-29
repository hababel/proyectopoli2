
<h1>Authors</h1>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>


<div class="mb-3">
  <label for="" class="form-label">Programas</label>
  <select class="form-select form-select-lg" name="programas" id="programas">
    
  </select>
</div>

<canvas id="miGrafico"></canvas>

<!-- 

  ID de la clave API = 887cnu94owl883k4t5lwxm582
  Clave secreta API = 49f9njadyt2dcncuagt53eo0bibiz9vs5ja12ardqryp9lwn34 
  AAP Token = Nombre: APIAnibal - AAPTOKEN: p6KqQH1yrtP7v2EYoE07Ux78l

-->

<style>
  canvas{

  width:1000px !important;
  height:600px !important;

}
</style>
<script>

  $(document).ready(function () {
    $("#programas").empty();
  });

$.ajax({
    url: "http://www.datos.gov.co/resource/iwgf-bkfk.json?$where=PERIODO between '20181' and '20212'&INST_COD_INSTITUCION='2209'",
    processData: true,
    type: "GET",
    dataType: "json",
    data: {
      "$limit" : 840000,
      "$$app_token" : "p6KqQH1yrtP7v2EYoE07Ux78l"
    },
    beforeSend: function( xhr ) {
      xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
    }
})
  .done(function(response) {

    var mod_competen_ciudada_punt = [];
    var vestu_prgm_academico = [];

    //console.log(response);

    for (var i in response) {
      
      //existe_programa=vestu_prgm_academico.indexOf(response[i].estu_prgm_academico);
      // existe_programa=jQuery.inArray( response[i].estu_prgm_academico, vestu_prgm_academico.Programa) 
      //let existeElementoMayorQueDiez = vestu_prgm_academico.Programa.find(element => element ==  response[i].estu_prgm_academico);
      // const names = vestu_prgm_academico.map(el => el.Programa); 
      // var existe_programa=names.includes(response[i].estu_prgm_academico); 
      var anno=response[i].periodo.substring(0,4);
      //let existe_programa = vestu_prgm_academico.findIndex(mascota => mascota.Programa === response[i].estu_prgm_academico);
      let existe_anno = vestu_prgm_academico.indexOf(vanno => vanno === anno);
      console.log(existe_anno + " -> anno: " + vestu_prgm_academico[existe_anno]);
      var puntaje=Number.parseInt(response[i].mod_ingles_punt);
      var mod_ingles_desem=response[i].mod_ingles_desem;
      
      if(i < 10){
        //if(existe_anno == -1){
         vestu_prgm_academico={"anno":anno};
         vestu_prgm_academico[anno]={i:mod_ingles_desem};
         //vestu_prgm_academico[anno]=new Array();
        //}else{
          
            // vestu_prgm_academico[anno]={
            // "info":i,
            // "suma":i+i }

       // }
      }
      

      
      /*
      if(existe_programa < 0){
        
        switch (mod_ingles_desem) {
          case '-A1':
            var data=new Array();
              data.push({
                  "Programa": response[i].estu_prgm_academico,
                  "cantidad_programa":1,
                  "-A1":puntaje,
                  "C-A1":1,
                  "P-A1":puntaje/1,
                  "A1":0,
                  "CA1":0,
                  "PA1":0,
                  "A2":0,
                  "CA2":0,
                  "PA2":0,
                  "-B1":0,
                  "C-B1":0,
                  "P-B1":0,
                  "B1":0,
                  "CB1":0,
                  "PB1":0,
                  "B2":0,
                  "CB2":0,
                  "PB2":0,
              });
              vestu_prgm_academico.anno.push(data);
            break;
          case 'A1':
            vestu_prgm_academico.push({
                  "Programa": response[i].estu_prgm_academico,
                  "cantidad_programa":1,
                  "-A1": 0,
                  "C-A1":0,
                  "P-A1":0,
                  "A1":puntaje,
                  "CA1":1,
                  "PA1":puntaje/1,
                  "A2":0,
                  "CA2":0,
                  "PA2":0,
                  "-B1":0,
                  "C-B1":0,
                  "P-B1":0,
                  "B1":0,
                  "CB1":0,
                  "PB1":0,
                  "B2":0,
                  "CB2":0,
                  "PB2":0,
              })
            break;
          case 'A2':
            vestu_prgm_academico.push({
                  "Programa": response[i].estu_prgm_academico,
                  "cantidad_programa":1,
                  "-A1": 0,
                  "C-A1":0,
                  "P-A1":0,
                  "A1":0,
                  "CA1":0,
                  "P-A1":0,
                  "A2":puntaje,
                  "CA2":1,
                  "PA2":puntaje/1,
                  "-B1":0,
                  "C-B1":0,
                  "P-B1":0,
                  "B1":0,
                  "CB1":0,
                  "PB1":0,
                  "B2":0,
                  "CB2":0,
                  "PB2":0,
              })
            break;
          case '-B1':
            vestu_prgm_academico.push({
                  "Programa": response[i].estu_prgm_academico,
                  "cantidad_programa":1,
                  "-A1": 0,
                  "C-A1":0,
                  "P-A1":0,
                  "A1":0,
                  "CA1":0,
                  "PA1":0,
                  "A2":0,
                  "CA2":0,
                  "PA2":0,
                  "-B1":puntaje,
                  "C-B1":1,
                  "P-B1":puntaje/1,
                  "B1":0,
                  "CB1":0,
                  "PB1":0,
                  "B2":0,
                  "CB2":0,
                  "PB2":0
              })
            break;
          case 'B1':
            vestu_prgm_academico.push({
                  "Programa": response[i].estu_prgm_academico,
                  "cantidad_programa":1,
                  "-A1": 0,
                  "C-A1":0,
                  "P-A1":0,
                  "A1":0,
                  "CA1":0,
                  "PA1":0,
                  "A2":0,
                  "CA2":0,
                  "PA2":0,
                  "-B1":0,
                  "C-B1":0,
                  "P-B1":0,
                  "B1":puntaje,
                  "CB1":1,
                  "PB1":puntaje/1,
                  "B2":0,
                  "CB2":0,
                  "PB2":0
              })
            break;
          case 'B2':
            vestu_prgm_academico.push({
                  "Programa": response[i].estu_prgm_academico,
                  "cantidad_programa":1,
                  "-A1": 0,
                  "C-A1":0,
                  "P-A1":0,
                  "A1":0,
                  "CA1":0,
                  "PA1":0,
                  "A2":0,
                  "CA2":0,
                  "PA2":0,
                  "-B1":0,
                  "C-B1":0,
                  "P-B1":0,
                  "B1":0,
                  "CB1":0,
                  "PB1":0,
                  "B2":puntaje,
                  "CB2":1,
                  "PB2":puntaje/1
                  
              })
            break;

          default:
            break;
        }

        $('#programas').append("<option value='"+i+"'>"+response[i].estu_prgm_academico+"</option>");
        
      }else if(existe_programa >= 0){

        vestu_prgm_academico[existe_programa].cantidad_programa+=1;
        
        switch (mod_ingles_desem) {
          case '-A1':
            vestu_prgm_academico[existe_programa]["C-A1"]+=1;
            vestu_prgm_academico[existe_programa]["-A1"]+=puntaje;
            vestu_prgm_academico[existe_programa]["P-A1"]=vestu_prgm_academico[existe_programa]["-A1"]/vestu_prgm_academico[existe_programa]["C-A1"];
            break;
          case 'A1':
            vestu_prgm_academico[existe_programa]["CA1"]+=1;
            vestu_prgm_academico[existe_programa].A1+=puntaje;
            vestu_prgm_academico[existe_programa]["PA1"]=vestu_prgm_academico[existe_programa]["A1"]/vestu_prgm_academico[existe_programa]["CA1"];
            break;
          case 'A2':
            vestu_prgm_academico[existe_programa]["CA2"]+=1;
            vestu_prgm_academico[existe_programa].A2+=puntaje;
            vestu_prgm_academico[existe_programa]["PA2"]=vestu_prgm_academico[existe_programa]["A2"]/vestu_prgm_academico[existe_programa]["CA2"];
            break;
          case '-B1':
            vestu_prgm_academico[existe_programa]["C-B1"]+=1;
            vestu_prgm_academico[existe_programa]["-B1"]+=puntaje;
            vestu_prgm_academico[existe_programa]["P-B1"]=vestu_prgm_academico[existe_programa]["-B1"]/vestu_prgm_academico[existe_programa]["C-B1"];
            break;
          case 'B1':
            vestu_prgm_academico[existe_programa].CB1+=1;
            vestu_prgm_academico[existe_programa].B1+=puntaje;
            vestu_prgm_academico[existe_programa]["PB1"]=vestu_prgm_academico[existe_programa]["B1"]/vestu_prgm_academico[existe_programa]["CB1"];
            break;
          case 'B2':
            vestu_prgm_academico[existe_programa].CB2+=1;
            vestu_prgm_academico[existe_programa].B2+=puntaje;
            vestu_prgm_academico[existe_programa]["PB2"]=vestu_prgm_academico[existe_programa]["B2"]/vestu_prgm_academico[existe_programa]["CB2"];
            break;
        
          default:
            break;
        }
      }*/

    }

    console.log(vestu_prgm_academico);
    console.log(vestu_prgm_academico.anno);

    // Obtener una referencia al elemento canvas del DOM
     var mostrar = $("#miGrafico");
    // Las etiquetas son las que van en el eje X. 
    const etiquetas = ["A", "B", "C", "D"]
    // Podemos tener varios conjuntos de datos
    const result_escrita_desem_2018 = {
        label: "Ventas por mes - 2018",
        data: [5000, 1500, 8000, 8200,4800,4500,1200,7900,6800], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: 'rgba(54, 162, 235, 0.4)', // Color de fondo
        //borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
        borderWidth: 1,// Ancho del borde
    };
    const result_escrita_desem_2019 = {
        label: "Ventas por mes - 2019",
        data: [3500, 2300, 5000, 5989,3900,2500,4200,6900,9800], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: 'rgba(255, 159, 64, 0.4)',// Color de fondo
        //borderColor: 'rgba(255, 159, 64, 1)',// Color del borde
        borderWidth: 1,// Ancho del borde
    };
    const result_escrita_desem_2020 = {
        label: "Ventas por mes - 2020",
        data: [8900, 3100, 7400, 6400,6800,3400,9800,5900,8800], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: 'rgba(75, 139, 140, 0.4)',// Color de fondo
        //borderColor: 'rgba(255, 159, 64, 1)',// Color del borde
        borderWidth: 1,// Ancho del borde
    };
    const result_escrita_desem_2021 = {
        label: "Ventas por mes - 2021",
        data: [7400, 1000, 6900, 2600,6800,9500,6200,9900,4800], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: 'rgba(69, 96, 110, 0.4)',// Color de fondo
        //borderColor: 'rgba(255, 159, 64, 1)',// Color del borde
        borderWidth: 1,// Ancho del borde
    };

    const labels = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'Julio'
    ];


   
    //const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(mostrar, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3,4],
                backgroundColor: [
                    'rgba(2, 90, 95, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 454, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            },
            {
                label: 'Otros Votes',
                data: [4, 12, 8, 10, 5, 14,9],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            },
            {
                label: 'Otros Votes',
                data: [11, 6, 9, 3, 16, 4,7],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }
          ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

  })

  .fail(function() {
    alert( "error" );
  });

</script>




