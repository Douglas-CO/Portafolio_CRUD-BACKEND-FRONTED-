<?php include("includes/header.php");?>
<br><br><br><br>
<button class="btn modal-btn btn-secondary bajar">Añadir Nuevo musicas</button>
<div class="modal-overlay">
    <div class="modal-container">
    <button class="close-btn2"><i class="fas fa-times"></i></button>
    <div class="bg-dark grid añadir gap-3">
            <form action="acciones_musicas/insertar.php" method="POST" enctype="multipart/form-data">
                <h3 class="text-center text-light">Letra de la Musica</h3>
                <div class="input-group p-2 g-col-6">
                    <input type="text" class="form-control" placeholder=" Titulo de la Musica" name="nombre">
                </div>
                <div class="input-group p-2 g-col-6">
                    <textarea type="text" class="form-control" placeholder=" Descripcion de la Musica" name="description"></textarea>
                </div>
                <div class="input-group p-2 g-col-6">
                    <input type="text" class="form-control" placeholder=" Link de la Musica" name="link">
                </div>
                <div class="input-group p-2 g-col-6">
                    <input type="file" class="form-control" placeholder="Seleccione una imagen" name="foto">
                </div>
                <div class="input-group p-2 g-col-6">
                    <button class="btn btn-primary mt2" type="submit">Agregar Musica</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<!-- -->
<div class="col-lg-8 observar">
    <h1 class="text-primary text-center">Musicas</h1>
    <hr>
    <form action="" method="get">
      <div class="row">
        <div class="col-md-9">
          <div class="input-group mb-3">
            <button name="sort_numeric" id="" class="form-control bg-dark text-light" value="low-high" <?php if (isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "low-high") { echo "selected"; } ?>>PRIMEROS</button>
            <button name="sort_numeric" id="" class="form-control bg-dark text-light" value="high-low" <?php if (isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "high-low") { echo "selected"; } ?>>RECIENTES</button>
          </div>
        </div>
      </div>
    </form>
    
    <?php
        include("backend/bd_musicas.php");
        $query = listar();
        $conexion = mysqli_connect(
          'localhost',
          'root',
          'Sr-Douglas-31',
          'listas'
        );
      $sort_option = "";
      if(isset($_GET['sort_numeric'])){
          if($_GET['sort_numeric'] == "low-high"){
              $sort_option = "ASC";
          }elseif($_GET['sort_numeric'] == "high-low"){
              $sort_option = "DESC";
          }
      }
        $sql="SELECT * FROM musicas ORDER BY id $sort_option";
        $query = mysqli_query($conexion,$sql);
        if(mysqli_num_rows($query)>0){
          foreach($query as $row){
        ?>
        <br>
          <div class="card bg-secondary text-light" style="max-height:auto; max-width:auto;">
          <div class="row">
            <div class="card-body">
              <p class="card-title mayus"><strong><?= $row['nombre']; ?></strong></p>
            </div>
            <div class="col-3">
              <img class="card-img-top rounded mx-auto d-block" src="data:image/jpg;base64,<?= base64_encode($row['foto'])?>" style="max-height:auto; max-width: 175px;">
              <br>
            </div>
            <div class="col-7">
              <div class="card-body">
                <p class="card-text">
                  <strong><?= $row['description']; ?></strong>
                  <a href="<?= $row['link']; ?>" class="btn btn-info">
                    <i class="fa-solid fa-link"></i>LINK
                  </a>
                </p>
              </div>
              <div class="card-text">
                <a href="acciones_musicas/ver.php?id=<?= $row['id']; ?>" class="btn btn-info">
                  <i class="fas fa-marker"></i>VER
                </a>
                <a href="acciones_musicas/editar.php?id=<?= $row['id']; ?>" class="btn btn-warning">
                  <i class="fas fa-marker"></i>EDITAR
                </a>
                <a href="acciones_musicas/eliminar.php?id=<?= $row['id']; ?>" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>ELIMINAR
                </a>
                <small class="text-muted"><?= $row['created_at']; ?></small>
              </div>
            </div>
          </div>
        </div>
          <?php
          }
        }else{
          ?>
          <tr>
          <td>Sin Informacion, ¡Vamos ingresa tu Musica favorita!/td>
          </tr>
          <?php
          }
        ?>
</div>
<script>
const modalBtn = document.querySelector(".modal-btn");
const modal = document.querySelector(".modal-overlay");
const closeBtn2 = document.querySelector(".close-btn2");

modalBtn.addEventListener("click", function () {
    modal.classList.add("open-modal");
});
closeBtn2.addEventListener("click", function(){
    modal.classList.remove("open-modal");
});
</script>

<?php include("includes/footer.php")?>