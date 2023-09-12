

<div class="wrapper" style="background: #C69F74;">

  <div class="content-wrapper"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
    <!--  (cabecera header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-12 t-primary">
            <h1>Proveedores</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card " style="background:rgba(0, 0, 0, .2);" >
              <div class="card-header p-0 ">

                <ul class="nav nav-pills p-0 bgt-primary">
                  <li class="nav-item"><a class="nav-link active" href="#listaProveedores" data-toggle="tab">Proveedores</a></li>
                  <li class="nav-item"><a class=" nav-link " href="#agregarProveedores" data-toggle="tab">Agregar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Eliminados</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="listaProveedores">
                    <!-- Post -->

                    <div style="height: 60vh; overflow-y: auto;">
                      <div class="card-body">
                        <table id="example11" class="table  ">
                          <thead>
                            <tr>
                              <th>Nro</th>

                              <th>Denominacion</th>
                              <th>Telefono</th>
                              <th> Direccion</th>
                              <th style="width:20px"><i class="fa-solid fa-file-pen fa-md text-warning  d-flex justify-content-center"></i></th>
                              <th style="width:20px"><i class="fa-solid fa-trash fa-md text-danger d-flex justify-content-center"></i></th>
                            </tr>
                          </thead>
                          <tbody id="listaProveedoresT">
                          </tbody>

                        </table>
                      </div>
                    </div>


                    <form id="formModificarProveedor">
                     <div class="modal modal-primary" id="ModificarProveedor" aria-hidden="true"  data-backdrop="static"  >
                      <div class="modal-dialog modal-dialog-centered modal-lg" >
                        <div class="modal-content bgt-secondary" >
                          <div class="modal-header bgt-acent" >
                            <div class="container">
                              <div class="row">

                                <h5 class="modal-title">Modificar Datos <span id="titleModalDay">Nombre</span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span  aria-hidden="true">×</span></button>
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">                    


                               <div class="row">
                                <div class="col col-sm-6 col-md-6 col-12 col-sm-12  d-flex  justify-content-center align-items-center" style="height:60vh">
                                  <div class="col-12">
                                    <div class="row "> <h5>Ingrese los datos</h5> </div>
                                    <div class="row  d-flex" >
                                      <div  class="col-12 ">
                                        <div class="myBox">
                                          <input class=" myImputField" type="text" id="denominacionM" name="denominacionM"  onkeypress="return soloLetrasEspacio(event)" minlength="2" maxlength="25" required autofocus>
                                          <label class="mylabel" for="denominacion" >Denominacion</label>
                                          <input type="hidden" name="idM" id="idM">
                                        </div>
                                      </div>

                                    </div>
                                    <div class="row  d-flex " >
                                      <div  class="col-12 ">
                                        <div class="myBox">
                                          <input class=" myImputField" type="text" id="telefonoM" name="telefonoM"  onkeypress="return soloNumero(event)" minlength="2" maxlength="25" required autofocus>
                                          <label class="mylabel" for="telefono" >Telefono</label>
                                        </div>
                                      </div>
                                    </div> <div class="row " >
                                      <div  class="col-12 ">
                                        <div class="myBox">
                                          <input class=" myImputField" type="text" id="direccionM" name="direccionM" value="" onkeypress="return LetrasNumero(event)" minlength="2" maxlength="50" required autofocus>

                                          <label class="mylabel" for="direccin" >Direccion</label>
                                        </div>
                                      </div>

                                    </div> 

                                    <div class="row  " >
                                      <div  class="col-12 ">


                                        <div class="myBox">
                                          <input class=" myImputField"  type="text" id="latitudM" name="latitudM"  onkeypress="return soloNumero(event)" minlength="2" maxlength="25" value="" required autofocus>
                                          <label class="mylabel" for="latitud" >Latitud</label>
                                        </div>

                                        <div class="myBox">
                                          <input class=" myImputField" type="text" id="longitudM" name="longitudM"  onkeypress="return soloNumero(event)" minlength="2" maxlength="25" value="" required autofocus>
                                          <label class="mylabel" for="longitud" >Longitud</label>
                                        </div>

                                      </div>


                                    </div>

                                  </div>

                                </div>

                                <div class="col col-sm-6 col-md-6 col-12 col-sm-12 " style="height:60vh">

                                  <div class="row d-flex justify-content-center" id="mapMo" style="  width: 100%; height:55vh"></div>
                                  <div>
                                   <script type="text/javascript">


                                     var denominacion = document.getElementById('denominacionM');
                                     var direccion = document.getElementById('direccionM');
                                     var longitud = document.getElementById('longitudM');
                                     var latitud = document.getElementById('latitudM');


                                     var map = L.map('mapMo').setView([latitud.value,longitud.value], 20);

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




                                  </script>
                                </div>
                              </div>
                            </div>
                      
                          <div class="clearfix"></div>        

                        </div>

                        <div class="modal-footer d-flex justify-content-around bgt-secondary" >
                         <button class="btn btn-sm btnt-primary" type="submit" data-dismiss="modal"><i class=" fas fa-times p-1 text-danger"></i>Cancelar</button>
                         <button class="btn btn-sm btnt-primary" type="submit">
                          <i class="fas fa-save m-1 text-success"></i>Guardar</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- fin de incio de Modal -->
                </form>


              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="agregarProveedores">
                <!-- The timeline -->
                <form class="form-horizontal " id="agregarProveedor">
                 <div class="row">
                  <div class="col col-sm-6 col-md-6 col-12 col-sm-12  d-flex  justify-content-center align-items-center" style="height:60vh">
                    <div class="col-12">
                      <div class="row "> <h5>Ingrese los datos</h5> </div>
                      <div class="row  d-flex" >
                        <div  class="col-12 ">
                          <div class="myBox">
                            <input class=" myImputField" type="text" id="denominacion" name="denominacion"  onkeypress="return soloLetrasEspacio(event)" minlength="2" maxlength="25"  required autofocus>
                            <label class="mylabel" for="denominacion" >Denominacion</label>
                          </div>
                        </div>

                      </div>
                      <div class="row  d-flex " >
                        <div  class="col-12 ">
                          <div class="myBox">
                            <input class=" myImputField" type="text" id="telefono" name="telefono"  onkeypress="return soloNumero(event)" minlength="2" maxlength="25" required autofocus>
                            <label class="mylabel" for="telefono" >Telefono</label>
                          </div>
                        </div>




                      </div> <div class="row " >
                        <div  class="col-12 ">
                          <div class="myBox">
                            <input class=" myImputField" type="text" id="direccion" name="direccion" value="" onkeypress="return LetrasNumero(event)" minlength="2" maxlength="50" required autofocus>

                            <label class="mylabel" for="direccin" >Direccion</label>
                          </div>
                        </div>




                      </div> 

                      <div class="row  " >
                        <div  class="col-12 ">


                          <div class="myBox">
                            <input class=" myImputField"  type="text" id="latitud" name="latitud"  onkeypress="return soloNumero(event)" minlength="2" maxlength="25" value="-17.44499369201834" required autofocus>
                            <label class="mylabel" for="latitud" >Latitud</label>
                          </div>

                          <div class="myBox">
                            <input class=" myImputField" type="text" id="longitud" name="longitud"  onkeypress="return soloNumero(event)" minlength="2" maxlength="25" value="-66.13825321197511" required autofocus>
                            <label class="mylabel" for="longitud" >Longitud</label>
                          </div>

                        </div>


                      </div>


                      <div class= " row m-3 d-flex justify-content-around">
                     
                       <button class="btn btnt-primary">Guardar</button>
                       
                     </div>
                   </div>

                 </div>

                 <div class="col col-sm-6 col-md-6 col-12 col-sm-12 " style="height:60vh">

                  <div class="row d-flex justify-content-center" id="map" style="  width: 100%; height:55vh"></div>
                  <div>

                  </div>
                </div>
              </div>
            </form>
          </div>



















          <!-- /.tab-pane -->

          <div class="tab-pane" id="settings">
             <div style="height: 60vh; overflow-y: auto;">
                      <div class="card-body">
              <table id="example1" class="table table-bordered table-striped ">
               
              
                          <thead>
                            <tr>
                              <th>Nro</th>

                              <th>Denominacion</th>
                              <th>Telefono</th>
                              <th> Direccion</th>
                              <th>Activar</th>
                             
                            </tr>
                          </thead>
                          <tbody id="listaProveedoresTDesabilitados">
                          </tbody>

                       
              </table>
            </div>
          </div>


          </div>
        </div>
      </div>
    </div>

  </div>
</div>


</div>
</section>

</div>


</div>

