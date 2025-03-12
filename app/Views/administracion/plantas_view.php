<div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
               <div class="row">
                    <div class="col-8"><h6 class="text-white text-capitalize ps-3">Plantas Frutales</h6></div> 
                    <div class="col-4" style=" text-align: right;">
                         <!-- <a href="<?=base_url()?>plantas/create" class="btn btn-primary btn-sm mb-0 me-3" style="margin-top: -5px;" >Agregar Planta</a>
                         -->
                         <button type="button" class="btn bg-gradient-primary btn-sm mb-0 me-3"  data-bs-toggle="modal" data-bs-target="#createModal"> 
                         Agregar Planta </button>
                    </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Variedad</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descripción</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($plantas as $planta): ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">John Michael</h6>
                            <p class="text-xs text-secondary mb-0"><?= esc($planta['nombre']); ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= esc($planta['variedad']); ?></p>
                        <p class="text-xs text-secondary mb-0">Organization</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?= esc($planta['descripcion']); ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                      </td>
                      <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Eliminar
                        </a>
                        <!-- <a href="<?=base_url()?>plantas/edit/<?= $planta['id']; ?>">Editar</a> |
                        <a href="<?=base_url()?>plantas/delete/<?= $planta['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</a>
                     -->
                      </td>
                    </tr>
                    <?php endforeach; ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     

<!-- Button trigger modal -->
<!-- <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->



    <!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel"> Agregar Nueva Planta </h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  id="formulario_create" action="<?=base_url()?>planta/store_ajax">
          <div class="input-group input-group-outline my-3">
              <label class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="<?= old('nombre') ?>">
          </div>
          <div class="input-group input-group-outline my-3">
              <label class="form-label">Variedad</label>
              <input type="text" class="form-control" name="variedad" id="variedad"  value="<?= old('variedad') ?>">
          </div>
          <div class="input-group input-group-dynamic">
          <textarea class="multisteps-form__textarea form-control" name="descripcion" id="descripcion"
          rows="5" placeholder="Descripción" spellcheck="false"></textarea>
    </div>
  
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn bg-gradient-primary" id="guardar" onclick="saveData()">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script>
function saveData() {
 
 var formData = new FormData(document.getElementById('formulario_create'));

// Usando Fetch API para enviar el formulario por POST
fetch(document.getElementById('formulario_create').action, {
  method: 'POST',
  body: formData
})
.then(response => response.json()) // Parsear la respuesta como JSON
.then(data => {
  console.log(data);
  if (data.success) {
      alert('Formulario enviado con éxito');
      // Aquí puedes realizar más acciones si la respuesta es exitosa
    } else {
      alert('Ocurrió un error: ' + data.message);
    }
  // Si necesitas cerrar el modal o limpiar el formulario, puedes hacerlo aquí
   document.getElementById('formulario_create').reset(); // Para limpiar el formulario
   document.getElementById('#createModal').modal('hide'); // Si estás usando un modal, de lo contrario puedes usar otro método
})
.catch(error => {
  // Manejar errores
  console.error('Error:', error);
  alert('Ocurrió un error. Por favor, intenta nuevamente.');
});
  };
</script>

