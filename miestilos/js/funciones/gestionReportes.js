
$(document).ready(function(){

$(document).on('change', '#fechaIncio', function () {
    // document.getElementById('fechaFin');

    if (document.getElementById('fechaFin').value >= document.getElementById('fechaIncio').value) {
        var fechaInic = document.getElementById('fechaFin').value;
        var fechaFin = document.getElementById('fechaIncio').value;

        IngresosEnfechas(fechaInic, fechaFin);
    } else {
        toastr.warning("La fecha de inicio debe ser menor");
        document.getElementById('fechaIncio').focus();
    }
});

  $(document).on('change', '#fechaFin', function () {
    if (document.getElementById('fechaFin').value >= document.getElementById('fechaIncio').value) {
        var fechaInic = document.getElementById('fechaFin').value;
        var fechaFin = document.getElementById('fechaIncio').value;
        IngresosEnfechas(fechaInic, fechaFin);
    } else {
        toastr.warning("La fecha de fin debe ser mayor");
        document.getElementById('fechaFin').value = document.getElementById('fechaIncio').value;
    }
});


 function IngresosEnfechas(fechaInicio,fechaFin)
 {
   document.getElementById("ingresos").textContent=0;
    $.ajax({
    url:'../reportes/ingresoEnfechas',
    type:'POST',
    data:{fechaInicio,fechaFin},
    success:function(response){
      // console.log(response+"golas");
      let general= JSON.parse(response);
      console.log(general);
      let template= "";
      i=0;
      tIngreso=0;
      general.forEach(res=>{
        template+=`
        <tr usuarioId=${res.id}>
        <td >${res.id}</td>

        <td >${res.fechaInicio}</td>
        <td >${res.nombreCompleto}</td>
        <td >${res.total}</td>
       
    

        </tr>
        `
         tIngreso+=parseFloat(res.total);
         
        i++;
      });
    document.getElementById("ingresos").textContent=parseFloat(tIngreso).toFixed(2)+"Bs.";

      $('.tReporteGeneral').html(template); 
      if(i==0)
      { 
        toastr.info("No  encuetra  registros en esa fecha de rango");
      }
    }
  });
  

 }




$(document).on('click', '.imprimirReporte', function () {
    generarReportePdf();
});




function generarReportePdf() {
    var totalIngreso = 0;
    $(".tReporteGeneral").find('tr').each(function() {
        totalIngreso += parseFloat($(this).find("td:eq(3)").text());
    });

    var fechaInicio = document.getElementById('fechaFin').value;
    var fechaFin = document.getElementById('fechaIncio').value;

    $.ajax({
        url: '../reportes/ingresoEnfechas',
        type: 'POST',
        data: { fechaInicio, fechaFin },
        success: function (response) {
            let general = JSON.parse(response);
            let body = [];
             var i=0;
            general.forEach(res => {
                var datos = [res.id, res.fechaInicio, res.nombreCompleto, res.total];
                body.push(datos);i++;
            });

            // Después de obtener los datos, ahora puedes generar el PDF
            if(i>1)
            {

            generarPDF(body, totalIngreso,fechaInicio,fechaFin);
            }
            else
            {
              toastr.info("No se encuentra nungun registro selecciona una rango de fecha");
            }

        }
    });
}


function generarPDF(body, totalIngreso,fechaInicio,fechafin) {
     var nombreUsuarioSeccion=document.getElementById('nombreUsuarioSeccion').textContent;

    const fechaActual = new Date();

// Obtener los componentes de la fecha (año, mes, día, hora, minuto, segundo)
const año = fechaActual.getFullYear();
const mes = fechaActual.getMonth() + 1; // Meses van de 0 a 11, por lo que sumamos 1
const día = fechaActual.getDate();
const hora = fechaActual.getHours();
const minuto = fechaActual.getMinutes();
// Formatear la fecha como desees (ejemplo: YYYY-MM-DD HH:mm:ss)
const fechaFormateada = `${año}-${mes.toString().padStart(2, '0')}-${día.toString().padStart(2, '0')} ${hora.toString().padStart(2, '0')}:${minuto.toString().padStart(2, '0')}`;




    var doc = new jspdf.jsPDF();


  doc.setFontSize(18);
    doc.text(90, 25, 'Reporte General');
    doc.setFontSize(12);
    doc.text(60, 35, 'Desde  '+fechaInicio);
    doc.text(130, 35, 'Hasta  '+fechafin);
    // doc.text(20, 30, 'Reporte General');
  
    doc.text(20, 84, 'Fecha emision: '+fechaFormateada);

    // Obtener la URL completa
   var urlCompleta = window.location.href;
    doc.addImage(urlCompleta+"../../../../img/usuario.png", "PNG", 20, 10, 25, 20);

  const tableWidth = 170;

 var maxWidthColumn2 = 30;

    const columnStyles = {
    0: { columnWidth: maxWidthColumn2, overflow: 'linebreak', halign: 'center' ,textColor: 0},
    1: { halign: 'center',textColor: 0 },
    2: { halign: 'left' ,textColor: 0},
    3: { halign: 'right',textColor: 0},
   
  };
  const tableConfig = {
    
    styles: { cellPadding: 1, fontSize: 11 },
    columnStyles,
    tableWidth, // Ancho de la tabla
    margin: { top: 30, right: 20, bottom: 30, left: 20 }, // Márgenes para centrar la tabla
    headStyles: {
     fillColor: [0, 64, 128],
      halign: 'center'}, // Color de fondo para la fila de encabezado
    bodyStyles: { fillColor: [255, 255, 255],fontSize:11 }, // Color de fondo para las filas de datos
    alternateRowStyles: { fillColor: [183, 219, 219] }, // Color de fondo para filas alternas
    showHead: 'everyPage', // Mostrar el encabezado en cada página
  };

  var head =[['Nro','Fechas','Clientes','Total Bs.']];

    doc.autoTable({
        startY: 40,
        head:head,
        body: body,
        ...tableConfig
    });
 const ultimaPosicionY = doc.previousAutoTable.finalY;


                 doc.text(`Página ${doc.internal.getNumberOfPages()}`, 90, 290);
                doc.text(`Usuario: `+nombreUsuarioSeccion, 20, 290);


  var adelantoLiterla=  NumeroALetras(parseInt(totalIngreso));
              

           var nPosition=ultimaPosicionY;
        doc.setFontSize(12);
        doc.text(40, nPosition+10, 'Ingresos: ');
        doc.text(120, nPosition+10, ''+parseFloat(totalIngreso).toFixed(2) +'Bs.');
        doc.text(20, nPosition+20, adelantoLiterla);
        doc.text(150, nPosition+20, obtenerParteDecimal(totalIngreso)+'/100');

        doc.setFontSize(12);
        var pdfContent = doc.output('dataurl');
var newWindow = window.open();
newWindow.document.open();
newWindow.document.write('<html style="margin: 0; padding: 0;"><head><title>PDF Document</title></head><body style="margin: 0; padding: 0;">');
newWindow.document.write('<embed width="100%" height="100%" type="application/pdf" src="' + pdfContent + '" />');


newWindow.document.write('</body></html>');
newWindow.document.close();


  
}


})