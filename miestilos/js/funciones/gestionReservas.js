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
        <tr nombreCliente="${reservado.nombreCompleto}" reservaId=${reservado.id} fechaInicioEvento=${reservado.fechaInicio} total=${reservado.total} adelanto=${reservado.adelantoReserva} saldo=${reservado.saldo}>
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
                 <button class="btn btn-md  p-1 m-1 btnt-primary " type="button"  data-toggle="modal" data-target="#servciosModificar"><i class="fa-solid fa-tag fa-xl" style="color:#0080FF"></i></button>

                 <button class="btn btn-md  p-1 m-1 btnt-primary" type="button" ><i class="fa-solid fa-file-pdf fa-xl" style="color:orangered;"></i></button>
                 <button class="btn btn-md  p-1 m-1 btnt-primary" type="button"><i class="fa-solid fa-trash fa-xl" style="color: red;"></i></button>


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

}


function desstroyInicializa() {
    var table = $('#miTablaR').DataTable();
    
    // Destruir la instancia DataTable existente si ya está inicializada
    if ($.fn.DataTable.isDataTable('#miTablaR')) {
        table.destroy();
    }

    listarREservas();
}
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
                       desstroyInicializa()
                        //imprimer un pdf
                    } else {
                        toastr.warning('Falla Transaccion');
                    }
        $('#servicioCobro').modal('hide');

         


                })
            }
        });
    pagar.value="";

    }
})