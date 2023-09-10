

<div class="wrapper" style="background:transparent;">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper " style=" background:transparent;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-12">
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
              <div class="card">
                <div class="card-header p-2 ">
                  <ul class="nav nav-pills p-2 bgt-primary">
                    <li class="nav-item"><a class="nav-link active " href="#activity" data-toggle="tab">Proveedores</a></li>
                    <li class="nav-item"><a class=" nav-link" href="#timeline" data-toggle="tab">Agregar</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Eliminados</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane" id="activity">
                      <!-- Post -->


                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped ">
                          <thead>
                            <tr>
                              <th>Numero</th>
                              <th>Nombre</th>
                              <th>Primer Apellido</th>
                              <th>Segundo Apellido</th>
                              <th>Ci</th>
                              <th>Sexo</th>
                              <th>Rol Usuario</th>
                              <th>Foto</th>
                              <th><i class="fa-solid fa-file-pen fa-md text-warning  d-flex justify-content-center"></i></th>
                              <th><i class="fa-solid fa-trash fa-md text-danger d-flex justify-content-center"></i></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>fdfd</td>
                              <td>fdfd</td>
                              <td>fdfd</td>
                              <td>fdfd</td>
                              <td>fdfd</td>
                              <td>fdfd</td>
                              <td>fdfd</td>
                              <td>fdfd</td>
                              <td class="" title="Modificar"> <?php echo form_open_multipart('proveedor/modificar'); ?>
                              <button class="btn btn-outline-warning btn-ls "><i class="fa-solid fa-file-pen fa-md"></i></button>
                              <?php echo form_close(); ?></td>
                              <td class="" title="Eliminar"> <?php echo form_open_multipart('proveedor/eliminar'); ?>
                              <button class="btn btn-outline-danger btn-ls"><i class="fa-solid fa-trash fa-md"></i></button>
                              <?php echo form_close(); ?></td>

                            </tr>

                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Numero</th>
                              <th>Nombre</th>
                              <th>Primer Apellido</th>
                              <th>Segundo Apellido</th>
                              <th>Ci</th>
                              <th>Sexo</th>
                              <th>Rol Usuario</th>
                              <th>Foto</th>
                              <th>Modificar</th>
                              <th>Eliminar</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>



                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane active" id="timeline">
                      <!-- The timeline -->
                      <form class="form-horizontal">
                       <div class="row  ">
                        <div class="col col-sm-6 col-md-6 col-12 col-sm-12 bg-success  d-flex  justify-content-center align-items-center" style="height:60vh">
                          <div class="col-12">
                            <div class="row "> <h5>Ingrese los datos</h5> </div>
                            <div class="row  d-flex" >
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="denominacion" name="nombre"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" value="decoracuibRojas" required autofocus>
                                  <label class="mylabel" for="denominacion" >Denominacion</label>
                                </div>
                              </div>

                            </div>
                            <div class="row  d-flex " >
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="nombreUsuario" name="nombre"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required autofocus>
                                  <label class="mylabel" for="nombreUsuario" >Telefono</label>
                                </div>
                              </div>




                            </div> <div class="row " >
                              <div  class="col-12 ">
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="direccion" name="nombre"  onkeypress="return soloLetras(event)" minlength="2" maxlength="25" required autofocus>
                                  <label class="mylabel" for="direccion" >Direccion</label>
                                </div>
                              </div>




                            </div> 

                            <div class="row  " >
                              <div  class="col-12 ">

                                
                                    <div class="myBox">
                                      <input class=" myImputField"  type="text" id="latitud" name="nombre"  onkeypress="return soloNumero(event)" minlength="2" maxlength="25" value="-17.44499369201834" required autofocus>
                                      <label class="mylabel" for="nombreUsuario" >Latitud</label>
                                    </div>
                                  
                                <div class="myBox">
                                  <input class=" myImputField" type="text" id="longitud" name="nombre"  onkeypress="return soloNumero(event)" minlength="2" maxlength="25" value="-66.13825321197511" required autofocus>
                                  <label class="mylabel" for="nombreUsuario" >Longitud</label>
                                </div>
                              </div>


                            </div>


                            <div class= " row m-3 d-flex justify-content-around">
                             <button class="btn btn-outline-warning">Guardar</button>
                             <button class="btn btn-outline-warning">Cancelar</button>

                           </div>
                         </div>

                       </div>

                       <div class="col col-sm-6 col-md-6 col-12 col-sm-12 " style="height:60vh">

                        <div class="row d-flex justify-content-center" id="map" style="  width: 100%; height:55vh"></div>
                        <div>
                         <script type="text/javascript">
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
                                       direccion.value=nombreDeCalle;
                                    } else {
                                        direccion.value='No se encotro direccion';
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
                  </form>
                </div>

                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped ">
                      <thead>
                        <tr>
                          <th>Numero</th>
                          <th>Nombre</th>
                          <th>Primer Apellido</th>
                          <th>Segundo Apellido</th>
                          <th>Ci</th>
                          <th>Sexo</th>
                          <th>Rol Usuario</th>
                          <th>Foto</th>
                          <th >
                            <i class="fa-solid fa-share-from-square  text-success  d-flex justify-content-center"></i>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>fdfd</td>
                          <td>fdfd</td>
                          <td>fdfd</td>
                          <td>fdfd</td>
                          <td>fdfd</td>
                          <td>fdfd</td>
                          <td>fdfd</td>
                          <td>fdfd</td>
                          <td class=" justify-content-center d-flex justify-content-center "> <?php echo form_open_multipart('proveedor/recuperar'); ?>
                          <button class="btn btn-outline-success btn-ls "><i class="fa-solid fa-share-from-square fa-bounce"></i></button>
                          <?php echo form_close(); ?></td>


                        </tr>

                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Numero</th>
                          <th>Nombre</th>
                          <th>Primer Apellido</th>
                          <th>Segundo Apellido</th>
                          <th>Ci</th>
                          <th>Sexo</th>
                          <th>Rol Usuario</th>
                          <th>Foto</th>
                          <th>Restaurar</th>

                        </tr>
                      </tfoot>
                    </table>
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

