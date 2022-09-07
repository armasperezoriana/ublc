  <style media="screen">
    nav{
      grid-area: menu;
      justify-self: stretch;
      align-self: stretch;
      display: flex;
      justify-content: center;
      align-content: stretch;
      text-align: center;
      background: #66A45F;
    }
    ul{
      list-style: none;
    }
    nav > ul{
      align-self: stretch;
      justify-self: center;
      display: flex;
    }
    ul li{
      height: 100%;
    }
    ul li a{
      height: 100%;
      display: flex;
      align-content: stretch;
      align-items: center;
      justify-content: center;
      padding: 0px 10px;
      font-family: serif;
      background: #66A45F;
      color: #ffffff;
      text-decoration: none;
    }
    ul li a:hover{
      background: rgba(0, 230, 118, 0.8);
    }
    ul li a:active{
      background: rgba(165, 214, 167, 0.8);
    }
    ul li ul
    {
      display: none;
    }
    ul li:hover > ul
    {
      display: block;
      height: 100%;
    }
    ul li ul li
    {
      position: relative;
    }
    ul li ul li ul
    {
      position: absolute;
      left: 100%;
      top: 0px;
    }
    *::-webkit-scrollbar
    {
      width: 12px;
      height: 8px;
      background: rgba(175, 201, 190, 0.8);
    }
    *::-webkit-scrollbar-thumb
    {
      background: #66A45F;
      border-right: 2px solid #81C784;
      border-radius: 30px;
    }
  </style>
  <nav>
    <ul>
      <li><a href="<?php echo dir; ?>sismeu/">Inicio</a></li>
      <li><a href="<?php echo dir; ?>trabajadores/">Titulares</a>
        <ul>
          <li><a href="<?php echo dir; ?>trabajadores/agregar/">Registrar</a></li>
          <li><a href="<?php echo dir; ?>trabajadores/consultar/">Consultar</a></li>
        </ul>
      </li>
      <li><a href="<?php echo dir; ?>beneficiarios/">Beneficiarios</a>
        <ul>
          <li><a href="<?php echo dir; ?>beneficiarios/agregar/">Registrar</a></li>
          <li><a href="<?php echo dir; ?>beneficiarios/consultar/">Consultar</a></li>
        </ul>
      </li>
      <li><a href="<?php echo dir; ?>sismeu/datos_basicos/">Datos Básicos</a>
        <ul>
          <li><a href="<?php echo dir; ?>patologias/">Patologías</a></li>
          <li><a href="<?php echo dir; ?>medicamentos/">Medicamentos</a></li>
        </ul>
      </li>
      <li> <a href="<?php echo dir; ?>sismeu/">Sismeu</a> 
        <ul>
          <li><a href="<?php echo dir; ?>sismeu/reportes/">Reportes</a></li>
          <li><a href="<?php echo dir; ?>sismeu/reembolsos/">Reembolsos</a></li>
          <li><a href="<?php echo dir; ?>sismeu/notificaciones/">Notificaciones</a></li>
        </ul>
      </li>
      <li><a href="<?php echo dir; ?>usuarios/">Usuarios</a>
        <ul>
          <li><a target="_blank" href="<?php echo img; ?>MANUAL DE USUARIOS SISTEMA SISMEU.pdf">Ayuda</a></li>
        </ul>
        
      </li>
      <li><a href="<?php echo dir; ?>inicio/logout">Cerrar Sesión</a></li>
    </ul>
  </nav>
