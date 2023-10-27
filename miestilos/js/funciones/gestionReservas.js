listarREservas();
//inicio listar servicios

function listarREservas() {
   // alert('rese');

    var fechaFulll = new Date();
    var fechaMomento = fechaFulll.getFullYear() + '-' + (fechaFulll.getMonth() + 1) + '-' + fechaFulll.getDate();
    console.log(fechaMomento);
    $.ajax({
        url: '../reservas/reservasClientes',
        type: 'POST',
        data: {
            fechaMomento
        },
        success: function(response) {
            let clienteReservas = JSON.parse(response);
            console.log(clienteReservas);
            let template = "";
            var i = 1;
            clienteReservas.forEach(reservado => {
                template += `
        <tr data-id="${reservado.id}" ci="${reservado.ci}" nombreCliente="${reservado.nombreCompleto}" reservaId=${reservado.id} fechaInicioEvento=${reservado.fechaInicio} total=${reservado.total} adelanto=${reservado.adelantoReserva} saldo=${reservado.saldo}>
        <td style="text-align: center;">${reservado.fechaInicio}</td>

        <td>${reservado.nombreCompleto}</td>
        <td >${reservado.evento} - ${reservado.dias}</td>
        <td style="text-align: right;">${reservado.total}</td>
        <td style="text-align: right;">${reservado.adelantoReserva}</td>
        <td style="text-align: right;">${reservado.saldo}</td>
        <td style="text-align: center;">
        ${
          reservado.estadoNumero == 1 
            ? `<div style="color:#00162B ; background:rgba(224, 132, 2, 0.8);"> ${reservado.rEstado}</div>` 
            : reservado.estadoNumero == 2 
              ? `<div style="color:#fff ; background:rgba(42, 145, 12, 1);">${reservado.rEstado}</div>`
              : reservado.estadoNumero ==3 
                ? `<div style="color:#fff ; background:rgba(13, 119, 182, 1);">${reservado.rEstado}</div>`
                : `<div style="color:#fff ; background:rgba(255, 0, 0, 1);">${reservado.rEstado}</div>`
        }</td>




         <td>
               <div class="d-flex justify-content-center">
                 <button class="btn btn-sm btn-success cobrar" type="button" data-id=${reservado.id}> Cobrar</button>
               </div>

             </td>

             <td >
               <div class="d-flex justify-content-center ">
                
                 <button class="btn btn-md  p-1 m-1 btnt-primary detalleReservaReporte" id="detalleReservaReporte" type="button" ><i class="fa-solid fa-file-pdf fa-xl" style="color:orangered;"></i></button>
                 <button class="btn btn-md  p-1 m-1 btnt-primary" id="btnEliminar" type="button"><i class="fa-solid fa-trash fa-xl" style="color: red;"></i></button>


               </div>

             </td>
       </tr>
        `
                i++;
            });
            $('.clienteReservadoT').html(template);
 
       
    inicializarDataTableR();
        }
    });


   setTimeout(function() {
  var urlParams = new URLSearchParams(window.location.search);
  var idRecuperado = urlParams.get('id');

  if (idRecuperado) {
    console.log('El parámetro "id" existe y su valor es: ' + idRecuperado);

    var nuevaURL = window.location.origin + window.location.pathname;
  history.replaceState({}, document.title, nuevaURL);
    buscarClienteDEsdeCalendario(idRecuperado);
  } else {
    console.log('El parámetro "id" no existe en la URL.');
  }
}, 1000); // Esperar 1 segundo (1000 milisegundos)

}
$(document).on('keyup', '#txtBuscarReserva', function() {
  let valor = $(this).val();

  if (valor) {

   

    var fechaFulll = new Date();
    var fechaMomento = fechaFulll.getFullYear() + '-' + (fechaFulll.getMonth() + 1) + '-' + fechaFulll.getDate();
    console.log(fechaMomento);
    $.ajax({
        url: '../reservas/reservasClientesBuscar',
        type: 'POST',
        data: {fechaMomento,valor},
        success: function(response) {
            let clienteReservas = JSON.parse(response);
            console.log(clienteReservas);
            let template = "";
            var i = 1;
            clienteReservas.forEach(reservado => {
                template += `
        <tr data-id="${reservado.id}" ci="${reservado.ci}" nombreCliente="${reservado.nombreCompleto}" reservaId=${reservado.id} fechaInicioEvento=${reservado.fechaInicio} total=${reservado.total} adelanto=${reservado.adelantoReserva} saldo=${reservado.saldo}>
        <td style="text-align: center;">${reservado.fechaInicio}</td>

        <td>${reservado.nombreCompleto}</td>
        <td >${reservado.evento} - ${reservado.dias}</td>
        <td style="text-align: right;">${reservado.total}</td>
        <td style="text-align: right;">${reservado.adelantoReserva}</td>
        <td style="text-align: right;">${reservado.saldo}</td>
        <td style="text-align: center;">
        ${
          reservado.estadoNumero == 1 
            ? `<div style="color:#00162B ; background:rgba(224, 132, 2, 0.8);"> ${reservado.rEstado}</div>` 
            : reservado.estadoNumero == 2 
              ? `<div style="color:#fff ; background:rgba(42, 145, 12, 1);">${reservado.rEstado}</div>`
              : reservado.estadoNumero ==3 
                ? `<div style="color:#fff ; background:rgba(13, 119, 182, 1);">${reservado.rEstado}</div>`
                : `<div style="color:#fff ; background:rgba(255, 0, 0, 1);">${reservado.rEstado}</div>`
        }</td>




         <td>
               <div class="d-flex justify-content-center">
                 <button class="btn btn-sm btn-success cobrar" type="button" data-id=${reservado.id}> Cobrar</button>
               </div>

             </td>

             <td >
               <div class="d-flex justify-content-center ">
                 <button class="btn btn-md  p-1 m-1 btnt-primary detalleReservaReporte" id="detalleReservaReporte" type="button" ><i class="fa-solid fa-file-pdf fa-xl" style="color:orangered;"></i></button>
                 <button class="btn btn-md  p-1 m-1 btnt-primary"  id="btnEliminar" type="button"><i class="fa-solid fa-trash fa-xl" style="color: red;"></i></button>

               </div>

             </td>
       </tr>
        `
                i++;
            });
            $('.clienteReservadoT').html(template);
 
            
    
        }
    });


  }
});


function desstroyInicializa() {
    var table = $('#miTablaR').DataTable();
    
    // Destruir la instancia DataTable existente si ya está inicializada
    if ($.fn.DataTable.isDataTable('#miTablaR')) {
        table.destroy();
    }

    listarREservas();
}
$(document).on('click', '#btnEliminar', async function() {
    let element = $(this).closest('td').parent('tr');
    let id = $(element).attr('reservaId');
    let inicioEvento = $(element).attr('fechaInicioEvento');
    let nomCliente = $(element).attr('nombreCliente');
    alert(nomCliente+id);
})
//consulta las fechas 
$(document).on('click', '.cobrar', async function() {
    let element = $(this).closest('td').parent('tr');
    let id = $(element).attr('reservaId');
    let inicioEvento = $(element).attr('fechaInicioEvento');
    let nomCliente = $(element).attr('nombreCliente');
    document.getElementById("nombreCliente").textContent = nomCliente;
    let total = $(element).attr('total');
    let adelanto = $(element).attr('adelanto');
    let saldo = $(element).attr('saldo');
    let tTotal = document.getElementById('tTotal');
    tTotal.textContent = parseFloat(total).toFixed(2);
    let tadelanto = document.getElementById('tAdelando');
    tadelanto.textContent = parseFloat(adelanto).toFixed(2);
    let saldoPagar = document.getElementById('tPagar');
    saldoPagar.textContent = parseFloat(saldo).toFixed(2);
    let tParcial = document.getElementById('tParcial');
    let tDes = document.getElementById('tDes');
    let sumaTotal = 0;
    let sumDEs = 0;
    try {
        let fechas = await obtenerFechas(id);
        let template = "";
        for (const fecha of fechas) {
            let fechaReservaServicio = fecha.fecha;
            console.log(fechaReservaServicio);
            template += `

                <tr style="border-top: none;">
                    <td colspan="6" > <b><u style="size:2px">Servicios dia ${fechaReservaServicio}</u></b></td>
        
                </tr>
                 <tr class=" bgt-acent t-secondary" style="text-align: center;">
                <th>Nro</th>
                <th>Servicio </th>
                <th>cant.</th>
                <th>pu(Bs.)</th>

                <th>Importe<small>(bs.)</small></th>
                <th>Descuento(Bs.)</th>
               
              </tr>`;
            let serviciosParaEstaFecha = await obtenerServicios(id, inicioEvento, fechaReservaServicio);
            i = 1;
            subtotal = 0;
            subDes = 0;
            serviciosParaEstaFecha.forEach(res => {
                template += `
                    <tr>
                        <td style="text-align:right; margin-right: 2px;">${i}</td>

                        <td >${res.servicio}</td>
                        <td style="text-align:right; margin-right: 2px;">${res.cantidad}</td>
                        <td style="text-align:right; margin-right: 2px;">${res.PU}</td>
                        <td style="text-align:right; margin-right: 2px;">${res.subTotal}</td>
                        <td style="text-align:right; margin-right: 2px;">${res.descuento}</td>



                    </tr>`;
                i++;
                subtotal += parseFloat(res.subTotal);
                subDes += parseFloat(res.descuento);
            });
            template += `

                <tr style="border-bottom: none;">
                    <td class="" colspan="4" style="border-bottom: none;color:blue">SubTotales</td>
                    <td class="text-info " style="border-bottom: none; text-align:right; margin-right: 2px;">${subtotal.toFixed(2)}</td>
                    <td class="text-gray " style="border-bottom: none; text-align:right; margin-right: 2px;">${subDes.toFixed(2)}</td>


                </tr>
        
               `;
            sumaTotal += subtotal;
            sumDEs += subDes;
        }
        tParcial.textContent = parseFloat(sumaTotal).toFixed(2);
        tDes.textContent = parseFloat(sumDEs).toFixed(2);
        var pagar = document.getElementById('txtPagar');
        pagar.placeholder = parseFloat(saldo).toFixed(2) + "";
        document.getElementById('txtIdeReserva').value = id;
        $('#servicioCobro').modal('show');
        $('.servicioReservado').html(template);
    } catch (error) {
        console.error('Error:', error);
    }
});
// Función para obtener las fechas
function obtenerFechas(id) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '../reservas/fechasEventos',
            type: 'POST',
            data: {
                id
            },
            success: function(response) {
                let fechas = JSON.parse(response);
                resolve(fechas);
            },
            error: function(error) {
                reject(error);
            }
        });
    });
}
// Función para obtener los servicios
function obtenerServicios(id, inicioEvento, fechaReservaServicio) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '../reservas/servicioReservados',
            type: 'POST',
            data: {
                id,
                inicioEvento,
                fechaReservaServicio
            },
            success: function(response) {
                let servicios = JSON.parse(response);
                resolve(servicios);
            },
            error: function(error) {
                reject(error);
            }
        });
    });
}

$(document).on('keyup', '#txtPagar', function() {
    var pagar = document.getElementById('txtPagar');
    let saldoPagar = document.getElementById('tPagar');
    if (parseFloat(pagar.value) > parseFloat(saldoPagar.textContent)) {
        toastr.info("El monto ingresado no debe ser mayor saldo a pagar");
        pagar.value = saldoPagar.textContent;
    }
})


$(document).on('click', '#btnPagar', function() {
    var pagar = document.getElementById('txtPagar');
    var btnPagar = document.getElementById('btnPagar');
    let saldoPagar = document.getElementById('tPagar');
    var anticipoPagado=document.getElementById('tAdelando');
    var anticipo=0;
    var saldo=0;
    var estados = 1;
    if(parseFloat(saldoPagar.value)==0)
    {
        toastr.info("El cliente ya completo la parseFloat");

    }

    else if (pagar.value == "" || parseFloat(pagar.value) == 0) {
        toastr.info("Ingrese monto a pagar");
        pagar.focus();
        pagar.value = "";
            estados = 1;

    } else {
        if (parseFloat(saldoPagar.textContent) > parseFloat(pagar.value) && parseFloat(pagar.value) > 0) {
            estados = 2;
              saldo=parseFloat(saldoPagar.textContent)-parseFloat(pagar.value)
              anticipo = parseFloat(anticipoPagado.textContent)+parseFloat(pagar.value);

        } else {
            estados = 3;
            saldo=0;
            anticipo=0;

        }
        var idReserva = document.getElementById('txtIdeReserva').value;
        Swal.fire({
            icon: 'warning',
            text: 'Confirmar el pago',
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            background: 'rgb(251, 214, 169)',
            customContainerClass: 'width:200px',
            customClass: {
                cancelButton: 'btnt-primary btn-sm', // Clase para el botón Cancelar
                confirmButton: 'btnt-primary',
                icon: 'text-warning' // Clase para el botón Cancelar
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('../reservas/servicioReservadosPagar', { idReserva,estados,saldo,anticipo}, function(response) {
                    var json = JSON.parse(response);
                    if (json.uri === 1) {
                        toastr.success('Transaccion completas');
                     $('#servicioCobro').modal('hide');
                       desstroyInicializa();

                                setTimeout(function() {
                                       buscarFilas(idReserva);
                                }, 3000); 
                    } else {
                        toastr.warning('Falla Transaccion');
                     $('#servicioCobro').modal('hide');
                    }

         


                })
            }
        });
    pagar.value="";

    }
})

function buscarFilas(idReserva)
{
   
var idBuscado = idReserva;
var tabla = document.getElementById('clienteReservadoT');

var filas = tabla.querySelectorAll('[data-id]');
for (var i = 0; i < filas.length; i++) {
    var fila = filas[i];
    

    var dataId = fila.getAttribute('data-id');
    

    if (dataId === idBuscado) {
     
        console.log('Encontré la fila con data-id:', idBuscado);
    
    
        // Puedes detener el bucle ya que encontraste la fila
      var generarReporte = fila.querySelector('td:nth-child(9) div .detalleReservaReporte');

        console.log(generarReporte);
            if (generarReporte) {
                generarReporte.click();
            } else {
                console.error('No se encontró el botón "Pagar" en la fila.');
            }
        break;
    }
}

}


function agregarCeros(numero) {
  const numeroConCeros = '000000' + numero;
  return numeroConCeros.slice(-6); // Tomar solo los últimos 6 dígitos
}

//incio


//metodo funcional

function obtenerParteDecimal(numero) {
    return parseFloat('' + numero.toString().split('.')[1]) || '00';
}

$(document).on('click', '#detalleReservaReporte', async function() {
     let element = $(this).closest('td').parent('tr');
    let id = $(element).attr('reservaId');
    let inicioEvento = $(element).attr('fechaInicioEvento');
    let nomCliente = $(element).attr('nombreCliente');
    let ci = $(element).attr('ci');

    let total = $(element).attr('total');
    let adelanto = $(element).attr('adelanto');
    let saldo = $(element).attr('saldo');
    var estado=1;

    // let tTotal = document.getElementById('tTotal');
    // let tadelanto = document.getElementById('tAdelando');
    // let saldoPagar = document.getElementById('tPagar');
    // let tParcial = document.getElementById('tParcial');
    // let tDes = document.getElementById('tDes');

    generarPdf(id,inicioEvento,nomCliente,total, adelanto,saldo,ci,estado);

})

 async function generarPdf(id,inicioEvento,nomCliente,total, adelanto,saldo,ci,estado) {
     
    //estado 1 generado dessde pagar ; 2= genera desde pdf ;3 =desde el calendario


    let sumaTotal = 0;
    let sumDEs = 0;
    
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





    var doc = new jspdf.jsPDF()

    doc.text(170, 20, 'Nº-'+agregarCeros(id))
    doc.setFontSize(18);
    doc.text(66, 30, 'Recibo Reserva de Servicios');
    doc.setFontSize(12);
    doc.text(20, 42, 'CI: '+ci);
    doc.text(20, 48, 'Razón Social: '+nomCliente);
    doc.text(20, 54, 'Fecha emision: '+fechaFormateada);
    doc.text(20, 58, 'estado: '+estado);


    // Obtener la URL completa
var urlCompleta = window.location.href;
     doc.addImage(urlCompleta+"../../../../img/usuario.png", "PNG", 20, 10, 25, 20);

// Mostrar la URL en la consola
console.log('URL actual:', urlCompleta);

    
    //fin cabezera doc

    //confiuracion de tablas 

  const tableWidth = 170;

 var maxWidthColumn2 = 20;

    const columnStyles = {
    0: { fontStyle: 'bold', halign: 'right',textColor: 0 },
    1: { halign: 'left',textColor: 0 },
    2: { columnWidth: maxWidthColumn2, overflow: 'linebreak', halign: 'center',textColor: 0 },
    3: { halign: 'right',textColor: 0 },
    4: { halign: 'right' ,textColor: 0},
    5: { halign: 'right' ,textColor: 0},

  };
  const tableConfig = {
    
    styles: { cellPadding: 1, fontSize: 10 },
    columnStyles,
    tableWidth, // Ancho de la tabla
    margin: { top: 30, right: 20, bottom: 30, left: 20 }, // Márgenes para centrar la tabla
    headStyles: {
     fillColor: [0, 64, 128],
      halign: 'center'}, // Color de fondo para la fila de encabezado
    bodyStyles: { fillColor: [253, 235, 253] }, // Color de fondo para las filas de datos
    alternateRowStyles: { fillColor: [153, 228, 251] }, // Color de fondo para filas alternas
    showHead: 'everyPage', // Mostrar el encabezado en cada página
  };

  // const imageUrll = '../img/bisa.jpeg';
  // doc.addImage(imageUrl, 'JPEG', 10, 10, 50, 50); 
 


    var inicia=70;
    try {
        let fechas = await obtenerFechas(id);
        let cout = 1;
        for (const fecha of fechas) {
            let fechaReservaServicio = fecha.fecha;
           
            console.log(fechaReservaServicio);

            let serviciosParaEstaFecha = await obtenerServicios(id, inicioEvento, fechaReservaServicio);
            i = 1;
            subtotal = 0;
            subDes = 0;
            doc.text(20, (inicia-4), 'Servicios Reservados para el dia: '+fechaReservaServicio);
            var head = [['Nro', 'Servicios', 'cant','PU Bs.','Importe Bs.','Descuento Bs.']]
            var body=[];
            serviciosParaEstaFecha.forEach(res => {

                console.log(res.pu);
               
                subtotal += parseFloat(res.subTotal);
                subDes += parseFloat(res.descuento);
                     

                 var datos= [i, res.servicio, res.cantidad ,res.PU,res.subTotal,`${res.descuento}`];
                 body.push(datos);

                i++;
                })


             body.push([{ content: 'subTotales',  colSpan: 4,  styles: { halign: 'center' ,fillColor: [255, 255, 255]} },
                { content: ''+subtotal.toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: ''+subDes.toFixed(2),  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]);
            doc.autoTable({ 
            startY: inicia,
            head: head,
            body: body,
            // foot:foo,
            ... tableConfig

            })
                doc.text(`Página ${doc.internal.getNumberOfPages()}`, 90, 290);
                doc.text(`Usuario: `+nombreUsuarioSeccion, 20, 290);

                
             if(cout<=fechas.length-1)
             {
                doc.addPage();
                cout++;
             }
             inicia=30;
           
         

            sumaTotal += subtotal;
            sumDEs += subDes;
        }


        const ultimaPosicionY = doc.previousAutoTable.finalY;

       
        // doc.line(30, ultimaPosicionY+30, 130, ultimaPosicionY+30);
             doc.autoTable({ 
            startY: ultimaPosicionY+5,
            
            body: [[{ content: 'Total Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+sumaTotal.toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: ''+sumDEs.toFixed(2),  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ],[{ content: 'Total Pagar Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+sumaTotal.toFixed(2),  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: ''+sumDEs.toFixed(2),  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ],[{ content: 'anticipo Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+adelanto,  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ],[{ content: 'Saldo Pagar Bs.',  colSpan: 4,  styles: { halign: 'right' ,fillColor: [255, 255, 255]} },
                { content: ''+saldo,  styles: { halign: 'right',fillColor: [255, 255, 255] } },
                 { content: '',  styles: { halign: 'right' ,fillColor: [255, 255, 255]}, }

                ]],
            // foot:foo,
            ... tableConfig

            })
              var adelantoLiterla=  NumeroALetras(parseInt(adelanto));
              var pagarLiteral=  NumeroALetras(parseInt(saldo));

           var nPosition=ultimaPosicionY;
        doc.setFontSize(12);
        doc.text(20, nPosition+35, adelantoLiterla);
        doc.setFontSize(12);
        // doc.text(20, nPosition+40, pagarLiteral);
doc.setFontSize(12);
        doc.text(150, nPosition+35, obtenerParteDecimal(adelanto)+'/100');
// doc.setFontSize(12);
        // doc.text(150, nPosition+40, obtenerParteDecimal(saldo)+'/100');


      // coloreRigt();
//pie pdf
var pdfContent = doc.output('dataurl');
var newWindow = window.open();
newWindow.document.open();
newWindow.document.write('<html style="margin: 0; padding: 0;"><head><title>PDF Document</title></head><body style="margin: 0; padding: 0;">');
newWindow.document.write('<embed width="100%" height="100%" type="application/pdf" src="' + pdfContent + '" />');


newWindow.document.write('</body></html>');
newWindow.document.close();








    } catch (error) {
        console.error('Error:', error);
    }
     // abrirPDF(id);

}


//solo cuando llego desde el calendario se ejecuta este codgio  es muy importantes
function buscarClienteDEsdeCalendario(idRecuperado) {
var idBuscado = idRecuperado;
var tabla = document.getElementById('clienteReservadoT');
console.log(tabla);

var filas = tabla.querySelectorAll('[data-id]');
for (var i = 0; i < filas.length; i++) {
    var fila = filas[i];
    

    var dataId = fila.getAttribute('data-id');
    

    if (dataId === idBuscado) {
         fila.style.backgroundColor = '#aaffaa';
     
        console.log('Encontré la fila con data-id:', idBuscado);
    
        var nombreCliente = fila.getAttribute('nombreCliente');
        var reservaId = fila.getAttribute('reservaId');
        
        console.log('Nombre del cliente:', nombreCliente);
        console.log('ID de la reserva:', reservaId);
        
    
        // Puedes detener el bucle ya que encontraste la fila
      var generarReporte = fila.querySelector('td:nth-child(8) div .cobrar');

        console.log(generarReporte);
            if (generarReporte) {
                generarReporte.click();
            } else {
                console.error('No se encontró el botón "Pagar" en la fila.');
            }
        break;
    }
}
}
