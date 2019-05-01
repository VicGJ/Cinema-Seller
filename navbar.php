<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="listaComprar.php">Peliculas</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="carro.php">Carrito</a></li>
        <li><a href="listaActores.php">Actores</a></li>
        <li><a href="comentarios.php">Comentarios</a></li>
        <li><a href="perfil.php">Modificar perfil</a></li>
        <li><div class="busqueda">
		      <form  id="searchform" action='busqueda.php' method='post'>
    			 <input type="text" name="aBuscar" placeholder="Buscar aqu&iacute;..." required>
                <button type="submit ">Buscar</button>
		      </form>
	   </div></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>