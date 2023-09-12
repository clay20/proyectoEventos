
$(document).ready(function() {
  // Global Settings

  listarUsuario();
  listarUsuarioDesabilitados();

function listarUsuario()
  {
   $.ajax({
    url:'../proveedor/listaProveedor',
    type:'POST',
    success:function(response){
      // console.log(response+"golas");
      let proveedor= JSON.parse(response);
      let template= "";
      var i=1;
      console.log(response);
      proveedor.forEach(proveedor=>{
        template+=`
        <tr proveedorId=${proveedor.id}>
        <td>${i}</td>

        <td>${proveedor.denominacion}</td>
        <td >${proveedor.celular}</td>
        <td >${proveedor.direccion}</td>
        
        <td title="Editar"> 
        <button type="submit" class="editarProveedor btn btn-sm btnt-primary" data-target="#ModificarProveedor" ><i class="fa-solid fa-pen-to-square fa-lg text-warning"></i></button> 
        </td>
        <td title="Editar"> <button class="eliminarProveedor btn btn-sm btnt-primary"><i class="fa-solid fa-trash  fa-lg text-danger"></i></button> </td>
        </tr>
        `
        i++;
      });
      $('#listaProveedoresT').html(template); 
    }
  });
 }

//eliminar empleados 
 $(document).on('click','.eliminarProveedor', function(){
 
  if(confirm('Esta seguro de eliminar')){

    let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('proveedorId');
    let estado=0;

    $.post('../proveedor/eliminarAbilitar',{id,estado},function(response){
       listarUsuario();
       listarUsuarioDesabilitados();
    })
  }

})





//lista de empleaso desabilitados

 function listarUsuarioDesabilitados()
  {
   $.ajax({
    url:'../proveedor/listaProveedoresDesabilitados',
    type:'POST',
    success:function(response){
      // console.log(response+"golas");
      let proveedor= JSON.parse(response);
       let template= "";
      var i=1;
      proveedor.forEach(proveedor=>{
        template+=`
        <tr proveedorId=${proveedor.id}>
        <td>${i}</td>

        <td>${proveedor.denominacion}</td>
        <td >${proveedor.celular}</td>
        <td >${proveedor.direccion}</td>
        <td title="Editar"> 
        <button type="submit" class="habilitarProveedor btn btn-sm btnt-primary" ><i class="fa-solid fa-trash-can-arrow-up text-warning"></i></button> 
        </td>
       
        `
        i++;
      });
      $('#listaProveedoresTDesabilitados').html(template); 
    }
  });
 }
 //abilitar empleado eliminado

$(document).on('click','.habilitarProveedor', function(){
 
  if(confirm('Esta seguro abilitar')){

    let element =$(this)[0].parentElement.parentElement;
    let id= $(element).attr('proveedorId');
    let estado=1;

    $.post('../proveedor/eliminarAbilitar',{id,estado},function(response){
      listarUsuario();
  listarUsuarioDesabilitados();
    })
  }

})






function inciarMapa() {

   var denominacion = document.getElementById('denominacion');
                         var direccion = document.getElementById('direccion');
                         var longitud = document.getElementById('longitud');
                         var latitud = document.getElementById('latitud');


                         var map = L.map('map').setView([latitud.value,longitud.value], 20);

                         L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=6ajA0lMRoF8tV7RR04UT', {
                          attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
                        }).addTo(map);

                         var circulo = L.circle([-17.44578639070991, -66.1379270697688], {
                          color: 'skyblue',
                          fillColor: 'skyblue',
                          fillOpacity: 0.2,
                          radius: 50
                        }).addTo(map);
                         circulo.bindPopup("<h1>Local</h1><p>Eventos Andrea</p>");

                         map.on('click', function (e) {
                          latitud.value = e.latlng.lat;
                          longitud.value = e.latlng.lng;
                        });

                         function agregarMarcadorEnDobleClic(e) {
                          var lat = e.latlng.lat;
                          var lon = e.latlng.lng;


                          map.eachLayer(function (layer) {
                            if (layer instanceof L.Marker) {
                              map.removeLayer(layer);
                            }
                          });
                          var marker = L.marker([lat, lon]).addTo(map);

                          var nombreMarcador = denominacion.value;
                          marker.bindPopup(nombreMarcador).openPopup();


                                  // Construye la URL de consulta a Nominatim
                          var url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`;
                          fetch(url)
                          .then(response => response.json())
                          .then(data => {
                            if (data.address && data.address.road) {
                              var nombreDeCalle = data.address.road;

                              direccion.value = nombreDeCalle;
                              console.log(nombreDeCalle);
                            } else {
                              direccion.value = 'Sin direccion';

                            }
                          })
                          .catch(error => {
                            console.error("Hubo un error al obtener información de la calle:", error);
                          });
                        }


                        map.on('dblclick', agregarMarcadorEnDobleClic);

                      // Opcional: Agregar un marcador inicial si las latitudes y longitudes están definidas
                        if (latitud.value && longitud.value) {
                          var inla = parseFloat(latitud.value);
                          var inlo = parseFloat(longitud.value);

                          var marcador = L.marker([inla, inlo]).addTo(map);
                          marcador.bindPopup(denominacion.value).openPopup();
                        }
}

inciarMapa() ;


 $(document).on('click','.editarProveedor',function(){// modificaionde datos a nivel general
  let element =$(this)[0].parentElement.parentElement;
  let id= $(element).attr('proveedorId');
  console.log(id);
  $.post('../proveedor/datoProveedor',{id},function(response){

    var json=JSON.parse(response);
    // console.log(json.email);
    console.log(json);
    $('#idM').val(json.id);

    $('#denominacionM').val(json.denominacion);
    $('#telefonoM').val(json.celular);
    $('#direccionM').val(json.direccion);
    $('#latitudM').val(json.latitud);
    $('#longitudM').val(json.longitud);



    console.log(json.denominacion);
    $("#ModificarProveedor").modal("show");

                          
  })

})


  $("#formModificarProveedor").submit(function(ev){// guardamos los cambios de modificar alos empleasos
    ev.preventDefault();

    $.ajax({
      url: "../proveedor/proveedorModificar",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){
        console.log(data);
        var json= JSON.parse(data);
  
         
          if (json.uri===1) {
              $("#ModificarProveedor").modal("hide");
                alert(json.msg+' Campos modificas '+ json.campos);
           listarUsuario();
          }

          else
          {
            console.log(json.uri);
             $("#ModificarProveedor").modal("hide");
             alert(json.msg);
          }
       
      },

      statusCode: {
        400: function(xhr){
        },
        401: function(xhr){
        },
                  
      }
    });
  });



});







//agregar proveedor

(function($){
  $("#agregarProveedor").submit(function(ev){
    ev.preventDefault();

    $.ajax({
      url: "../proveedor/agregarProveedor",
      type: "POST",
      data: $(this).serialize(),
      success: function(data){

        console.log(data);
        var json= JSON.parse(data);
                if (json.uri===1) {
              $("#ModificarProveedor").modal("hide");
               window.location.replace(json.url);
                listarUsuario();

                alert(json.msg);
          }

          else
          {
             window.location.replace(json.url);
                listarUsuario();

                alert(json.msg);
          }
      },
    });
  });

})(jQuery);


//datos perosnales 
